@extends('admin.empty')
@section('content')
    

<!-- Page Inner -->
<div class="page-inner login-page">
    <div id="main-wrapper" class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-3 login-box">
                <h4 class="login-title">Create an account</h4>
                <form action="{{ route('s.registerpost')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputLastName">Full name</label>
                        <input type="text" class="form-control" id="" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control" id="" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                    @csrf
                    <input type="submit" value="Register"  class="btn btn-primary">
                    <a href="{{route('s.login')}}" class="btn btn-default">Login</a><br>
                    <a href="index.html" class="forgot-link">Forgot password?</a>
                </form>
            </div>
        </div>
    </div>
</div><!-- /Page Content -->
@endsection