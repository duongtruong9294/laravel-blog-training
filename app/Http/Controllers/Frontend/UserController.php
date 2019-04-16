<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Admin\UserRequest;
use App\Role;

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
        $roles = $request->roles;
        $user->save();
        if($user) {
            foreach ($roles as $role) {
                $user->roles()->attach($role);
            }
    		return redirect()->route('home.index')->with('success','Register successfully!');
    	}else{
    		return redirect()->back()->with('error','Register False !!!');
    	}
    }
}
