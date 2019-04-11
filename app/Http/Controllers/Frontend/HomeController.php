<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\User;

class HomeController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $news = News::with('categories')->with('users');
        if (isset($request->search)){
            $news = $news->where('username','like','%'. $request->search .'%');
        }
        $news = $news->where('status',1)->orderBy('created_at','desc')->get();
        // foreach ($news as $key) {
        //     $key->username = str_replace( $search, '<b style="color:red">'.$search.'</b>', $key->username);
        // }

    	return view('frontend.home.index', compact('news','search'));
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
