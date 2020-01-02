@extends('layouts.admin')
@section('adminView')
    <div class="card-header">Dashboard->Users->Create
        <div style="float:right;">
            <a class="btn btn-sm btn-success" href="{{ route('users.index') }}">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">
                <i class="fa fa-edit"></i>
            </a>
            <form action="{{ route('users.destroy', $user->id)}}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><b>name :</b> {{$user->name}}</li>
                <li class="list-group-item"><b>email :</b> {{$user->email}} </li>
                <li class="list-group-item"><b>is admin :</b>{{$user->is_admin ?"Yes" :"no"}} </li>
              </ul>
        </div>
    </div>
@endsection