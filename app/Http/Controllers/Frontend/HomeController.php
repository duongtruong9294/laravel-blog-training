<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\User;

class HomeController extends Controller
{
    public function index() {
    	$news = News::with('categories')->with('users')->get();
    	return view('frontend.home.index', compact('news'));
    }

    public function search(Request $request) {
    	$key = $request->search;
    	$news = News::with('categories')->with('users')->where('username','like','%'. $key .'%')->get();
    	return response()->json([
            'data' => $news,
            'key' => $key
        ]);
    }
}
