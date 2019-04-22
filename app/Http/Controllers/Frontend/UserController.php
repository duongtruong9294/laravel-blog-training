<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Admin\UserRequest;
use App\Role;
use Mail;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create() {
        $roles = Role::all();
    	return view('frontend.user.create', compact('roles'));
    }

    public function store(UserRequest $request) {
    	$user = new User();
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->fullname = $request->fullname;
    	$user->address = $request->address;
        $user->token_verify = Str::random(30);
        $roles = $request->roles;
        $user->save();

        $this->sendEmail($user);

        return redirect()->back()->with('success','Check Mail Please!!!');
        // return $user;
        // if($user) {
        //     return redirect(route('verifyEmailFirst'));
        // }








     //    if($user) {
     //        foreach ($roles as $role) {
     //            $user->roles()->attach($role);
     //        }
    	// 	return redirect()->route('home.index')->with('success','Register successfully!');
    	// }else{
    	// 	return redirect()->back()->with('error','Register False !!!');
    	// }


    }

    public function sendEmail($thisUser) {
        Mail::to($thisUser['email'])->send(new VerifyEmail($thisUser));
    }

    public function verifyEmailFirst() {
        return view('email.verifyEmailFirst');
    }

    public function sendEmailDone($email, $token) {
        $user = User::where(['email' => $email, 'token_verify' => $token])->first();
        if($user) {
            User::where(['email' => $email, 'token_verify' => $token])->update(['confirmed' => '1' , 'token_verify' => NULL]);
            return redirect()->route('adminlogin')->with('success','Please Login !!!');
        }else{
            return 'user not found';
        }
    }
}
