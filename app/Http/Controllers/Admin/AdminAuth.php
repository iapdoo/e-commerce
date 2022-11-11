<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use DB;
use Mail;
use Carbon\Carbon;
class AdminAuth extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public  function dologin(){
        $remember=\request('remember')==1?true :false;
        if (admin()->attempt(['email'=>\request('email'),'password'=>\request('password')],$remember
        )){
            return redirect('admin');
        }else{
            session()->flash('error',trans('admin.incorrect_information_login'));
            return redirect(aurl('login'));
        }

    }
    public function logout(){
        admin()->logout();
        return redirect(aurl('login'));
    }
    public function forgot_password(){
        return view('admin.forgot_password');
    }
    public  function forgot_password_post(){
    $admin=\App\Admin::where('email',\request('email'))->first();
        if (!empty($admin)){
            $token=app('auth.password.broker')->createToken($admin);
            $data=DB::table('password_resets')->insert([
               'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),

            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin ,'token'=>$token]));
            session()->flash('success',trans('admin.links_reset_sent'));
            return back();
        }
    return back();
    }
    public function reset_password($token){
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();

        if (!empty($check_token)){
            return view('admin.reset_password',['data'=>$check_token]);
        }else{
            return redirect(aurl('forgot/password'));
        }
    }

    public function reset_password_final($token){

        $this->validate(\request(),[
            'password'=>'required',
            'password_conformation'=>'required'
        ],[],[
            'password'=>'password',
            'password_conformation'=>'password conformation',
        ]);
        $check_token=DB::table('password_resets')->where('token',$token)
            ->where('created_at','>',Carbon::now()->subHour(2))->first();

        if (!empty($check_token)){
            $admin=\App\Admin::where('email',$check_token->email)->update([
                'email'=>$check_token->email,
                'password'=>bcrypt(\request('password'))
            ]);
            DB::table('password_resets')->where('email',\request('email'))->delete();
            admin()->attempt(['email'=>$check_token->email,'password'=>\request('password')],true);
            return redirect(aurl());
        }else{
            return redirect(aurl('forgot/password'));
        }

        }
}
