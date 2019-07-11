<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Users;
class ClientController extends Controller
{
    // login
    	public function getLogin(){
    		return view("client.pages.login");
    	}

    	public function postLogin(Request $request){
    		$this->validate($request, 
    			[
    				"password"=>"digits_between:6,20",
    			],
    			[
    				"password.digits_between"=>"* Mật khẩu phải có độ dài từ 6-20 ký tự",

    			]
    		);

    		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    			echo Auth::user()->name;
	        }
	        else{
	            return redirect()->back()->withInput()->with("error", "Đăng nhập không thành công");
	        }
	       
	        
    	}

    // singup
    	public function getSignup(){
    		return view("client.pages.signup");
    	}

    	public function postSignup(Request $request){
    		$this->validate($request, 
    			[
    				"email"=>"unique:users,email",
    				"password"=>"digits_between:6,20",
    				"confirm_password"=>"same:password",
    			],
    			[
    				"email.unique"=>"* Email này đã bị trùng",
    				// "full_name.alpha_dash"=>"* Tên đầy đủ không được chưa ký tự đặc biệt",
    				"password.digits_between"=>"* Tên đầy đủ phải có độ dài từ 6-20 ký tự",
    				"confirm_password.same"=>"* Mật khẩu nhập lại không đúng",

    			]
    		);

    		$user = new Users;
    		$user->name = $request->full_name;
    		$user->email = $request->email;
    		$user->password = bcrypt($request->password);
    		$user->save();
    		return redirect()->back()->withInput()->with("thongbao", "Đăng ký thành công");

    		return view("client.pages.signup");
    	}

}
