@extends('admin.master')
@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <h2 class="text-center mb-4">Change Password</h2>
          @if (session('msg'))
        <div class="col-12 alert alert-{{session('status')}}">
            {{session('msg')}}
        </div>
        @endif
          <div class="auto-form-wrapper">
            <form action="{{ route('s.postChangePassword')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <input type="email" class="form-control" readonly placeholder="Email" name="email" value="{{$user->email}}">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline">@error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror</i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Name" name="name" value="{{$user->name??old('name')}}">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline">@error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror</i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control" name="old_password" placeholder="Old Password" value="">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline">@error('old_password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror</i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control" name="password" placeholder="Password Old" value="{{old('password')}}">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline">@error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror</i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password" value="{{old('password_confirm')}}">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline">@error('password_confirm')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror</i>
                    </span>
                  </div>
                </div>
              </div>
                
              <div class="form-group">
                  @csrf
                <button class="btn btn-primary submit-btn btn-block">Change</button>
              </div>
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Already have and account ?</span>
                <a href="{{route('s.login')}}" class="text-black text-small">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
      
@endsection