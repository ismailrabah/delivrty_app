@extends('layouts.admin')
@section('adminView')
    <div class="card-header">Dashboard->Citys->Create
        <div style="float:right;">
            <a class="btn btn-sm btn-success" href="{{ route('citys.index') }}">
                <i class="fa fa-list"></i>
            </a>
            <form action="{{ route('citys.destroy', $city->id)}}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
        <div class="card-body">
            <form method="post" action="{{ route('citys.update', $city->id) }}">
                <div class="form-group row">
                    @csrf
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control " name="name" value="{{$city->name}}" required="" autocomplete="name" autofocus="">
                    </div>
                </div> <div class="form-group row">
                    <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>
                    <div class="col-md-6">
                        <input id="slug" type="text" class="form-control " name="slug" value="{{$city->slug}}" required="" autocomplete="slug" autofocus="">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection