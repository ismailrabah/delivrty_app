@extends('layouts.admin')
@section('adminView')
    <div class="card-header">Dashboard->Users->Create
        <div style="float:right;">
            <a class="btn btn-sm btn-success" href="{{ route('users.index') }}">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.store') }}">
                <div class="form-group row">
                    @csrf
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control " name="name" value="" required="" autocomplete="name" autofocus="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cities_id" class="col-md-4 col-form-label text-md-right">City</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" id="cities_id"  id="cities_id" class="form-control " name="cities_id" value="" required="">
                                @foreach($citys as $city)
                                    <option value="{{$city->id}}">{{ $city->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control " name="password" required="" autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
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