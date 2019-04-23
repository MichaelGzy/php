<?php
###########################################
#后台-------------
//后台页面
Route::group(['namesapce'=>'admin','prefix'=>'admin','middleware'=>['ckl']],function (){

    Route::get('index','admin\Index\IndexController@index')->name('admin.index');
    Route::get('info','admin\Index\IndexController@getInfo')->name('admin.info');

});


Route::group(['namespace'=>'admin'],function (){

//登录页面
//后台登陆-----------------
    Route::group(['namespace'=>'login','prefix'=>'admin/login'],function (){
        Route::get('/','LoginController@index')->name('admin.login');
        //登录处理
        Route::post('/','LoginController@login')->name('admin.login');
        //登出
        Route::get('/logout','LoginController@logout')->name('admin.logout');
    });
//后台登陆---------------




//用户组------------------
    Route::group(['namespace'=>'user','prefix'=>'user','middleware'=>['ckl']],function (){
//用户列表显示
        Route::get('/list','UserController@index')->name('u.list');
        Route::get('/detail','UserController@getDetail')->name('u.userdetail');

//添加页面
        Route::get('add','UserController@addUser')->name('u.add');
//添加用户处理
        Route::post('add','UserController@addUserSave')->name('u.add');

//修改页面
        Route::get('edit/{id}','UserController@updateUser')->name('u.edit');
//修改处理
        Route::put('edit/{id}','UserController@updateUserSave')->name('u.edit');

//删除用户
        Route::delete('del/{id}','UserController@delUser')->name('u.del');
//回收站列表
        Route::get('dellist','UserController@delList')->name('u.dellist');
    });
//用户组--------------------

//角色组------------------
    Route::group(['namespace'=>'roles','prefix'=>'admin/roles','middleware'=>['ckl']],function (){
//用户列表显示
        Route::get('/list','RolesController@index')->name('r.list');
        Route::get('/detail','UserController@getDetail')->name('r.userdetail');

//添加页面
        Route::get('add','UserController@addUser')->name('r.add');
//添加用户处理
        Route::post('add','UserController@addUserSave')->name('r.add');

//修改页面
        Route::get('edit/{id}','UserController@updateUser')->name('r.edit');
//修改处理
        Route::put('edit/{id}','UserController@updateUserSave')->name('r.edit');

//删除用户
        Route::delete('del/{id}','UserController@delUser')->name('u.del');
//回收站列表
        Route::get('dellist','UserController@delList')->name('u.dellist');
    });
//用户组--------------------


});

