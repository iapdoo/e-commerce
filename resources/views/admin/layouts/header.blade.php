<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{!empty($title)?$title:trans('admin.adminpanel')}} </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/datatables/jquery.dataTables.js">

    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    @if(direction()=='ltr')
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/adminlte.min.css">
    @else
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/AdminLTE.css">
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/AdminLTE.min.css">
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/rtl.css">
    @endif
        <!-- overlayScrollbars -->


    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="{{Storage::url(setting()->icon)}}">

    <script type="text/javascript">
        function check_all() {
            $('input[class ="item_checkbox"]:checkbox').each(function () {
                if($('input[class ="check_all"]:checkbox:checked').length==0){
                    $(this).prop('checked',false);
                }else{
                    $(this).prop('checked',true);
                }
            });
        }
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">