@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> <a href="{{route('categorys.create')}}" class="btn btn-success m-b-sm">
                            Add new Category</a>
                        @if (session('msg'))
                        <div class="col-12 alert alert-{{session('status')}}">
                            {{session('msg')}}
                        </div>
                        @endif</p>
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
                                        <td><a href="{{route('departments.edit',[$item->id])}}">
                                            <button type="button" class="btn btn-icons btn-inverse-primary">
                                                <i class="mdi mdi-wrench"></i>
                                            </button>
                                        </a>
                                        <form action="{{route('departments.destroy',[$item->id])}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-icons btn-inverse-danger"
                                                onclick="return confirm('Bạn Có muón xoá hay không ?')">
                                                <i class="mdi mdi-delete-empty"></i>
                                            </button>
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
            </div>
        </div>
        
    @endsection