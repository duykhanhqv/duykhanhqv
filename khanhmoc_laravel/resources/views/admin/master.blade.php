<!DOCTYPE html>
<html lang="en">
@include('admin.widgets.head')
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            @include('admin.widgets.slider')
            
            <!-- Page Content -->
            <div class="page-content">
                @include('admin.widgets.header')
                @yield('content')
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
@include('admin.widgets.js')
    </body>
</html>