<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Admin;
class UsersController extends Controller
{
	public function getRegister_auth()
	{
		return view('backend.custom_auth.register');
	}
	public function PostRegister_auth(Request $Request)
	{
		$admin = new Admin();
		$admin->name = $Request->Name;
		$admin->email = $Request->Email;
		$admin->phone = $Request->Phone;
		$admin->password = bcrypt($Request->Password);
		$admin->save();
		$admin->roles()->attach(Roles::where('r_name', 'user')->first());
    	return redirect('/register')->with('error','Đăng kí thành công');
	}
	public function getUsers()
	{
		$data['users'] = Admin::with('roles')->orderBy('id','desc')->get();
		return view('backend.users',$data);
	}
	public function assign_roles(Request $Request)
	{
        $user = Admin::where('email',$Request->admin_email)->first();
        $user->roles()->detach();
        if($Request->author_role){
        	$authorRoles = Roles::where('r_name','author')->first();
           $user->roles()->attach($authorRoles);     
        }
        if($Request->user_role){
        	$userRoles = Roles::where('r_name','user')->first();
           $user->roles()->attach($userRoles);     
        }
        if($Request->admin_role){
        	$adminRoles = Roles::where('r_name','admin')->first();
           $user->roles()->attach($adminRoles);     
        }
        return back()->with('error','Sửa quyền thành công');	
	}	
}
