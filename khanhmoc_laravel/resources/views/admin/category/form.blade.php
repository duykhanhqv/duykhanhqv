@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Horizontal Two column</h4>
                    
                    <form action="{{$action}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name Category"
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
                                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                    id="membershipRadios1" @if(isset($item) && $item->status!=1)
                                                checked @endif value="0" checked=""> Ẩn <i
                                                    class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                    id="membershipRadios2" @if(isset($item) && $item->status==1)
                                                checked @endif value="1"> Hiện <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                                @error('status')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="">Department</label>
                                <select class="form-control" name="department_id" id="department_id">
                                    <option>Choose</option>
                                    @foreach ($departments as $items)
                                    <option value="{{$items->id}}" @if(isset($item) && $item->id_department=$items->id)
                                        selected
                                        @endif>{{$items->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @csrf
                        @method($method)
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection