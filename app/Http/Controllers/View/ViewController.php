<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Posts;
use App\Models\Comment;
use Cart;
class ViewController extends Controller
{
    //
    public function getPageHome(){
        $data['cartlist'] = Cart::content();
        $data['product'] = Product::where('p_featured',1)->orderBy('p_id','desc')->take(10)->get();
        $data['new'] = Product::orderBy('p_id','desc')->take(10)->get();
        $data['sellings'] = Product::orderBy('p_pay','desc')->take(10)->get();
        $data['posts'] = Posts::orderBy('post_id','desc')->take(3)->get();
        $data['bestsales'] = Product::orderBy('p_promotion','desc')->take(1)->get();
        return view('frontend.index',$data);
    }

    public function getSingle($id){
        $data['cartlist'] = Cart::content();
        $data['product'] = Product::find($id);
        $data['new'] = Product::orderBy('p_id','desc')->take(10)->get();
        $data['comments']=  Comment::where('com_product',$id)->orderBy('com_id','desc')->get();
        return view('frontend.product-details',$data);
    }

    public function getNews(){
        $data['cartlist'] = Cart::content();
        $data['posts'] = PostS::all();
        return view('frontend.news',$data);
    }
    public function getCate($id){
        $data['catename'] = Category::where('id',$id)->get();
        $data['items'] = Product::where('p_cate_id',$id)->orderBy('p_id','desc')->get();
        return view('frontend.categories',$data);
    }

    public function getSearch(Request $request)
    {
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = Product::where('p_name','like','%'.$result.'%')->orderBy('p_id','desc')->get();
        return view('frontend.search',$data);
    }
    public function postComments(Request $request,$id)
    {
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back()->with('error','Bạn đã bình luận thành công!');
    }
    public function post_details($id)
    {
        $data['details'] = posts::where('post_id',$id)->get();
        return view('frontend.post-details',$data);
    }
}
