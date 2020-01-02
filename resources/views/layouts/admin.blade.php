@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <ul class="list-group">
                <li class="list-group-item {{ Route::currentRouteName() == 'admin.home' ?'active' :''}}">
                    <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>
                </li>
                <li class="list-group-item {{ in_array(Route::currentRouteName() , ['users.index','users.create','users.edit','users.show']) ? 'active' :''}}">
                    <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                </li>
                <li class="list-group-item {{ in_array(Route::currentRouteName() , ['citys.index','citys.create','citys.edit','citys.show']) ? 'active' :''}}">
                    <a class="dropdown-item" href="{{ route('citys.index') }}">Citys</a>
                </li>
                <li class="list-group-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                @yield('adminView')
            </div>
        </div>
    </div>
</div>
@endsection