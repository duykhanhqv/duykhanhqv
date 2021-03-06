@extends('admin.empty')
@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">

  <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
    <div class="row w-100">
      <div class="col-lg-4 mx-auto">
        <div class="auto-form-wrapper">
          @if (session('msg'))
          <div class="col-12 alert alert-{{session('status')}}">
            {{session('msg')}}
          </div>
          @endif
          <form action="{{route('s.loginpost')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="label">Email</label>
              <div class="input-group">
                <input type="email" class="form-control" placeholder="email" name="email">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="label">@lang('Password')</label>
              <div class="input-group">
                <input type="password" class="form-control" placeholder="*********" name="password">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              @csrf
              <button class="btn btn-primary submit-btn btn-block">@lang('Login')</button>
            </div>
            <div class="form-group d-flex justify-content-between">

              <a href="#" class="text-small forgot-password text-black">@lang('Forgot Password')</a>
            </div>
            <div class="form-group">
              <button class="btn btn-block g-login">
                <img class="mr-3" src="../../../assets/images/file-icons/icon-google.svg" alt="">Log in with
                Google</button>
            </div>
            <div class="text-block text-center my-3">
              <span class="text-small font-weight-semibold">@lang('Not a member ?')</span>
              <a href="{{route('s.register')}}" class="text-black text-small">@lang('Create new account')</a>
            </div>
          </form>
        </div>
        <ul class="auth-footer">
          <li>
            <a href="#">Conditions</a>
          </li>
          <li>
            <a href="#">Help</a>
          </li>
          <li>
            <a href="#">Terms</a>
          </li>
        </ul>
        <p class="footer-text text-center">copyright ?? 2018 Bootstrapdash. All rights reserved.</p>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
@endsection