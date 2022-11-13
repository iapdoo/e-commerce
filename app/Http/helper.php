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
// end dir() is helper function  that can change direction from right to left
