@extends('admin.index')

@section('content')
    <!-- Main content -->

        <div class="box">
            <div class="box-body ">
                {!! Form::open(['url'=>aurl('cities')]) !!}
                <div class="form-group">
                    {!! Form::label('city_name_ar',trans('admin.city_name_ar')) !!}
                    {!! Form::text('city_name_ar',old('city_name_ar'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city_name_en',trans('admin.city_name_en')) !!}
                    {!! Form::text('city_name_en',old('city_name_en'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
                    {!! Form::select('country_id',App\Models\Country::pluck('country_name_ar','id'),old('country_name_ar'),['class'=>'form-control']) !!}
                </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
@endsection