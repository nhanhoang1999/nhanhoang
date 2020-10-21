<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customers;
use Cart;

class RegisterController extends Controller
{
    //
    public function getRegister(){
        $data['cartlist'] = Cart::content();
        return view('frontend.register',$data);
    }
    public function postRegister(Request $request){
    	$customer = new Customers;
    	$customer->name = $request->name;
    	$customer->email = $request->email;
    	$customer->phone = $request->phone;
    	$customer->password = bcrypt($request->password);
    	$customer->save();
    	if($customer->id){
    		return redirect('customers/login')->with('error','Đăng kí thành công . Đăng nhập ngay');
    	}
    	return back();
    }
}
