<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
    	$users = User::paginate(10);
    	return view('admin.users.index', compact('users'));
    }

    public function edit(User $users) {
    	// $users = User::find($id);
    	return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, User $users) {
    	// $users = User::find($id);
    	$users->email = $request->email;
    	$users->fullname = $request->fullname;
    	$users->address = $request->address;
        $users->save();
        if($users) {
        	return redirect()->route('adminusers')->with('success','Updated User successfully!');
        }else{
        	return redirect()->back()->with('error','Updated User False !!!');
        }
    }

    public function destroy($id) {
    	$users = User::find($id);
    	$users->delete($id);
    	if($users) {
    		return redirect()->route('adminusers')->with('success','Deleted User successfully!');
    	}else{
    		return redirect()->back()->with('error','Deleted User False !!!');
    	}
    }
}
