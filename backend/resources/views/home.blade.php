@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="center">
            <div class="center" style="background-color: rgba(0, 0, 0, 0); color: rgb(255, 255, 255);  font-weight: bold; font-size:25px;">{{ __("Bienvenido a Willy's Pizza") }} 
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('Tu rol es: ') }} {{ Auth::user()->role->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 col-lg- d-md-block">
                <div class="position-sticky">
                    <ul class="nav flex-column" style="background-color: rgba(255, 71, 71, 0.8); border-radius: 15px; box-shadow: 0 4px 8px rgba(196, 16, 16, 0.801);">
                        <li class="nav-item" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(196, 16, 16, 0.801);">
                            <a class="nav-link active" href="{{ route('users.index') }}" style="color: white">
                                <i class="bi bi-people" ></i> Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plates.index') }}" style="color: white">
                                <i class="bi bi-clipboard-data"></i> Platillos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drinks.index') }}" style="color: white">
                                <i class="bi bi-cup-straw"></i> Bebidas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}" style="color: white">
                                <i class="bi bi-cart4"></i> Ordenes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('role.index') }}" style="color: white">
                                <i class="bi bi-shield-check"></i> Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white">
                                <i class="bi bi-file-earmark-bar-graph"></i> Reportes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
    
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Contenido principal aquí -->
            </main>
        </div>
    </div>
</div>
@endsection