<?php
use think\Route;
    Route::get('index','admin/Index/index');
    Route::get('design','admin/Design/design');
    Route::get('add','admin/Design/add');
    Route::get('del','admin/Design/del');
    Route::get('edit','admin/Design/edit');
    Route::post('edit','admin/Design/edit');
    Route::post('add','admin/Design/add');

    Route::get('login','admin/Login/login');
    Route::get('logout','admin/Login/logout');
    Route::post('login','admin/Login/login');

    Route::get('insert','admin/Insert/insert');
    Route::get('system','admin/System/system');

    Route::get('article','admin/Article/article');
    Route::get('article_add','admin/Article/add');
    Route::get('article_edit','admin/Article/edit');
    Route::get('article_del','admin/Article/del');
    Route::post('article_add','admin/Article/add');
    Route::post('article_edit','admin/Article/edit');

    Route::get('link','admin/Link/link');
    Route::get('link_add','admin/Link/add');
    Route::post('link_add','admin/Link/add');
    Route::get('link_del','admin/Link/del');
    Route::get('link_edit','admin/Link/edit');
    Route::post('link_edit','admin/Link/edit');

    Route::get('admin','admin/Admin/admin');
    Route::get('admin_add','admin/Admin/add');
    Route::post('admin_add','admin/Admin/add');
    Route::get('admin_del','admin/Admin/del');
    Route::get('admin_edit','admin/Admin/edit');
    Route::post('admin_edit','admin/Admin/edit');









/*Route::group(['name'=>'home'],function(){
    Route::get('/','index/Index/index');
    Route::get('list','index/Lst/lst');
    Route::get('article','index/Article/article');
    Route::get('search','index/Search/search');
    Route::get('tags','index/Tags/tags');
});*/
Route::group('home',function (){
    Route::get('/index','index/Index/index');
    Route::get('/list','index/Lst/lst');
    Route::get('/article','index/Article/article');
    Route::get('/search','index/Search/search');
    Route::post('/search','index/Search/search');
    Route::get('/tags','index/Tags/tags');
});