<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\User;
use App\Http\Requests\Admin\NewsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
	public function index() {
		$news = News::with('categories')->with('users')->get();
		return view('admin.news.index', compact('news'));
	}

	public function create() {
		$data = Category::select('id','name','parent_id')->get();
		return view('admin.news.add', compact('data'));
	}

	public function store(NewsRequest $request) {
		$news = new News();
    	$news->username = $request->name;
    	$image = $request->file('image');
    	if (strlen ($image) > 0 ) {
    		// $file = $request->file('image')->getClientOriginalName();
	    	$input['image'] = time().'.'.$image->getClientOriginalExtension();
	    	$destinationPath = public_path('images/news');
	    	$image->move($destinationPath, $input['image']);
		 	$news->image = $input['image'];
    	}
    	$news->description = $request->description;
	 	$news->category_id = $request->category_id;
	 	$news->user_id = Auth::user()->id;
	 	$news->status = 1;
	 	if ($news->save()) {
	 		return redirect()->route('adminnews');
	 	}else{
	 		return redirect()->back();
	 	}
	}

	public function edit($id) {
		$data = Category::select('id','name','parent_id')->get();
		$new = News::find($id);
		return view('admin.news.edit', compact('data', 'new'));
	}

	public function update(NewsRequest $request, $id) {
		$new = News::find($id);

		$new->username = $request->name;
    	$image = $request->file('image');
    	if (strlen ($image) > 0 ) {
    		$image_path = public_path("images/news/{$new->image}");
    		if (File::exists($image_path)) {
		        File::delete($image_path);
		    }
    		// $file = $request->file('image')->getClientOriginalName();
	    	$input['image'] = time().'.'.$image->getClientOriginalExtension();
	    	$destinationPath = public_path('images/news');
	    	$image->move($destinationPath, $input['image']);
		 	$new->image = $input['image'];
    	}
    	$new->description = $request->description;
	 	$new->category_id = $request->category_id;
	 	$new->user_id = Auth::user()->id;
	 	$new->status = 1;
	 	if ($new->save()) {
	 		return redirect()->route('adminnews');
	 	}else{
	 		return redirect()->back();
	 	}
	}

	public function new($id) {
		$new = News::find($id);
		$new->status = 1;
		if ($new->save()) {
			return redirect()->route('adminnews');
		}else{
			return redirect()->back();
		}
	}

	public function destroy($id) {
		$new = News::find($id);
		if (strlen ($new->image) > 0){
			$image_path = public_path("images/news/{$new->image}");
			if (File::exists($image_path)) {
		        File::delete($image_path);
		    }
		}
		if ($new->delete($id)) {
			return redirect()->route('adminnews');
		}else{
			return redirect()->back();
		}
	}
}
