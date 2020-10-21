<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Auth;
use Socialite;
class AuthController extends Controller
{
    //
	public function redirectToFacebook()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function handleFacebookCallback()
	{
		try {
			$user = Socialite::driver('facebook')->user();
			$create['name'] = $user->name;
			$create['email'] = $user->email;
			$create['facebook_id'] = $user->id;
			$userModel = new Customers;
			$createdUser = $userModel->addNew($create);
			Auth::guard('customers')->loginUsingId($createdUser->id);
			return redirect('view');
		} catch (Exception $e) {
			return redirect('sustomers/login');
		}
	}
}
