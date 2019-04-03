<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\User;
use App\Http\Requests\Admin\NewsRequest;

class NewsController extends Controller
{
	public function index() {
		$news = News::with('categories')->with('users')->get();
		dd($news);
		return view('admin.news.index', compact('news'));
	}

	public function create() {

	}

	public function store() {

	}

	public function edit() {

	}

	public function update() {

	}

	public function destroy() {

	}
}
