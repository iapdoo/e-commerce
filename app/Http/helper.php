<?php
if (!function_exists('aurl')){
    function aurl($url=null){
        return url('admin/'.$url);
    }
}


    if (!function_exists('admin')){
        function admin(){
            return auth()->guard('admin');
        }
    }
    // Active menu function
    if (!function_exists('active_menu')){
        function active_menu($link){
            if (preg_match('/'.$link.'/i',Request::segment(2))){
                return ['menu-open','display:block'];
            }else{
                return ['',''];
            }
        }
    }


// start lang() is helper function that can change language from ar to en
if (!function_exists('lang')){
    function lang(){
        if (session()->has('lang')){
            return session('lang');
        }else{
            return 'en';
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
