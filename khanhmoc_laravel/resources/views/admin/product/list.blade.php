@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Data Tables</h3>
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
                        <button type="button" class="btn btn-success m-b-sm" data-toggle="modal"
                            data-target="#myModal">Add new row</button>
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
                                    @foreach ($products as $item)
                                    <tr>
                                        <th scope="row">1</th>
                                        <th>{{$item->id}}</th>
                                        <th><img src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                                    echo($key->url);
                                                }?>" alt="<?php foreach ($item->ProductImgs as $key) {
                                                    echo($key->alt);
                                                }?>" width="50" height="60" /></th>
                                        <td>{{$item->name}}</td>
                                        <td>{{number_format($item->price)}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td><button type="button" class="btn btn-default btn-rounded">Sold</button></td>
                                        <td>
                                            <a href="{{route('products.edit',[$item->id])}}"><i class="fa fa-edit"
                                                    aria-hidden="true"></i></a>
                                            <a href="{{route('products.destroy',[$item->id])}}" onclick="return confirm('Dou you want delete product ?')"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- /Page Content -->
    @endsection