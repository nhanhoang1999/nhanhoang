<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    //
    public function getCate(){
    	$data['catelist'] = Category::orderBy('id','desc')->get();
    	return view('backend.category',$data);
    }

    public function getAddCate(){
    	return view('backend.addcategory');
    }

    public function postAddCate(AddCateRequest $request){
    	$category = new Category;
    	$category->c_name = $request->name;
    	$category->c_slug = str::slug($request->name);
        $category->c_icon = str::slug($request->icon);
        $category->c_description_seo = $request->description;
        $category->c_title_seo = $request->c_title_seo ? $request->c_title_seo : $request->name;
        $category->save();
        return back()->with('error','Đã thêm danh mục sản phẩm thành công');
    }
    public function getEditCate($id){
    	$data['cate'] = Category::find($id);
    	return view('backend.editcategory',$data);
    }

    public function postEditCate(EditCateRequest $request,$id){
    	$category = Category::find($id);
    	$category->c_name = $request->name;
    	$category->c_slug = str::slug($request->name);
        $category->c_icon = str::slug($request->icon);
        $category->c_description_seo = $request->description;
        $category->c_title_seo = $request->c_title_seo ? $request->c_title_seo : $request->name;
        $category->c_active = $request->active;
        $category->save();
        return redirect()->intended('admin/category')->with('error','Đã sửa danh mục sản phẩm thành công');

    }

    public function getDeleteCate($id){
    	$data = Category::find($id);
        $data->delete();
        return back()->with('error','Đã xóa danh mục sản phẩm thành công');
    }
}
