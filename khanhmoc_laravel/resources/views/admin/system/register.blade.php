@extends('admin.empty')
@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <h2 class="text-center mb-4">Register</h2>
          @if (session('msg'))
        <div class="col-12 alert alert-{{session('status')}}">
            {{session('msg')}}
        </div>
        @endif
          <div class="auto-form-wrapper">
            <form action="{{ route('s.registerpost')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
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
                  <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
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
                  <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
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
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="confirm" id="" value="checkedValue" checked>
                  I agree to the terms
                </label> @error('confirm')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
              <div class="form-group">
                  @csrf
                <button class="btn btn-primary submit-btn btn-block">Register</button>
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