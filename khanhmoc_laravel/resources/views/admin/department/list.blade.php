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
                        <a href="{{route('departments.create')}}" class="btn btn-success m-b-sm"> Add new Product</a>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $temp=0 ?>
                                    @foreach ($departments as $item)
                                    <tr>
                                        <th scope="row">{{$temp=$temp+1}}</th>
                                        <td>
                                            {{$item->id}}
                                        </td>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            @if ($item->status==1)
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-check"></i>
                                                Show</button>
                                            @else
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-exclamation">Hide</i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" href="{{route('departments.edit',[$item->id])}}"
                                                class="btn  btn-rounded btn-social-outline-facebook">
                                                <i class="fa fa-edit" style="font-size:30px"></i>
                                            </a>
                                            <form action="{{route('departments.destroy',[$item->id])}}" method="POST">
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
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- /Page Content -->
    @endsection