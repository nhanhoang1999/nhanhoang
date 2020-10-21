<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
	return view('welcome');
});
Route::group(['namespace'=>'Admin'],function(){

//login admin
	Route::group(['prefix'=>'login','middleware'=>'CheckLoginIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
//Register User Admin
	Route::group(['prefix'=>'register','middleware'=>'roles_admin'],function(){
		Route::get('/','UsersController@getRegister_auth');
		Route::post('/','UsersController@PostRegister_auth');
	});
	Route::get('logout','HomeController@getLogout');

	Route::group(['prefix'=>'admin','middleware'=>'CheckLogoutOut'],function(){
		Route::get('home','HomeController@getHome');

//Danh muc 

		Route::group(['prefix'=>'category','middleware'=>'roles_user'],function(){
			Route::get('/','CategoryController@getCate');

			Route::get('add','CategoryController@getAddCate');
			Route::post('add','CategoryController@postAddCate');

			Route::get('edit/{id}','CategoryController@getEditCate');
			Route::post('edit/{id}','CategoryController@postEditCate');

			Route::get('delete/{id}','CategoryController@getDeleteCate');
		});

//san pham

		Route::group(['prefix'=>'product','middleware'=>'roles_user'],function(){
			Route::get('/','ProductController@getProduct');

			Route::get('add','ProductController@getAddProduct');
			Route::post('add','ProductController@postAddProduct');

			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteProduct');
		});

//Transaction
		Route::group(['prefix'=>'order','middleware'=>'roles_admin'],function(){
			Route::get('/','TransactionController@getTransaction');
			Route::get('view/{id}','TransactionController@getViewOrder');
			Route::get('active/{id}','TransactionController@getActive');
			Route::get('delete/{id}','TransactionController@deleteOrder');
			Route::get('print_pdf/{check_out}','TransactionController@print_order');
		});
//thong ke
		Route::group(['prefix'=>'thongke','middleware'=>'roles_admin'],function(){
			Route::get('/','statisticalController@getStatistical');
		});
// new post
		Route::group(['prefix'=>'posts','middleware'=>'roles_author'],function(){
			Route::get('/','PostController@getPosts');
			Route::get('add','PostController@getAddPosts');
			Route::post('add','PostController@postAddPosts');
			Route::get('delete/{id}','PostController@deletePost');
		});
// phan quyen user
		Route::group(['prefix'=>'users','middleware'=>'roles_admin'],function(){
			Route::get('/','UsersController@getUsers');
			Route::post('/','UsersController@assign_roles');
		});
	});
});
//--Customer - view
//view
Route::group(['namespace'=>'View'],function(){
	Route::group(['prefix'=>'view'],function(){
		Route::get('/','ViewController@getPageHome');
		Route::get('detail/{id}/{slug}.html','ViewController@getSingle');
		Route::get('contact','ContactController@getContact');
		Route::get('new','ViewController@getNews');
		Route::get('{id}/{slug}.html','ViewController@getCate');
//tim kiem san pham
		Route::get('search','ViewController@getSearch');
//binhluan san pham
		Route::post('detail/{id}/{slug}.html','ViewController@postComments');
//chi tiet bai viet
		Route::get('detail-post/{id}','ViewController@post_details');
	});
//history
	Route::group(['prefix'=>'history','middleware'=>'CheckLoginUser'],function(){
		Route::get('processing/{id}','HistoryController@getHistoryProcess');
		Route::get('all/{id}','HistoryController@getFormHistory');
		Route::get('transporting/{id}','HistoryController@getHistoryTransporting');
		Route::get('received/{id}','HistoryController@getHistoryReceived');
		Route::get('active/{id}','HistoryController@getActive');
		Route::get('delete/{id}','HistoryController@getDelete');
	});
});
// mua hàng
Route::group(['namespace'=>'Order','middleware'=>'CheckLoginUser'],function(){
	Route::group(['prefix'=>'shopping'],function(){
		Route::post('add','CartController@addProduct');
		Route::post('update-qty','CartController@updateQty');
		Route::get('cart','CartController@getCart');
		Route::get('clean','CartController@getClean');
		Route::get('delete/{rowId}','CartController@getDeleteCart');
	});

	//thanh toan
	Route::group(['prefix'=>'gio-hang','middleware'=>'CheckLoginUser'],function(){
		Route::get('thanhtoan','CartController@getPay');
		Route::post('thanhtoan','CartController@postPay');
		Route::get('online','CartController@get_online');
		Route::post('online','CartController@post_online');
		Route::get('ketqua','CartController@return_online');


	});
});

//lien he

//dang nhap,dang ki user
Route::group(['namespace'=>'Customers'],function(){
	Route::group(['prefix'=>'customers'],function(){
		Route::get('login','LoginController@getLogin');
		Route::post('login','LoginController@postLogin');
		Route::get('logout','LoginController@getLoginOut');

		Route::get('register','RegisterController@getRegister');
		Route::post('register','RegisterController@postRegister');
//reset password
		Route::get('reset','ResetpassController@resetPassword');
		Route::post('reset','ResetpassController@sendEmail');
		Route::get('reset/password','ResetpassController@Password')->name('get.link.reset.password');
		Route::post('reset/password','ResetpassController@changePassword');
//login fb
		Route::get('/login-facebook', 'AuthController@redirectToFacebook');
		Route::get('/callback', 'AuthController@handleFacebookCallback');
	});
});

Route::get('query-sql-injection',function (){
	$name =" 'nhanhoang' OR 1=1 ";
	return DB::select(
		DB::raw("SELECT *FROM users WHERE name=$name")
	);
});
Route::get('query-an-toan',function (){
	$name =" 'nhanhoang' OR 1=1 ";
	return DB::select(
		DB::raw("SELECT *FROM users WHERE name= ?", [$name])
	);
});
