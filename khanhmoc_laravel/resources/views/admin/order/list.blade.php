@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description">
                        @if (session('msg'))
                        <div class="col-12 alert alert-{{session('status')}}">
                            {{session('msg')}}
                        </div>
                        @endif</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> ID </th>
                                <th> Name Customer</th>
                                <th> Email</th>
                                <th>Mobile </th>
                                <th>Status </th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $temp=0 ?>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{$temp=$temp+1}} </td>
                                <td> {{$item->id}}</td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->mobile}}</td>

                                <td>@if ($item->status==0)
                                    <button type="button" class="btn btn-success">
                                        New Order</button>
                                    @elseif ($item->status==1)
                                    <button type="button" class="btn btn-info">
                                        <i></i>confirmed
                                    </button>
                                    @elseif ($item->status==2)
                                    <button type="button" class="btn btn-warning">
                                        <i></i>delivering
                                    </button>
                                    @elseif ($item->status==3)
                                    <button type="button" class="btn btn-primary">
                                        <i></i>delived
                                    </button>
                                    @elseif ($item->status==4)
                                    <button type="button" class="btn btn-danger">
                                        <i></i>Cancel
                                    </button>
                                    @endif </td>
                                <td><a href="{{route('orders.edit',[$item->id])}}">
                                        <button type="button" class="btn btn-icons btn-inverse-primary">
                                            <i class="mdi mdi-wrench"></i>
                                        </button>
                                    </a>
                                    <form action="{{route('orders.destroy',[$item->id])}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-icons btn-inverse-danger"
                                            onclick="return confirm('Dou you want delete ?')">
                                            <i class="mdi mdi-delete-empty"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection