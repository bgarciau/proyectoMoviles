@extends('layouts.app')

@section('content')
<div style="min-height: 85vh;">
    <div class="container bg-white py-4">
        <div>
            <div class="p-1">
                <div class="text-center">
                    <h2>Platillos</h2>
                    <button class="btn btn-success btn-sm mb-3" id="btnAgregar"><i class="bi bi-plus-square-dotted">
                            AGREGAR</i></button>
                </div>
                <!-- TABLA CON LOS DATOS -->
                <div class="overflow-x-scroll">
                    <table id="tabla" class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plates as $plate)
                            <tr>
                                <td scope="row">
                                    {{ $plate->id }}
                                </td>
                                <td>
                                    {{ $plate->name }}
                                </td>
                                <td>
                                    {{ $plate->description }}
                                </td>
                                <td>
                                    {{ $plate->price }}
                                </td>
                                <td>
                                    {{ $plate->stock }}
                                </td>
                                <td>
                                    <form action="{{ route('plates.destroy', $plate->id) }}" method="POST">
                                        <a href="{{ route('plates.edit', $plate->id) }}" class="btn btn-warning btn-sm">Editar</a>
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
<!-- DIALOG PARA AGREGAR -->
<dialog id="dialogAgregar" style="min-width: 50%;">
    <div class="card">
        <div class="text-center">
            <h3>AGREGAR PLATILLO</h3>
        </div>
        <form action="{{ route('plates.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label">NOMBRE PLATILLO: </label>
                <input type="text" class="form-control" name="name" value="" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">DESCRIPCION: </label>
                <input type="text" class="form-control" name="description" value="" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">PRECIO:</label>
                <input type="float" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">STOCK:</label>
                <input type="stock" name="stock" id="stock" class="form-control" required>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block">AGREGAR</button>
                </div>
        </form>
        <div class="col d-flex justify-content-center">
            <button type="button" class="btn btn-danger btn-block" id="btnCerrar">CANCELAR</button>
        </div>
    </div>
</dialog>
<script>
    $('#tabla').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
    // DIALOG PARA AGREGAR USUARIOS
    const btnAgregar = document.getElementById('btnAgregar');
    const btnCerrar = document.getElementById('btnCerrar');
    const dialogAgregar = document.getElementById('dialogAgregar');

    btnAgregar.addEventListener('click', () => {
        dialogAgregar.showModal();
    });
    btnCerrar.addEventListener('click', () => {
        dialogAgregar.close();
    });
</script>
@endsection