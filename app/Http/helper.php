<?php
if (!function_exists('aurl')){
    function aurl($url=null){
        return url('admin/'.$url);
    }
}
//upload function
if (!function_exists('up')){
    function up(){
        return new \App\Http\Controllers\Upload;
    }
}
//end upload function
// function upload image  to site setting
if (!function_exists('setting')){
    function setting($url=null){
        return \App\Setting::orderBy('id','desc')->first();
    }
}

// start function admin function

    if (!function_exists('admin')){
        function admin(){
            return auth()->guard('admin');
        }
    }
// end function admin function

// start function Active menu function
    if (!function_exists('active_menu')){
        function active_menu($link){
            if (preg_match('/'.$link.'/i',Request::segment(2))){
                return ['menu-open','display:block'];
            }else{
                return ['',''];
            }
        }
    }
//start function Active menu function

// start lang() is helper function that can change language from ar to en
if (!function_exists('lang')){
    function lang(){
        if (session()->has('lang')){
            return session('lang');
        }else{
            return setting()->main_lang;
        }
    }

}
// end lang() is helper function that can change language from ar to en

// start dir() is helper function  that can change direction from right to left

if (!function_exists('direction')){
    function direction(){
        if (session()->has('lang')){
            if ( session('lang')=='ar'){
                return 'rtl';
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }
    }
}
function user_type(){
    $array=[
       'user'=> trans('admin.user')  ,
        'vendor' =>trans('admin.vendor')  ,
       'company' =>trans('admin.company')  ,

    ];
    return $array;
}
// end dir() is helper function  that can change direction from right to left

// end validate image helper function  that can validate extnition
if (!function_exists('validate_image')){
    function validate_image($ext=null){
        if ($ext===null){
            return 'image|mimes:jpg,jpeg,png,gif';
        }else{
            return 'image|mimes'.$ext;

        }

    }
}
// end validate image helper function  that can validate extnition
