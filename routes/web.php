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

Route::get('chi-tiet-san-pham/{id}',[
	'as' => 'chitietsanpham',
	'uses' => 'PageController@getChiTietSp'
]);


Route::group(['prefix'=>'store'],function(){
	Route::get('index',[
		'as' => 'trang-chu',
		'uses' =>'PageController@getIndex'
	]);

	Route::get('cua-hang',[
		'as' => 'loaisanpham',
		'uses' => 'PageController@getLoaiSp'
	]);

	Route::get('category/{id}','PageController@getCategory');

});

Route::group(['prefix'=>'admin','middleware'=>'CheckLogout'],function(){
	Route::get('them-san-pham',[
		'as' => 'themsanpham',
		'uses' => 'PageController@getThemSp'
	]);

	Route::post('them-san-pham',[
		'as' => 'themsanpham',
		'uses' => 'PageController@postThemSp'
	]);

	Route::get('them-danh-muc',[
		'as' => 'themdanhmuc',
		'uses' => 'PageController@getThemDanhMuc'
	]);

	Route::post('them-danh-muc',[
		'as' => 'themdanhmuc',
		'uses' => 'PageController@postThemDanhMuc'
	]);

	Route::get('sua-san-pham/{id}',[
		'as' => 'suasanpham',
		'uses' => 'PageController@getSuaSanPham'
	]);

	Route::post('sua-san-pham/{id}',[
		'as' => 'suasanpham',
		'uses' => 'PageController@postSuaSanPham'
	]);

	Route::get('sua-danh-muc/{id}',[
		'as' => 'suadanhmuc',
		'uses' => 'PageController@getSuaDanhMuc'
	]);

	Route::post('sua-danh-muc/{id}',[
		'as' => 'suadanhmuc',
		'uses' => 'PageController@postSuaDanhMuc'
	]);


	Route::get('delimg/{id}',[
		'as' => 'delimg',
		'uses' => 'PageController@getdelimg'
	]);




	Route::get('xoa-danh-muc/{id}','PageController@getXoaDanhMuc');
	Route::get('xoa-san-pham/{id}','PageController@getXoaSanPham');
	Route::get('quan-li-san-pham','PageController@getQuanLiSanPham');
	Route::get('logout','PageController@logout');
	Route::get('quan-li-don-hang','PageController@getQuanLiDonHang');
	Route::get('chi-tiet-don-hang/{id}','PageController@getChiTietDonHang');






});




Route::get('login','PageController@getLogin')->middleware('CheckUser');
Route::post('login','PageController@postLogin');


Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','CartController@getAddCart');

	Route::get('show','CartController@getShowCart');
	Route::post('show','CartController@postShowCart');

	Route::get('update','CartController@getUpdateCart');


	Route::get('delete/{id}','CartController@getDeleteCart');
});


