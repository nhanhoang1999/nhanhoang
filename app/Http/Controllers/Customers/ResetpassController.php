<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestPassword;
use App\Models\Customers;
use Carbon\Carbon;
use Mail;
class ResetpassController extends Controller
{
    //
	public function resetPassword(){
		return view('frontend.email');
	}
	public function sendEmail(Request $request){
		$email = $request->email;
		$checkUser = Customers::where('email',$email)->first();
		if(!$checkUser){
			return redirect()->back()->with('error','Không tồn tại email');
		}
		$code = bcrypt(md5(time().$email));

		$checkUser->code = $code;
		$checkUser->time_code = Carbon::now();
		$checkUser->save();
		$url = route('get.link.reset.password',['code'=>$checkUser->code,'email'=>$email]);
		$data = [
			'route' =>$url
		];
		Mail::send('frontend.link',$data, function($message) use ($email){
			$message->to($email, 'Lấy lại mật khẩu')->subject('Lấy lại mật khẩu');
		});
		return redirect()->back()->with('warning','Yêu cầu lấy lại mật khẩu đã gửi vào mail của bạn');

	}
	public function Password(Request $request){
		$code = $request->code;
		$email = $request->email;

		$checkUser = Customers::where([
			'code'=>$code,
			'email' =>$email
		])->first();
		if(!$checkUser){
			return redirect('view')->with('error','Đường dẫn link không đúng,vui lòng thử lịa sau');
		}

		return view('frontend.resetpass');
	}
	public function changePassword(RequestPassword $request){
		if($request->password){
			$code = $request->code;
			$email = $request->email;
			$checkUser = Customers::where([
				'code'=>$code,
				'email' =>$email
			])->first();
			if(!$checkUser){
				return redirect('view')->with('error','Đường dẫn link không đúng,vui lòng thử lại sau');
			}
			$checkUser->password = bcrypt($request->password);
			$checkUser->save();
			return redirect('customers/login')->with('warning','Đổi mật khẩu thành công,Đăng nhập ngay');
		}
	}
}
