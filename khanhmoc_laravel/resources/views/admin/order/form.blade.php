@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Form Order</h3>
        @if (session('msg'))
        <div class="col-12 alert alert-{{session('status')}}">
            {{session('msg')}}
        </div>
        @endif
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Form Order</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{$action}}" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name ship</label>
                                    <input type="text" class="form-control" id="name_ship" name="name_ship"
                                        placeholder="Name Ship" value="{{$item->name??old('name_ship')}}">
                                    @error('name_ship')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile ship</label>
                                    <input type="text" class="form-control" id="mobile_ship" name="mobile_ship"
                                        placeholder="Mobile Ship" value="{{$item->mobile??old('mobile_ship')}}">
                                    @error('mobile_ship')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email ship</label>
                                    <input type="text" class="form-control" id="email_ship" name="email_ship"
                                        placeholder="Email Ship" value="{{$item->email??old('email_ship')}}">
                                    @error('email_ship')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option>Choose</option>
                                        <?php $count=4 ?>
                                        <option value="{{$item->status}}" @if(isset($item->status)) selected
                                            @endif>
                                            @if ($item->status==0)
                                            New Order
                                            @elseif ($item->status==1)
                                            Confirmed
                                            @elseif ($item->status==2)
                                            Delivering
                                            @elseif ($item->status==3)
                                            Delived
                                            @elseif ($item->status==4)
                                            Cancel
                                            @endif
                                        </option>
                                        @for ($i = 0; $i <= $count; $i++) @if (!$item->id==$i)
                                            @else
                                            <option value="{{$i}}">
                                                @if ($i==0)
                                                New Order
                                                @elseif ($i==1)
                                                Confirmed
                                                @elseif ($i==2)
                                                Delivering
                                                @elseif ($i==3)
                                                Delived
                                                @elseif ($i==4)
                                                Cancel
                                                @endif
                                            </option>
                                            @endif
                                            @endfor
                                    </select>
                                    @error('status')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address ship</label>
                                <textarea class="form-control" name="address_ship" id="address_ship"
                                    rows="3"> {{$item->address??old('address_ship')}} </textarea>
                                @error('address_ship')
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
    </div><!-- Row -->
</div><!-- Main Wrapper -->
<div class="page-footer">
    <p>Made with <i class="fa fa-heart"></i> by Khánh Mốc</p>
</div>
</div><!-- /Page Inner -->

<!-- markup -->


<!-- summernote config -->
@endsection