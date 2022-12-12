@extends('admin.index')

@section('content')
    <!-- Main content -->

    <div class="box">
        <div class="box-body ">
            {!! Form::open(['url'=>aurl('states/'.$states->id),'method'=>'put','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('state_name_ar',trans('admin.state_name_ar')) !!}
                {!! Form::text('state_name_ar',$states->state_name_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('state_name_en',trans('admin.state_name_en')) !!}
                {!! Form::text('state_name_en',$states->state_name_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
                {!! Form::select('country_id',App\Models\Country::pluck('country_name_ar','id'),old('country_name_ar'),['class'=>'form-control','placeholder'=>'اختر الدوله']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('state_name_ar',trans('admin.state_name_ar')) !!}
                {!! Form::select('city_id',App\Models\City::pluck('city_name_ar','id'),old('city_name_ar'),['class'=>'form-control','placeholder'=>'اختر المدينه']) !!}
            </div>

        {!! Form::submit(trans('admin.states_edit'),['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- /.row -->
@endsection