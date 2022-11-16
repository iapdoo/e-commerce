@extends('admin.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>

                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th> {{trans('admin.delete')}} </th>
                                <th> {{trans('admin.edit')}} </th>
                                <th>{{trans('admin.created_at')}}</th>
                                <th>{{trans('admin.updated_at')}}</th>
                                <th>{{trans('admin.email')}}</th>
                                <th>ا{{trans('admin.name')}}</th>
                                <th>ا{{trans('admin.level')}}</th>
                                <th>{{trans('admin.id')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($user->Level = trans('admin.user'))
                            @foreach($user as $userinfo)
                                <tr>

                                    <td>
                                        {!! Form::open(['id'=>'form_delete','url'=>aurl('users/'.$userinfo->id),'method'=>'delete']) !!}
                                        {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger fa fa-trash' ,'style'=>'inline']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url ('admin/users/'.$userinfo->id .'/edit') }} "> <i class="fa fa-edit"></i> </a>
                                    </td>
                                    <td>{{$userinfo->created_at}}</td>
                                    <td>{{$userinfo->updated_at}}</td>
                                    <td>{{$userinfo->email}}</td>
                                    <td>{{ $userinfo->name }}</td>
                                    <td class="label {{$userinfo->Level=='user'?'label-info':''}}">
                                        {{ $userinfo->Level }}</td>
                                    <td>{{ $userinfo->id }}</td>
                                </tr>
                            @endforeach
                            @else
                            <tr>{{trans('admin.no_user')}}</tr>
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                {{--
                                <th> {{trans('admin.checkbox')}} </th>
                                --}}
                                <th> {{trans('admin.delete')}} </th>
                                <th> {{trans('admin.edit')}} </th>
                                <th>{{trans('admin.created_at')}}</th>
                                <th>{{trans('admin.updated_at')}}</th>
                                <th>{{trans('admin.email')}}</th>
                                <th>ا{{trans('admin.name')}}</th>
                                <th>ا{{trans('admin.level')}}</th>
                                <th>{{trans('admin.id')}}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="text-center">
                        {{$user->appends(Request::except('page'))->render()}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
@endsection
@section('footer')

    <script src="{{url('/design/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('/design/adminlte/dist/js/adminlte.min.js')}}"></script>
    <script src="{{url('/design/adminlte/dist/js/demo.js')}}"></script>

    <script type="text/javascript">
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        })
    </script>
@endsection


