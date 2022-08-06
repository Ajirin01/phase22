<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Phase2 Admin Authentication System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link
      rel="stylesheet"
      href="{{asset('admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="{{asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/jqvmap/jqvmap.min.css')}}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/css/adminlte.min.css')}}" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="{{asset('admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.css')}}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/summernote-bs4.css')}}" />
    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
  </head>
  <body class="hold-transition login-page"
  style="background-image: url({{asset('site/assets/img/banner/admin_login_bg.jpg')}});
  background-position: center; background-repeat: no-repeat; background-size: cover
  "
  >
          @yield('content')
          <!-- /.content -->
        {{-- </div> --}}
        <!-- /.content-wrapper -->
        <!-- /.control-sidebar -->
        <!-- /.content -->
      {{-- </div> --}}
      <!-- /.content-wrapper -->
      <footer class="">
        {{-- <p>Copyright © <script> var date = new Date(); document.write(date.getFullYear())</script> Powered by <a href="http://digirealm.com.ng/">Digi-Realm City Solution </a></p> --}}

        <strong
          style="color: white">Copyright &copy;<script> var date = new Date(); document.write(date.getFullYear())</script> Powered by 
          <a href="http://digirealm.com.ng/">Digi-Realm City Solution </a>.</strong
        >
        {{-- All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.6-pre
        </div> --}}
        <script></script>
      </footer>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('admin/assets/plugins/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin/assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('admin/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin/assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin/assets/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/assets/dist/js/demo.js')}}"></script>
  </body>
</html>
