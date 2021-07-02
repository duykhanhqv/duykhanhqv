<!DOCTYPE html>
<html lang="en">
  @include('admin.widgets.head')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     @include( 'admin.widgets.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.widgets.slider')
        <!-- partial -->
        <div class="main-panel">
          @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.widgets.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.widgets.js')
  </body>
</html>