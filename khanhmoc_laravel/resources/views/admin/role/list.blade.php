@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Role</h4>
                    <p class="card-description"> 
                        @if (session('msg'))
                        <div class="col-12 alert alert-{{session('status')}}">
                            {{session('msg')}}
                        </div>
                        @endif</p>
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Author</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $temp=0 ?>
                            @foreach ($list_user as $item)
                            <form action="{{ route('s.updateRole')}}" method="post">
                            <tr>
                                <th scope="row">{{$temp=$temp+1}}</th>
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->email}}
                                    <input type="hidden" name="email" value="{{$item->email}}">
                                </td>
                                <td>
                                    <input type="checkbox" name="admin_role" {{$item->inRole('admin') ? 'checked' : ''}}
                                        id="">

                                </td>
                                <td>
                                    <input type="checkbox" name="author_role"
                                        {{$item->inRole('author') ? 'checked' : ''}} id="">
                                </td>
                                <td>
                                    <input type="checkbox" name="user_role" {{$item->inRole('user') ? 'checked' : ''}}
                                        id="">

                                </td>
                                <td>
                                    {{-- <a href="">
                                        <button type="button" class="btn btn-icons btn-inverse-primary">
                                            <i class="mdi mdi-wrench"></i>
                                        </button>
                                    </a>
                                    <form action="}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-icons btn-inverse-danger"
                                            onclick="return confirm('Do you want to delete this?')">
                                            <i class="mdi mdi-delete-empty"></i>
                                        </button>
                                    </form> --}}
                                    @csrf
                                    <button type="submit" class="btn btn-icons btn-inverse-danger"
                                            >
                                            <i class="mdi mdi-add-empty"></i>
                                        </button>
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
</div>
@endsection