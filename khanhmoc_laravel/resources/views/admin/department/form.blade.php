@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <form action="{{$action}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">@lang('Name')</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name Department')"
                                value="{{$item->name??old('name')}}">
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">@lang('Status')</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                    id="membershipRadios1" @if(isset($item) && $item->status!=1)
                                                checked @endif value="0" checked=""> @lang('Hide') <i
                                                    class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                    id="membershipRadios2" @if(isset($item) && $item->status==1)
                                                checked @endif value="1"> @lang('Present') <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('status')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        @csrf
                        @method($method)
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection