@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <p class="card-description"> <a href="{{route('categorys.create')}}" class="btn btn-success m-b-sm">
                            @lang('Add new department')</a>
                        </p>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
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
                                        @lang('Present')</button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fa fa-exclamation">@lang('Hide')</i>
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
                                            onclick="return confirm('Dou you want delete this?')">
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