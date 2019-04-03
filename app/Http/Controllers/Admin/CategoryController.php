<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $data = Category::select('id','name','parent_id')->get();
    	return view('admin.categories.index', compact('data'));
    }

    public function create() {
        $data = Category::select('id','name','parent_id')->get();
    	return view('admin.categories.add', compact('data'));
    }

    public function store(CategoryRequest $request) {
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('admincate');
    }

    public function edit($id) {
        $data = Category::select('id','name','parent_id')->get();
        $category = Category::find($id);
        return view('admin.categories.edit', compact('data','category'));
    }

    public function update(CategoryRequest $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admincate');
    }

    public function destroy(Request $request,$id) {
        $id = $request->id;
        $parent = Category::where('parent_id',$id)->count();
        if($parent == 0){
            $category = Category::find($id);
            $category->delete($id);
            return response()->json([
                'success' => "ban da xoa thanh cong"
            ]);
        }else{
            return response()->json([
                'error' => "xoa that bai"
            ]);
        }     
    }
}
