<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title=trans('admin.cities');
        $cities= City::orderBy('id','desc')->paginate(6);
        return view('admin.cities.index',compact('cities','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create',['title'=>trans('admin.cities_add')]);
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
            'city_name_ar'   =>'required',
            'city_name_en'   =>'required',
//            'country_id'     =>'required',
        ],[],[
            'city_name_ar'   =>trans('admin.country_name_ar'),
            'city_name_en'   =>trans('admin.country_name_en'),
//            'country_id'   =>trans('admin.country_id'),
        ]);

        City::create($data);
        session()->flash('success',trans('admin.cities_added'));
        return redirect(aurl('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities=City::find($id);
        $title=trans('admin.cities_edit');
        return view('admin.cities.edit',compact('cities','title'));
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
            'city_name_ar'   =>'required',
            'city_name_en'   =>'required',
//            'country_id'   =>'required',
        ],[],[
            'city_name_ar'   =>trans('admin.country_name_ar'),
            'city_name_en'   =>trans('admin.country_name_en'),
//            'country_id'   =>trans('admin.country_id'),
        ]);

        City::where('id',$id)->update($data);
        session()->flash('success',trans('admin.cities_updated'));
        return redirect(aurl('cities'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

       $cities= City::find($id);
        $cities->delete();
        session()->flash('success',trans('admin.cities_deleted'));
        return redirect(aurl('cities'));
    }

}
