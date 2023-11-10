@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Willy's Pizza") }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('Tu rol es: ') }} {{ Auth::user()->role->name }}</p>

                    @if (Auth::check())
                    @switch(Auth::user()->role->name)
                    @case('admin')
                    <a href="{{ route('users.index') }}">Usuarios</a>
                    <a href="{{ route('plates.index') }}">Platillos</a>
                    <a href="{{ route('drinks.index') }}">Bebidas</a>
                    <a href="{{ route('orders.index') }}">Ordenes</a>
                    <a href="{{ route('role.index') }}">Roles</a>
                    @break
                    @default
                    @endswitch
                    @endif
                    <!-- {{ __('Estás logueado!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection