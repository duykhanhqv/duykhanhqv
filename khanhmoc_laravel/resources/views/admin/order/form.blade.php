@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Form Order</h4>
                </div>
                <div class="panel-body">
                    <form action="{{$action}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name ship</label>
                                <input type="text" class="form-control" id="name_ship" name="name_ship"
                                    placeholder="Name Ship" value="{{$detail['0']->Order->name}}">
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
                                    placeholder="Mobile Ship" value="{{$detail['0']->Order->mobile??old('mobile_ship')}}">
                                @error('mobile_ship')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email ship</label>
                                <input type="text" class="form-control" id="email_ship" name="email_ship"
                                    placeholder="Email Ship" value="{{$detail['0']->Order->email??old('email_ship')}}">
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
                                    <option value="{{$detail['0']->Order->status}}" @if(isset($detail['0']->Order->status)) selected
                                        @endif>
                                        @if ($detail['0']->Order->status==0)
                                        New Order
                                        @elseif ($detail['0']->Order->status==1)
                                        Confirmed
                                        @elseif ($detail['0']->Order->status==2)
                                        Delivering
                                        @elseif ($detail['0']->Order->status==3)
                                        Delived
                                        @elseif ($detail['0']->Order->status==4)
                                        Cancel
                                        @endif
                                    </option>
                                    @for ($i = 0; $i <= $count; $i++) 
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
                                rows="3"> {{$detail['0']->Order->address??old('address_ship')}} </textarea>
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
                        <input type="hidden" name="order_id" value="{{$detail['0']->Order->id}}">
                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> ID </th>
                            <th> Name </th>
                            <th> price</th>
                            <th>Qty </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $temp=0 ?>
                        @foreach ($detail as $item)
                        <form action="{{route('order.remove_product')}}" method="post">
                        <tr>
                            <td>{{$temp=$temp+1}} </td>
                            <td> {{$item->Product->id}}</td>
                            <td>
                                {{$item->Product->name}}
                            </td>
                            <td>{{$item->price}}</td>
                            <td>
                                {{$item->qty}}
                            </td>
                            <td>
                                @if ($item->Order->status==0)
                                <input type="hidden" name="product_id" value="{{$item->Product->id}}">
                                <input type="hidden" name="order_id" value="{{$item->order_id}}">
                                @csrf
                                <button class="btn btn-icons btn-inverse-danger"
                                        onclick="return confirm('Dou you want delete ?')">
                                        <i class="mdi mdi-delete-empty"></i>
                                </button>
                                
                                @else
                                @endif
                            </td>
                        </tr>
                    </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection