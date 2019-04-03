<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() {
    	if (!Auth::check()){
    		return view('admin.login.login');
    	}else{
    		return redirect()->route('home.index');
    	}
    }

    public function store(LoginRequest $request) {
    	$login = ['username' => $request->username, 'password' => $request->password];
    	if (Auth::attempt($login)) {
            return redirect()->route('home.index')->with('success','Login successfully!');
        }else{
        	return redirect()->back()->with('error','Username or Password incorrect!!!');
        }
    }

    public function destroy() {
    	Auth::logout();
    	return redirect()->route('adminlogin')->with('success','Logout successfully!');
    }
}
