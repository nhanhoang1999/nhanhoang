<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Cart;
use Auth;
class LoginController extends Controller
{
    //
    public function getLogin(){
        $data['cartlist'] = Cart::content();
        return view('frontend.login',$data);
    }
    public function postLogin(Request $request){
    	$arr = ['email'=>$request->username,'password'=>$request->password];
    	if($request->rememberme = 'forever')
    	{
    		$remember = true;
    	}else{
    		$remember = false;
    	}
    	if(Auth::guard('customers')->attempt($arr,$remember)){
    		return redirect()->intended('view');
    	}else{
    		return back()->withInput()->with('error','Tài khoản mật khẩu không chính xác !');
    	}
    }
    public function getLoginOut(){
    	Auth::guard('customers')->logout();
    	return redirect()->intended('view');
    }
}
