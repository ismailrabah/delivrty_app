@extends('layouts.admin')
@section('adminView')
    <div class="card-header">Dashboard->Citys->Create
        <div style="float:right;">
            <a class="btn btn-sm btn-success" href="{{ route('citys.index') }}">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-sm btn-primary" href="{{ route('citys.edit',$city->id) }}">
                <i class="fa fa-edit"></i>
            </a>
            <form action="{{ route('citys.destroy', $city->id)}}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><b>name :</b> {{$city->name}}</li>
                <li class="list-group-item"><b>slug :</b> {{$city->email}} </li>
              </ul>
        </div>

        
    </div>
@endsection