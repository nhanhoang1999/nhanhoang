<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customers;
use DB;
use PDF;
class TransactionController extends Controller
{
    //
	public function getTransaction(){
		$data['transactions'] = DB::table('db_transactions')->join('db_customers','db_transactions.tr_customers_id','=','db_customers.id')->select('db_customers.name','db_transactions.*')->get();
		return view('backend.transaction',$data);
	}
	public function getViewOrder(Request $request,$id){
		$data['orders'] = DB::table('db_orders')->join('db_product','db_orders.o_product_id','=','db_product.p_id')->join('db_transactions','db_orders.o_transactions_id','=','db_transactions.id')->select('db_product.p_name','db_product.p_slug','db_product.p_img','db_product.p_id','db_orders.*')->where('o_transactions_id',$id)->get();
		return view('backend.order-details',$data);
	}
	public function getActive($id){
		$transactions = Transaction::find($id);
		$orders = Order::where('o_transactions_id',$id)->get();

		if($orders)
		{
			foreach($orders as $order)
			{
				$product = Product::find($order->o_product_id);
				$product->p_number = $product->p_number - $order->o_qty;
				$product->p_pay ++;
				$product->save();
			}
		}
		$transactions->tr_status =1;
		$transactions->save();

		return redirect()->back()->with('warning','Xử lý đơn hàng thành công');
	}
	public function deleteOrder($id){
		$data = Transaction::find($id);
		$data->delete();
		return back()->with('error','Đã xóa thành công');
	}
	public function print_order($check_out){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($check_out));
		return $pdf->stream();
	}
	public function print_order_convert($check_out){
		$transactionId = Transaction::where('order_code',$check_out)->get();
		foreach ($transactionId as $key => $tran) {
			$customerId = $tran->tr_customers_id;
			$orderId = $tran->id;
		}
		$transaction = Transaction::where('id',$orderId)->first();
		$customer = Customers::where('id',$customerId)->first();
		$orders = DB::table('db_orders')->join('db_product','db_orders.o_product_id','=','db_product.p_id')->join('db_transactions','db_orders.o_transactions_id','=','db_transactions.id')->select('db_product.p_name','db_orders.*')->where('o_transactions_id',$orderId)->get();
		$output='';
		$output='
		<style type="text/css">
		body{
			font-family:DejaVu Sans;
		}
		.invoice-title h2, .invoice-title h3 {
			display: inline-block;
		}

		.table > tbody > tr > .no-line {
			border-top: none;
		}

		.table > thead > tr > .no-line {
			border-bottom: none;
		}

		.table > tbody > tr > .thick-line {
			border-top: 2px solid;
		}
		</style>
		<div class="container">
		<div class="row">
		<div class="col-xs-12">
		<div class="invoice-title">
		<h2>Hóa đơn</h2><h3 class="pull-right">Đơn hàng mã #'.$transaction->order_code.'</h3>
		</div>
		<hr>
		<div class="row">
		<div class="col-xs-6">
		<address>
		<strong>Hóa đơn cho:</strong><br>
		'.$customer->name.'
		</address>
		</div>
		<div class="col-xs-6 text-right">
		<address>
		<strong>Giao hàng đến:</strong><br>
		'.$customer->name.'<br>
		<h4>Địa chỉ:</h4>'.$transaction->tr_address.'
		</address>
		</div>
		</div>
		<div class="row">
		<div class="col-xs-6">
		<address>
		<strong>Phương thức thanh toán:</strong><br>
		Thanh toán khi nhận hàng
		<p>Địa chỉ email: '.$customer->email.'<p>
		<p>Số điện thoại: '.$transaction->tr_phone.'</p>
		</address>
		</div>
		<div class="col-xs-6 text-right">
		<address>
		<strong>Ngày đặt hàng:</strong><br>
		'.$transaction->created_at.'<br><br>
		</address>
		</div>
		</div>
		</div>
		</div>

		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="panel-title"><strong>Thông tin đơn hàng</strong></h3>
		</div>
		<div class="panel-body">
		<div class="table-responsive">
		<table class="table table-condensed">
		<thead>
		<tr>
		<td><strong>Sản phẩm</strong></td>
		<td class="text-center"><strong>Giá</strong></td>
		<td class="text-center"><strong>Số lượng</strong></td>
		<td class="text-right"><strong>Thành tiền</strong></td>
		<td class="text-right"><strong>Giảm giá</strong></td>
		</tr>
		</thead>
		<tbody>';
		foreach ($orders as $key => $order) {
			$output.='
			<tr>
			<td>'.$order->p_name.'</td>
			<td class="text-center">'.number_format($order->o_price,0,',','.').'VND</td>
			<td class="text-center">'.$order->o_qty.'</td>
			<td class="text-center">'.number_format($order->o_price*$order->o_qty,0,',','.').'VND</td>
			<td class="text-center">'.$order->o_sale.'%</td>
			</tr>';
		}
		$output.='
		<tr>
		<td class="thick-line"></td>
		<td class="thick-line"></td>
		<td class="thick-line"></td>
		<td class="thick-line text-center"><strong>Tổng tiền</strong></td>
		<td class="thick-line text-right">'.number_format($transaction->tr_total,0,',','.').'VND</td>
		</tr>
		<tr>
		<td class="no-line"></td>
		<td class="no-line"></td>
		<td class="no-line"></td>
		<td class="no-line text-center"><strong>Shipping</strong></td>
		<td class="no-line text-right">$15</td>
		</tr>
		<tr>
		<td class="no-line"></td>
		<td class="no-line"></td>
		<td class="no-line"></td>
		<td class="no-line text-center"><strong>Tổng tiền</strong></td>
		<td class="no-line text-right">'.number_format($transaction->tr_total,0,',','.').'VND</td>
		</tr>

		</tbody>
		</table>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>';
		return $output;
	}
}
