@extends('admin.master')
@section('content')
<div class="card-body">
    <h4 class="card-title">Manager Order</h4>
    <div>
        @if (session('msg'))
        <div class="col-12 alert alert-{{session('status')}}">
            {{session('msg')}}
        </div>
        @endif
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> # </th>
                <th> ID </th>
                <th>  Name Customer</th>
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
                <td>
                    <a type="button" href="{{ route('orders.edit',[$item->id]) }}" class="btn  btn-rounded btn-social-outline-facebook">
                        <i class="fa fa-edit" style="font-size:25px"></i>
                    </a>
                    <form action="{{route('orders.destroy',[$item->id])}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <a type="button" href=""
                            class="btn  btn-rounded btn-social-outline-facebook">
                            <button type="submit"
                                onclick="return confirm('Do you want to delete this ?')">
                                <i class="	fa fa-trash" style="font-size:25px"></i></button>
                        </a>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>
    @endsection