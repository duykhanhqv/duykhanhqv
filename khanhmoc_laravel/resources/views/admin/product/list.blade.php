@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> <a href="{{route('products.create')}}" class="btn btn-success m-b-sm">
                            Add new Product</a>
                        @if (session('msg'))
                        <div class="col-12 alert alert-{{session('status')}}">
                            {{session('msg')}}
                        </div>
                        @endif</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $temp=0 ?>
                            @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{$temp=$temp+1}}</th>
                                <th>{{$item->id}}</th>
                                <th><img src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                echo($key->url);
                            }?>" alt="<?php foreach ($item->ProductImgs as $key) {
                                echo($key->alt);
                            }?>" width="50" height="60" /></th>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price)}}</td>
                                <td>{{$item->qty}}</td>
                                <td> @if ($item->status==1)
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-check"></i>
                                        Show</button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fa fa-exclamation">Hide</i>
                                    </button>
                                    @endif</td>
                                <td>
                                    <a href="{{route('products.edit',[$item->id])}}">
                                        <button type="button" class="btn btn-icons btn-inverse-primary">
                                            <i class="mdi mdi-wrench"></i>
                                        </button>
                                    </a>
                                    <form action="{{route('products.destroy',[$item->id])}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-icons btn-inverse-danger"
                                            onclick="return confirm('Dou you want delete this?')">
                                            <i class="mdi mdi-delete-empty"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection