<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Tag;

class TagController extends Controller
{
    public function index() {
    	$tags = Tag::orderBy('created_at','desc')->paginate(10);
    	return view('admin.tags.index', compact('tags'));
    }

    public function create() {
    	return view('admin.tags.add');
    }

    public function store(TagRequest $request) {
    	$tag = new Tag();
    	$tag->name = $request->name;
    	if($tag->save()){
    		return redirect()->route('admintags')->with('success','Created Tag successfully!');
    	}else{
    		return redirect()->route('admintags')->with('error','Created Tag False !!!');
    	}
    }

    public function edit($id) {
    	$tag = Tag::find($id);
    	return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id) {
    	$tag = Tag::find($id);
    	$tag->name = $request->name;
    	if ($tag->save()){
    		return redirect()->route('admintags')->with('success','Updated Tag successfully!');
    	}else{
    		return redirect()->route('admintags')->with('error','Updated Tag False !!!');
    	}
    }

    public function destroy($id) {
    	$tag = Tag::find($id);
    	if ($tag->delete($id)) {
    		return redirect()->route('admintags')->with('success','Deleted Tag successfully!');
    	}else{
    		return redirect()->route('admintags')->with('error','Deleted Tag False !!!');
    	}
    }
}
