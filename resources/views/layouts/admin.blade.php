<!DOCTYPE html>
<html lang="tr-TR">
<head>
    @include('layouts.includes.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('layouts.includes.main_header') 

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 
  @include('layouts.includes.main_sidebar') 

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('content-header')
      </h1>
{{--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
--}}
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.includes.footer')

  <!-- Control Sidebar -->
  @include('layouts.includes.control_sidebar')
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/theme/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/theme/dist/js/demo.js"></script>
<!-- CK Editor -->

@yield('page_scripts')

</body>
</html>
