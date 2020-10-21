<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customers;
use App\Models\Transaction;
class HomeController extends Controller
{
    //
	public function getHome(){
		$product_count  = Product::count();
		$order_count =Transaction::count();
		$cus_count =Customers::count();
		return view('backend.index',compact('product_count','order_count','cus_count'));
	}
	public function getLogout(){
		Auth::guard('UserAdmin')->logout();
		return redirect()->intended('login');
	}
    //
}
