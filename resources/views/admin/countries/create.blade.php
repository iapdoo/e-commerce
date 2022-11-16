@extends('admin.index')

@section('content')
    <!-- Main content -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$title}}</h3>
            </div>
            <div class="box-body ">
                <!-- route admin.store function or url aurl('admin') this header for store function  -->
            {{--
                {!! Form::open(['route'=>'admin.store']) !!}
            --}}
            <!-- route admin.store function or url aurl('admin') this header for store function  -->
                {!! Form::open(['url'=>aurl('countries'),'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
                    {!! Form::text('country_name_ar',old('country_name_ar'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}
                    {!! Form::text('country_name_en',old('country_name_en'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('mob',trans('admin.mob')) !!}
                    {!! Form::text('mob',old('mob'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('logo',trans('admin.logo')) !!}
                        </div>
                        <div class="col-lg-12">
                            {!! Form::file('logo',['class'=>'form-control']) !!}
                        </div>
                    </div>

                </div>
                </div>
                <div class="form-group ">
                    {!! Form::label('code',trans('admin.code')) !!}
                    {!! Form::text('code',old('code'),['class'=>'form-control','placeholder'=>trans('admin.code')]) !!}
                </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
            <!-- route admin.store function or url aurl('admin') this header for store function  -->
        </div>
        <!-- /.row -->
@endsection