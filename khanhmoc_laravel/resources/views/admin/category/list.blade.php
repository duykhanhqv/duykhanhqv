@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> <a href="{{route('categorys.create')}}" class="btn btn-success m-b-sm">
                            Add new Category</a>
                        </p>
                    <table class="table table-striped">
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
                            @foreach ($categorys as $item)
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
                                <td><a href="{{route('categorys.edit',[$item->id])}}">
                                        <button type="button" class="btn btn-icons btn-inverse-primary">
                                            <i class="mdi mdi-wrench"></i>
                                        </button>
                                    </a>
                                    <form action="{{route('categorys.destroy',[$item->id])}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-icons btn-inverse-danger"
                                            onclick="return confirm('Do you want to delete this?')">
                                            <i class="mdi mdi-delete-empty"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categorys->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection