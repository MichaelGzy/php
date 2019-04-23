<?php
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


################################
#首页------------start
Route::get('/','index\IndexController@index')->name('home')->middleware(['hotkeywords']);
Route::get('/hot','index\IndexController@indexHot')->name('home.hot');
//个人信息
Route::get('/userdetail','user\UserController@getDetail')->name('u.detail');//个人信息
//首页-------------end

###################################
#前台
//前台登录-----------start
Route::group(['namespace'=>'login','prefix'=>'login','middleware'=>'hotkeywords'],function (){
    //登录页面
    Route::get('','LoginController@index')->name('l.login');
    //登录处理
    Route::post('','LoginController@login')->name('l.login');
    //登出
    Route::get('/logout','LoginController@logout')->name('l.logout');
});
//前台登陆--------------end

//文章组---------------------start
Route::group(['namespace'=>'article','prefix'=>'article','middleware'=>['ckl','hotkeywords']],function (){
    //显示文章列表
    Route::get('/','ArticleController@index')->name('a.list');
    Route::get('hot','ArticleController@articleHot')->name('a.hot');
    Route::get('detail/{id}','ArticleController@detail')->name('a.detail')->middleware(['crn']);

    //添加文章
    Route::post('add','ArticleController@addArticleSave')->name('a.add');
    Route::get('add','ArticleController@addArticle')->name('a.add');

    //修改文章
    Route::put('edit','ArticleController@updateArticleSave')->name('a.edit');
    Route::get('edit','ArticleController@updateArticle')->name('a.edit');

    //删除文章
    Route::delete('/del/{id}','ArticleController@delArticle')->name('a.del');
});
//文章组---------------end

//后台路由
include('admin.php');



