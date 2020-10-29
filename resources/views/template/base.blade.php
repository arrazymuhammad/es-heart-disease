<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Expert System</title>
  <link rel="stylesheet" href="{{url('/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @stack('style')
</head>
<body class="hold-transition  layout-top-nav">
<div class="wrapper">
  @include('template.section.header')
  <div class="content-wrapper">
    @include('template.utils.notif')
    <div class="container">
      @yield('content')
    </div>
  </div>
  @include('template.section.footer')
</div>
<script src="{{url('/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('/dist/js/adminlte.min.js')}}"></script>
<script>
  $(function () {
    $(".table-datatable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@stack('script')
</body>
</html>
