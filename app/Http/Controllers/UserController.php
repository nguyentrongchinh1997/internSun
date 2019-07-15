<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests\Login;
use App\Http\Requests\Signup;
class UserController extends Controller
{
   
    // return view login
    	public function getLogin(){
    		return view("client.pages.login");
    	}

    // chức năng đăng nhâp    
    	public function postLogin(Login $request){
    		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    			// echo Auth::user()->name;
                return redirect("admin/category/add");
	        }
	        else{
	            return redirect()->back()->withInput()->with("error", "Đăng nhập không thành công");
	        }
	       
	        
    	}

    // return view singup
    	public function getSignup(){
    		return view("client.pages.signup");
    	}

    // chức năng đăng ký
    	public function postSignup(Signup $request){
    		$user = new Users;
    		$user->name = $request->full_name;
    		$user->email = $request->email;
    		$user->password = bcrypt($request->password);
    		$user->save();
    		return redirect()->back()->withInput()->with("thongbao", "Đăng ký thành công");

    		return view("client.pages.signup");
    	}

}
