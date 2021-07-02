<!DOCTYPE html>
<html lang="en">
  @include('admin.widgets.heade')
  <body>
    <div class="container-scroller">
        @yield('content')
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.widgets.jse')
    <!-- endinject -->
  </body>
</html>