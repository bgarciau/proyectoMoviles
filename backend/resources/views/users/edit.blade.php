@extends('layouts.app')

@section('content')

<div class="container py-2" style="min-height: 80vh;" id="principal">
    <div class="text-center">
        <h3>EDITAR USUARIO</h3>
    </div>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NOMBRE USUARIO: </label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">ROL USUARIO: </label>
            <select class="form-select" aria-label="Default select example" name="tipoUsuario">
                <option value="{{ $user->role_id  }}">{{ $user->role->name  }}</option>
                <option value=1>MESERO</option>
                <option value=2>CLIENTE</option>
                <option value=3>ADMINISTRADOR</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="phone">TELEFONO:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">CORREO:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
            <input hidden type="password" name="password" id="password" placeholder="Contraseña: " class="form-control" value="{{ $user->password }}">
            <input hidden type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme su contraseña: " class="form-control" value="{{ $user->password }}">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-block">ACTUALIZAR</button>
            </div>
    </form>
    <div class="col d-flex justify-content-center">
        <a href="javascript:history.back(-1);" type="button" class="btn btn-danger btn-block">CANCELAR</a>
    </div>
</div>
<br>

</div>
@endsection