@extends('admin.index')

@section('content')
    <!-- Main content -->

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body ">
            <!-- route admin.store function or url aurl('admin') this header for store function  -->
            {!! Form::open(['url'=>aurl('settings'),'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
                {!! Form::text('sitename_ar',setting()->sitename_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
                {!! Form::text('sitename_en',setting()->sitename_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',setting()->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                @if(!empty(setting()->logo))
                    <img src="{{Storage::url(setting()->logo)}}" style="width: 50px;height: 50px;">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                {!! Form::label('logo',trans('admin.logo')) !!}
                    </div>
                    <div class="col-lg-12">
                {!! Form::file('logo',['class'=>'form-control']) !!}
                    </div>
                </div>

            </div>
            <div class="form-group ">
                @if(!empty(setting()->icon))
                    <img src="{{Storage::url(setting()->icon)}}" style="width: 50px;height: 50px;">
                @endif
                <div class="row">

                    <div class="col-lg-12">
                {!! Form::label('icon',trans('admin.icon')) !!}
                    </div>
                    <div class="col-lg-12">
                {!! Form::file('icon',['class'=>'form-control']) !!}

                    </div>
                </div>

            </div>
            <div class="form-group ">
                {!! Form::label('description',trans('admin.description')) !!}
                {!! Form::textarea('description',setting()->description,['class'=>'form-control','placeholder'=>trans('admin.description')]) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('keywords',trans('admin.keywords')) !!}
                {!! Form::textarea('keywords',setting()->keywords,['class'=>'form-control','placeholder'=>trans('admin.keywords')]) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('main_lang',trans('admin.main_lang')) !!}
                {!! Form::select('main_lang',['ar'=>trans('admin.ar'),'en'=>trans('admin.en')],setting()->main_lang,['class'=>'form-control','placeholder'=>trans('admin.main_lang')]) !!}
            </div>
            <div class="form-group ">
                    {!! Form::label('status',trans('admin.status')) !!}
                    {!! Form::select('status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->status,['class'=>'form-control','placeholder'=>trans('admin.status')]) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('massage_maintenance',trans('admin.massage_maintenance')) !!}
                {!! Form::textarea('massage_maintenance',setting()->massage_maintenance,['class'=>'form-control','placeholder'=>trans('admin.massage_maintenance')]) !!}
            </div>
        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        <!-- route admin.store function or url aurl('admin') this header for store function  -->

        </div>
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- /.row -->
@endsection