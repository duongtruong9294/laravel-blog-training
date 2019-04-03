<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function edit() {
    	$users = User::select('id','level')->get();
    	return view('admin.users.edit', compact('users'));
    }
}
