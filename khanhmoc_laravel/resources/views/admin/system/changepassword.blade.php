@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Basic Form</h4>
            </div>
            <div class="panel-body">
                <form action="{{route('s.postChangePassword')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" readonly class="form-control" value="{{Auth::user()->email}}" name="email" 
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Name</label> 
                        <input type="text" readonly class="form-control" value="{{Auth::user()->name}}" 
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="">Old password</label> 
                        <input type="password" class="form-control" id="old_password" name="old_password"
                            placeholder="Old Password">
                            @error('old_password')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label> 
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                            @error('password')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password Confirm</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                            placeholder="Password">
                            @error('password_confirm')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
   
   
</div><!-- Row -->
@endsection