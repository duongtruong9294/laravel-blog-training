<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\User;
use App\Tag;
use App\Http\Requests\Admin\NewsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
	public function index() {
		$news = News::with('categories')->with('users')->orderBy('created_at','desc')->paginate(10);
		return view('admin.news.index', compact('news'));
	}

	public function create() {
		$data = Category::select('id','name','parent_id')->get();
		$tags = Tag::select('id','name')->get();
		return view('admin.news.add', compact('data', 'tags'));
	}

	public function store(Request $request) {
		
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
	 	$news->status = 0;
	 	$news->save();
	 	if($news) {
			foreach ($request->tags as $tags) {
			    $tag = Tag::where('name', '=', $tags)->first();
			    if ($tag != null) {
			        $news->tags()->attach($tag->id);
			    } else {
			        $tag = new Tag();
			        $tag->name = $tags;
			        $tag->save();
			        $news->tags()->attach($tag->id);
			    }
			}
			return redirect()->route('adminnews')->with('success','Created New successfully!');
	 	}else{
	 		return redirect()->back()->with('error','Created New False !!!');
	 	}
	}

	public function edit(News $news) {
		// $new = News::find($id);
		$data = Category::select('id','name','parent_id')->get();
		return view('admin.news.edit', compact('data', 'news'));
	}

	public function update(NewsRequest $request, News $news) {
		// dd($request->all());
		$news->username = $request->name;
    	$image = $request->file('image');
    	if (strlen ($image) > 0 ) {
    		$image_path = public_path("images/news/{$news->image}");
    		if (File::exists($image_path)) {
		        File::delete($image_path);
		    }
    		// $file = $request->file('image')->getClientOriginalName();
	    	$input['image'] = time().'.'.$image->getClientOriginalExtension();
	    	$destinationPath = public_path('images/news');
	    	$image->move($destinationPath, $input['image']);
		 	$news->image = $input['image'];
    	}
    	$news->description = $request->description;
	 	$news->category_id = $request->category_id;
	 	$news->save();
	 	if ($news) {
	 		$tagList = explode(",", $request->tags);
			foreach ($tagList as $tags) {
			    $tag = Tag::where('name', '=', $tags)->first();
			    if ($tag != null) {
			        $news->tags()->attach($tag->id);
			    } else {
			        $tag = new Tag();
			        $tag->name = $tags;
			        $tag->save();
			        $news->tags()->attach($tag->id);
			    }
			}
	 		return redirect()->route('adminnews')->with('success','Updated New successfully!');
	 	}else{
	 		return redirect()->back()->with('error','Updated New False !!!');
	 	}
	}

	public function new($id) {
		$new = News::find($id);
		$new->status = 1;
		if ($new->save()) {
			return redirect()->route('adminnews')->with('success','Updated Status successfully!');
		}else{
			return redirect()->back()->with('error','Updated Status False !!!');
		}
	}

	public function destroy(News $news) {
		// $new = News::find($id);
		if (strlen ($news->image) > 0){
			$image_path = public_path("images/news/{$news->image}");
			if (File::exists($image_path)) {
		        File::delete($image_path);
		    }
		}
		if ($news->delete($id)) {
			return redirect()->route('adminnews')->with('success','Deleted Status successfully!');
		}else{
			return redirect()->back()->with('error','Deleted Status False !!!');
		}
	}

	public function json(Request $request) {
		return response()->json([
        	'success' => $tags
        ]);
	}
}
