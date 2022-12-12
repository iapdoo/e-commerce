<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title=trans('admin.states');
        $states= State::with(['country', 'city'])->orderBy('id','desc')->paginate(6);
//        return dd($states);
        return view('admin.states.index',compact('states','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.states.create',['title'=>trans('admin.states_add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'state_name_ar'   =>'required',
            'state_name_en'   =>'required',
        ],[],[
            'state_name_ar'   =>trans('admin.country_name_ar'),
            'state_name_en'   =>trans('admin.country_name_en'),
        ]);
        $data['country_id']=$request->country_id;
        $data['city_id']=$request->city_id;
        State::create($data);
        session()->flash('success',trans('admin.states_added'));
        return redirect(aurl('states'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states=State::find($id);
        $title=trans('admin.states_edit');
        return view('admin.states.edit',compact('states','title'));
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
            'state_name_ar'   =>'required',
            'state_name_en'   =>'required',
        ],[],[
            'state_name_ar'   =>trans('admin.country_name_ar'),
            'state_name_en'   =>trans('admin.country_name_en'),
        ]);
        $data['country_id']=$request->country_id;
        $data['city_id']=$request->city_id;
        State::where('id',$id)->update($data);
        session()->flash('success',trans('admin.states_updated'));
        return redirect(aurl('states'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $states= State::find($id);
        $states->delete();
        session()->flash('success',trans('admin.states_deleted'));
        return redirect(aurl('states'));
    }

}
