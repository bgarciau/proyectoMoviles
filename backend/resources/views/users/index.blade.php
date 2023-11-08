@extends('layouts.app')

@section('content')
<style>
    #tablaUsuarios {
        min-width: max-content;
        border-color: black;
    }

    #tablaUsuarios td {
        min-width: max-content;
        padding: 1px;
    }
</style>
<div style="min-height: 85vh;">
    <div class="container bg-white py-4">
        <div>
            <div class="p-1">
                <div class="text-center">
                    <h2>Usuarios</h2>
                    <button class="btn btn-success btn-sm mb-3" id="btnAgregarUsuario"><i class="bi bi-plus-square-dotted">
                            AGREGAR</i></button>
                </div>
                <!-- TABLA CON LOS DATOS DE LOS APRENDICES Y OPCIONES SEGUN EL USUARIO QUE LO VE -->
                <div class="overflow-x-scroll">
                    <table id="tablaUsuarios" class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td scope="row">
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->role->name  }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Estas seguro de eliminar?');" type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- BOTON PARA VOLVER -->
        <a href="javascript:history.back(-1);"><button class="btn btn-danger me-md-2" type="button">VOLVER</button></a>
    </div>
</div>
<!-- DIALOG PARA AGREGAR USUARIO -->
<dialog id="dialogAgregarUsuario" style="min-width: 50%;">
    <div class="card">
        <div class="text-center">
            <h3>AGREGAR USUARIO</h3>
        </div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label">NOMBRE USUARIO: </label>
                <input type="text" class="form-control" name="name" value="" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">ROL USUARIO: </label>
                <select class="form-select" aria-label="Default select example" name="tipoUsuario">
                    <option value=2>CLIENTE</option>
                    <option value=1>MESERO</option>
                    <option value=3>ADMINISTRADOR</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">TELEFONO:</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">CORREO:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">CONTRASENA:</label>
                <input type="password" name="password" id="password" placeholder="Contraseña: " class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">CONFIRME CONTRASENA:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme su contraseña: " class="form-control" required>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block">AGREGAR</button>
                </div>
        </form>
        <div class="col d-flex justify-content-center">
            <button type="button" class="btn btn-danger btn-block" id="btnCerrarUsuario">CANCELAR</button>
        </div>
    </div>
</dialog>
<script>
    $('#tablaUsuarios').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
    // DIALOG PARA AGREGAR USUARIOS
    const btnAgregarUsuario = document.getElementById('btnAgregarUsuario');
    const btnCerrarUsuario = document.getElementById('btnCerrarUsuario');
    const dialogAgregarUsuario = document.getElementById('dialogAgregarUsuario');

    btnAgregarUsuario.addEventListener('click', () => {
        dialogAgregarUsuario.showModal();
    });
    btnCerrarUsuario.addEventListener('click', () => {
        dialogAgregarUsuario.close();
    });
</script>
@endsection