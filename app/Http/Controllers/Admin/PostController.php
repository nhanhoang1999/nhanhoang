<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Posts;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Facades\Storage;
use DB;
use File;

class PostController extends Controller
{
    //
	public function getPosts(){
		$data['posts'] = Posts::orderBy('post_id','desc')->take(10)->get();
		return view('backend.postlist',$data);

	}

	public function getAddPosts(){
		return view('backend.addpost');
	}
	public function postAddPosts(AddProductRequest $request){
		$posts = new Posts;
		$imgPath = $request->post_img->store('uploads','public');
		$posts->post_title = $request->post_title;
		$posts->post_slug = str::slug($request->post_title);
		$posts->post_img = $imgPath;
		$posts->post_desc = $request->post_desc;
		$posts->post_content = $request->post_content;
		$posts->post_meta_keywords = $request->post_meta_keywords;
		$posts->post_meta_desc = $request->post_meta_desc;
		$posts->save();
		return back()->with('error','Đã thêm bài viết mới thành công');
	}
	public function deletePost($id){
		$data = Posts::find($id);

		$destinationPath = 'lib/storage/app/public/'.$data->post_img;

		if(file_exists($destinationPath)){
			unlink($destinationPath);
		}
		$data->delete();
		return back()->with('error','Đã xóa thành công');
	}
}
