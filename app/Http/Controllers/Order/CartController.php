<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; 
use App\Models\Transaction;
use App\Models\Order;
use Cart;
use Auth;
use Carbon\Carbon;
use DB;
class CartController extends Controller
{
    //
    public function addProduct(Request $request){
    	$id = $request->productid_hidden;
        $product = Product::find($id);
        $price = $product->p_price;
        if($product->p_promotion){
            $price = $price * (100 - $product->p_promotion)/100;
        }
        if($product->p_number == 0 ){
            return back()->with('warning','Sản phẩm đã hết hàng');
        }
        if($request->qty){
            if($request->qty <= $product->p_number){
                $qty = $request->qty;
            }else{
                return back()->with('warning','Sản phẩm không đủ hàng');   
            }
        }else{
            $qty = 1;
        }
        Cart::add([
          'id'=>$id,
          'name'=>$product->p_name,
          'qty'=>$qty,
          'price'=>$price,
          'options'=>['img'=>$product->p_img,
          'slug'=>$product->p_slug,
          'promotion'=>$product->p_promotion,
          'price_old'=>$product->p_price]
      ]);
        return redirect()->back()->with('warning','Thêm vào giỏ hàng thành công');
    }

    public function getCart(){
        $data['cartlist'] = Cart::content();
        $data['product'] = Product::all();
        return view('frontend.cart',$data);
    }
    public function getClean(){
    	Cart::destroy();
    	return back();
    }
    public function getDeleteCart($rowId){
    	Cart::remove($rowId);
    	return back();

    }
    public function getPay(){
        $data['cartlist'] = Cart::content();
        $data['product'] = Product::all();
        return view('frontend.checkout',$data);
    }
    public function postPay(Request $request){
        $total = str_replace(',','',Cart::subtotal(0,3));
        $idCustomer = Auth::guard('customers')->user()->id;
        $check_out = substr(md5(microtime()), rand(0,26),5);
        $transactionId = Transaction::insertGetId([
            'tr_customers_id' => $idCustomer,
            'tr_total'=>(int)$total,
            'tr_note'=>$request->note,
            'tr_address'=>$request->address,
            'tr_phone'=>$request->phone_number,
            'order_code' =>$check_out,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        if($transactionId){
            $products = Cart::content();
            foreach ($products as $product )
            {
                Order::insert([
                    'o_transactions_id'=>$transactionId,
                    'o_product_id'=>$product->id,
                    'o_qty'=>$product->qty,
                    'o_price'=>$product->options->price_old,
                    'o_sale'=>$product->options->promotion,
                    'order_code'=>$check_out
                ]);
            }
        }
        Cart::destroy();
        return redirect('view')->with('warning','Đang chờ xử lý');
    }
    public function updateQty(Request $request){
        $rowId = $request->cart_id;
        $qty = $request->qty1;
        Cart::update($rowId,$qty);
        return redirect('shopping/cart');
    }


//---------------------------------------------------------------------
    public function get_online(){
        $data['cartlist'] = Cart::content();
        $data['product'] = Product::all();
        return view('frontend.checkout-online',$data);
    }
    public function post_online(Request $request)
    {
        $vnp_TmnCode = "HSMQ1R24"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BKYDGIWEVESRFOATDCAEMRTHOXNHDUZW"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/Project/MyShop1/gio-hang/ketqua";
        $vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',','',Cart::total())*100;
        $vnp_Locale = $request->language;
        $vnp_IpAddr = '234';
        $vnp_BankCode = $request->bank_code;

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $total = str_replace(',','',Cart::subtotal(0,3));
        $idCustomer = Auth::guard('customers')->user()->id;
        $check_out = $request->order_id;
        $transactionId = Transaction::insertGetId([
            'tr_customers_id' => $idCustomer,
            'tr_total'=>(int)$total,
            'tr_note'=>$request->note,
            'tr_address'=>$request->address,
            'tr_phone'=>$request->phone_number,
            'order_code' =>$check_out,
            'tr_status'=>3,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        if($transactionId){
            $products = Cart::content();
            foreach ($products as $product )
            {
                Order::insert([
                    'o_transactions_id'=>$transactionId,
                    'o_product_id'=>$product->id,
                    'o_qty'=>$product->qty,
                    'o_price'=>$product->options->price_old,
                    'o_sale'=>$product->options->promotion,
                    'order_code'=>$check_out
                ]);
            }
        }
        return redirect($vnp_Url);
    }   
    public function return_online(Request $request){
        if($request->vnp_ResponseCode == 00)
        {
            Cart::destroy();
            $order_id = $request->vnp_TxnRef;
            $transactions = Transaction::where('order_code',$order_id)->first();
            $orders = Order::where('order_code',$order_id)->get();

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
            $transactions->tr_status =4;
            $transactions->save();

        }
        return view('frontend.ketqua-online');
    }  
}
