<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\User;

class NewsController extends Controller
{
    public function show($id) {
    	$new = New::with('categories')->with('users')->find($id);
    	return view('frontend.news.show');
    }
}
