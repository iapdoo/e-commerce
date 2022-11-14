<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $title=trans('admin.adminpanel_user');
        $user= User::orderBy('id','desc')->paginate(6);
        return view('admin.users.index',compact('user','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>trans('admin.add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=$this->validate(\request(),[
            'name'=>'required',
            'Level'=>'required|in:user,company,vendor',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
        ],[],[
            'name'=>trans('admin.name'),
            'Level'=>trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        $data['password']=bcrypt(\request('password'));
        User::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $title=trans('admin.edit');
        return view('admin.users.edit',compact('user','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validate(\request(),[
            'name'=>'required',
            'Level'=>'required|in:user,company,vendor',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
        ],[],[
            'name'=>trans('admin.name'),
            'Level'=>trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        if (\request()->has('password')){
            $data['password']=bcrypt(\request('password'));
        }
        User::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('users'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function multi_delete()
    {
        if (is_array(\request('item'))){
            Admin::destroy(\request('item'));
        }else{
            Admin::find(\request('item'))->delete();
        }
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('admin'));
    }
    public function destroy($id)
    {

        User::find($id)->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }
    public function get_user(){
        $title=trans('admin.adminpanel_user');
        $user= User::where('Level','user')->paginate(6);
        return view('admin.users.get_user',compact('user','title'));

    }
    public function get_vendor(){
        $title=trans('admin.adminpanel_user');
        $user= User::where('Level','vendor')->paginate(6);
        return view('admin.users.get_vendor',compact('user','title'));

    }
    public function get_company(){
        $title=trans('admin.adminpanel_user');
        $user= User::where('Level','company')->paginate(6);
        return view('admin.users.get_company',compact('user','title'));

    }
}
