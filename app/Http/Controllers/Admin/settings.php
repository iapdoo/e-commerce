<?php

namespace App\Http\Controllers\Admin;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class settings extends Controller
{
    public function setting(){
        return view('admin.settings',['title'=>trans('admin.settings')]);
    }
    public function setting_save(){
        $data=  $this->validate(\request(),[
            'logo'=>validate_image(),
            'icon'=>validate_image()
        ],[], [
            'logo'=>trans('admin.logo'),
            'icon'=>trans('admin.icon')
        ]);
        if (\request()->hasFile('logo')){
            $data['logo']=up()->upload([
               'file'=>'logo',
               'path'=>'settings',
               'upload_type'=>'single',
               'delete_file'=>setting()->logo,

            ]);
        }
        if (\request()->hasFile('icon')){
            $data['icon']=up()->upload([
            'file'=>'icon',
            'path'=>'settings',
            'upload_type'=>'single',
            'delete_file'=>setting()->icon,

        ]);
        }

        Setting::orderBy('id','desc')->update($data);
        session()->flash('success',trans('admin.record_updated_setting'));
        return redirect(aurl('settings'));
    }
}
