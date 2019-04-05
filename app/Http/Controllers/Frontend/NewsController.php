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
    	$new = News::with('categories')->with('users')->find($id);
    	return view('frontend.news.show', compact('new'));
    }

    public function postBycate($id) {
    	$news_by_cate = News::with('categories')->with('users')->where('category_id',$id)->get();
    	return view('frontend.news.post_detail_cate', compact('news_by_cate'));
    }
}
