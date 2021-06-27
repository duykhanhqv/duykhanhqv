<!DOCTYPE html>
<html lang="en">
    <head>
        
        @include('admin.widgets.head')
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
                @yield('content')
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        @include('admin.widgets.js')
    </body>
</html>