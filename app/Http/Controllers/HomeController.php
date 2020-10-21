<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Cart;
class HomeController extends Controller
{
    //
    public function getPageHome(){
        $data['cartlist'] = Cart::content();
    	$data['catelist'] = Category::all();
    	$data['product'] = Product::where('p_featured',1)->orderBy('p_id','desc')->take(10)->get();
        $data['new'] = Product::orderBy('p_id','desc')->take(10)->get();
     	return view('frontend.index',$data);
    }
}
