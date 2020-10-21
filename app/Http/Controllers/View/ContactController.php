<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; 
use Cart;

class ContactController extends Controller
{
    //
	public function getContact(){
		$data['cartlist'] = Cart::content();
		return view('frontend.contact-us',$data);
	}
}
