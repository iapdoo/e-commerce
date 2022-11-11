<?php

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
       Config::set('auth.defines','admin');
       Route::group(['middleware'=>'admin:admin'],function (){
    Route::get('login','AdminAuth@login');
           Route::get('/',function (){
               return view('admin.home');
           });

       });
});
