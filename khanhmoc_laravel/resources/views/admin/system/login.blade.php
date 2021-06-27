@extends('admin.empty')
@section('content')
    

<!-- Page Inner -->
<div class="page-inner login-page">
    <div id="main-wrapper" class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-3 login-box">
                <h4 class="login-title">Sign in to your account</h4>
                <form action="{{route('s.loginpost')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    @csrf
                    <input type="submit" value="Login"  class="btn btn-default">
                    <a href="{{route('s.register')}}" class="btn btn-default">Register</a><br>
                    <a href="index.html" class="forgot-link">Forgot password?</a>
                </form>
            </div>
        </div>
    </div>
</div><!-- /Page Content -->
@endsection