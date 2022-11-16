@extends('admin.index')

@section('content')
    <!-- Main content -->

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body ">
            <!-- 'route'=>['admin.update',$admin->id] function or url aurl('admin/'.$admin->id) this header for store function  -->
            {!! Form::open(['url'=>aurl('countries/'.$countries->id),'method'=>'put','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
                {!! Form::text('country_name_ar',$countries->country_name_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}
                {!! Form::text('country_name_en',$countries->country_name_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('mob',trans('admin.mob')) !!}
                {!! Form::text('mob',$countries->mob,['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                @if(!empty($countries->logo))
                    <img src="{{Storage::url($countries->logo)}}" style="width: 50px;height: 50px;">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::label('logo',trans('admin.country_logo')) !!}
                    </div>
                    <div class="col-lg-12">
                        {!! Form::file('logo',['class'=>'form-control']) !!}
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group ">
            {!! Form::label('code',trans('admin.code')) !!}
            {!! Form::text('code',$countries->code,['class'=>'form-control','placeholder'=>trans('admin.code')]) !!}
        </div>
        {!! Form::submit(trans('admin.countries_edit'),['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        <!-- route admin.store function or url aurl('admin') this header for store function  -->
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- /.row -->
@endsection