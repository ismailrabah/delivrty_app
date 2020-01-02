@extends('layouts.admin')
@section('adminView')
    <div class="card-header">Dashboard->Citys->Create
        <div style="float:right;">
            <a class="btn btn-sm btn-success" href="{{ route('citys.index') }}">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
        <div class="card-body">
            <form method="post" action="{{ route('citys.store') }}">
                <div class="form-group row">
                    @csrf
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control " name="name" value="" required="" autocomplete="name" autofocus="">
                    </div>
                </div> <div class="form-group row">
                    <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>
                    <div class="col-md-6">
                        <input id="slug" type="text" class="form-control " name="slug" value="" required="" autocomplete="slug" autofocus="">
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