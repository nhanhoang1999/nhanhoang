<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
class ProductController extends Controller
{
    //
  public function getProduct(){
    $data['productlist'] = DB::table('db_product')->join('db_categories','db_product.p_cate_id','=','db_categories.id') ->orderBy('p_id','desc')->get();
   return view('backend.product',$data);
 }

 public function getAddProduct(){
  $data['catelist'] = Category::all();
  return view('backend.addproduct',$data);
}

public function postAddProduct(AddProductRequest $request){
 $product = new Product;
 $imgPath = $request->img->store('uploads','public');
 $product->p_name = $request->name;
 $product->p_slug = str::slug($request->name);
 $product->p_price = $request->price;
 $product->p_number = $request->number;
 $product->p_img = $imgPath;
 $product->p_accessories = $request->accessories;
 $product->p_warranty = $request->warranty;
 $product->p_promotion = $request->promotion;
 $product->p_condition = $request->condition;
 $product->p_status = $request->status;
 $product->p_description = $request->description;
 $product->p_featured = $request->featured;
 $product->p_cate_id = $request->cate;
 $product->save();
 return back()->with('error','Đã thêm sản phẩm thành công');
}
public function getEditProduct($id){
 $data['product'] = Product::find($id);
 $data['listcate'] = Category::all();
 return view('backend.editproduct',$data);
}

public function postEditProduct(Request $request,$id){
  $data = Product::find($id);
  $product = new Product;
  $arr['p_name'] = $request->name;
  $arr['p_slug'] = str::slug($request->name);
  $arr['p_price'] = $request->price;
  $arr['p_accessories'] = $request->accessories;
  $arr['p_warranty'] = $request->warranty;
  $arr['p_promotion']= $request->promotion;
  $arr['p_condition'] = $request->condition;
  $arr['p_status'] = $request->status;
  $arr['p_active'] = $request->active;
  $arr['p_description'] = $request->description;
  $arr['p_featured'] = $request->featured;
  $arr['p_cate_id'] = $request->cate;
  if($request->hasFile('img'))
  {
    $destinationPath = 'lib/storage/app/public/'.$data->p_img;
    if(file_exists($destinationPath)){
      unlink($destinationPath);
    }
    $imgPath = $request->img->store('uploads','public');
    $arr['p_img']=$imgPath;          
  }
  $product::where('p_id',$id)->update($arr);
  return redirect('admin/product')->with('error','Đã sửa sản phẩm thành công'); 	
}

public function getDeleteProduct($id){
  $data = Product::find($id);

  $destinationPath = 'lib/storage/app/public/'.$data->p_img;

  if(file_exists($destinationPath)){
    unlink($destinationPath);
  }
  $data->delete();
  return back()->with('error','Đã xóa sản phẩm thành công');

}
} 