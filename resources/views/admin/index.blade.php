@include('admin.layouts.header')
@include('admin.layouts.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 259px;margin-inline-end: auto;" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{!empty($title)?$title:trans('admin.admin_control')}} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @include('admin.layouts.massage')
        @yield('content')
    </section>
<!-- /.content-wrapper -->
</div>
@include('admin.layouts.footer')