<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bansos | Jaring Halus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/') }}favicon.png" />
  </head>
  <body class="with-welcome-text">
    @yield('content')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('plugins/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('plugins/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('plugins/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->

    @yield('footer-scripts')
  </body>
</html>