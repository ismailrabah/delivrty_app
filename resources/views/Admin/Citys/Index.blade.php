@extends('layouts.admin')
@section('adminView')
    <div class="card-header">
        Dashboard->Citys
        <div style="float:right;">
            <a class="btn btn-sm btn-primary" href="{{ route('citys.create') }}">
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
                        <td>slug</td>
                        <td colspan="3" style="text-align: center;">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citys as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>{{$city->slug}}</td>
                            <td><a href="{{ route('citys.edit',$city->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a></td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('citys.show',$city->id) }}"><i class="fa fa-eye"></i></a></td>
                            <td>
                                <form action="{{ route('citys.destroy', $city->id)}}" method="post">
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