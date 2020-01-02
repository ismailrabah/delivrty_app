@extends('layouts.admin')
@section('adminView')
    <div class="card-header">
        Dashboard->Users
        <div style="float:right;">
            <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>name</td>
                        <td>email</td>
                        <td>is admin</td>
                        <td colspan="3" style="text-align: center;">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->is_admin ?"Yes" :"no"}}</td>
                            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a></td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a></td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection