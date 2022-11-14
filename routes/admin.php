<?php

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Config::set('auth.defines','admin');


    Route::get('login','AdminAuth@login');
    Route::post('login','AdminAuth@dologin');
    Route::get('forgot/password','AdminAuth@forgot_password');
    Route::post('forgot/password','AdminAuth@forgot_password_post');
    Route::get('reset/password/{token}','AdminAuth@reset_password');
    Route::post('reset/password/{token}','AdminAuth@reset_password_final');

    Route::get('users/user','UsersController@get_user');
    Route::get('users/vendor','UsersController@get_vendor');
    Route::get('users/company','UsersController@get_company');

    Route::group(['middleware'=>'admin:admin'],function (){
        Route::resource('admin','AdminController');
        Route::resource('users','UsersController');

        Route::get('/',function (){
            return view('admin.home');
        });
        Route::any('logout','AdminAuth@logout');
        Route::get('lang/{lang}',function ($lang){
            session()->has('lang')?session()->forget('lang'):'';
            $lang=='ar'?session()->put('lang','ar'):session()->put('lang','en');
            return back();
        });


    });
});
