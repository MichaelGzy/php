<?php

//use Illuminate\Routing\Route;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//获取根目录路由
Route::get('/', function () {
    return view('welcome');
})->name('home');
Auth::routes();

//登录
Route::get('login','login\loginController@login');
Route::post('dologin','login\loginController@dologin');
//获取文章路由分组
Route::group(['prefix'=>'article'],function(){
    //获取列表页
    Route::get('list','article\ArticleController@listArticle');
    //获取列表数据
    Route::get('getlist','article\ArticleController@getList');






    Route::post('add','ArticleController@addArticle');
    Route::post('update','ArticleController@updateArticle');
    Route::delete('del','ArticleController@delArticle');
});


//创建auth模块自动添加的以下内容
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
