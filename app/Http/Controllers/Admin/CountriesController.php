<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title=trans('admin.countries');
        $countries= Country::orderBy('id','desc')->paginate(6);
        return view('admin.countries.index',compact('countries','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create',['title'=>trans('admin.countries_add')]);
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
            'country_name_ar'   =>'required',
            'country_name_en'   =>'required',
            'mob'               =>'required',
            'code'              =>'required',
            'logo'              =>'required|image',
        ],[],[
            'country_name_ar'   =>trans('admin.country_name_ar'),
            'country_name_en'   =>trans('admin.country_name_en'),
            'mob'               =>trans('admin.mob'),
            'code'              =>trans('admin.code'),
            'logo'              =>trans('admin.logo'),
        ]);
        if (\request()->hasFile('logo')){
            $data['logo']=up()->upload([
                'file'=>'logo',
                'path'=>'countries',
                'upload_type'=>'single',
                'delete_file'=>setting()->logo,

            ]);
        }
        Country::create($data);
        session()->flash('success',trans('admin.countries_added'));
        return redirect(aurl('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries=Country::find($id);
        $title=trans('admin.countries_edit');
        return view('admin.countries.edit',compact('countries','title'));
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
            'country_name_ar'   =>'required',
            'country_name_en'   =>'required',
            'mob'               =>'required',
            'code'              =>'required',
            'logo'              =>'sometimes|nullable|'.validate_image(),
        ],[],[
            'country_name_ar'   =>trans('admin.country_name_ar'),
            'country_name_en'   =>trans('admin.country_name_en'),
            'mob'               =>trans('admin.mob'),
            'code'              =>trans('admin.code'),
            'logo'              =>trans('admin.country_logo'),
        ]);
        if (\request()->hasFile('logo')){
            $data['logo']=up()->upload([
                'file'=>'logo',
                'path'=>'countries',
                'upload_type'=>'single',
                'delete_file'=>Country::find($id)->logo,

            ]);
        }

        Country::where('id',$id)->update($data);
        session()->flash('success',trans('admin.countries_updated'));
        return redirect(aurl('countries'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

       $countries= Country::find($id);
       Storage::delete($countries->logo);
        $countries->delete();
        session()->flash('success',trans('admin.countries_deleted'));
        return redirect(aurl('countries'));
    }

}
