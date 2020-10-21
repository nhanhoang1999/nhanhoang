<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use DB;

class HistoryController extends Controller
{
    //
    public function getFormHistory($id){
      $data['orders'] = $this->getData($id);
      return view('frontend.history-order',$data);
  }
  public function getHistoryProcess($id){
   $data['orders'] = $this->getData($id);
   return view('frontend.history-order2',$data);
}
public function getHistoryTransporting($id){
   $data['orders'] = $this->getData($id);
   return view('frontend.history-order3',$data);
}
public function getHistoryReceived($id){
   $data['orders'] = $this->getData($id);
   return view('frontend.history-order4',$data);
}
public function getActive($id){
   $transaction = Transaction::find($id);
   $transaction->tr_status = 2;
   $transaction->save();
   return redirect()->back();
}
public function getDelete($id){
   $transaction = Transaction::find($id);
   $transaction->tr_status = -1;
   $transaction->save();
   return redirect()->back();
}
public function getData($id){
    $data = DB::table('db_orders')->join('db_product','db_orders.o_product_id','=','db_product.p_id')->join('db_transactions','db_orders.o_transactions_id','=','db_transactions.id')->select('db_product.p_name','db_product.p_slug','db_product.p_img','db_product.p_id','db_orders.*','db_transactions.tr_status')->where('db_transactions.tr_customers_id',$id)->get();
    return $data;     
}


}
