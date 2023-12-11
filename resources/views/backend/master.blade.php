@include('backend/layouts/header')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('backend/layouts/navigation')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('backend/layouts/sidebar')
    <!-- /Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <section class="content">
            @yield('content')
          </section>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- footer  -->
    @include('backend/layouts/footer')
    <!--/ footer  -->
    <!--script -->
    @include('backend/layouts/script')
    <!--/script -->
  </div>



</body>

</html>