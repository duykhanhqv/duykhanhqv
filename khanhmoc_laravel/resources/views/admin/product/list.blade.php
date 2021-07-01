@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">List Product</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        @if (session('msg'))
                        <div class="col-12 alert alert-{{session('status')}}">
                            {{session('msg')}}
                        </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <a href="{{route('products.create')}}" class="btn btn-success m-b-sm"> Add new Product</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 100%; cellspacing: 0;">
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
                                            <a type="button" href="{{route('products.edit',[$item->id])}}"
                                                class="btn  btn-rounded btn-social-outline-facebook">
                                                <i class="fa fa-edit" style="font-size:30px"></i>
                                            </a>
                                            <form action="{{route('products.destroy',[$item->id])}}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a type="button" href=""
                                                    class="btn  btn-rounded btn-social-outline-facebook">
                                                    <button type="submit"
                                                        onclick="return confirm('Bạn Có muón xoá hay không ?')">
                                                        <i class="	fa fa-trash" style="font-size:25px"></i></button>
                                                </a>
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
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- /Page Content -->
    @endsection