@extends('layouts.app')

@section('content')
<div style="min-height: 85vh;">
    <div class="container bg-dark text-light py-4">
        <div>
            <div class="p-1">
                <div class="text-center">
                    <h2>Roles</h2>
                    <button class="btn btn-success btn-sm mb-3" id="btnAgregar"><i class="bi bi-plus-square-dotted">
                            AGREGAR</i></button>
                </div>
                <!-- TABLA CON LOS DATOS -->
                <div class="overflow-x-scroll">
                    <table id="tabla" class="table table-sm table-bordered table-striped table-hover table-warning">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td scope="row">
                                    {{ $role->id }}
                                </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Editar</a>
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
<dialog id="dialogAgregar" style="min-width: 50%; background-color: hsla(41, 100%, 50%, 0.801);">
    <div class="card" style="background-color: hsla(54, 100%, 50%, 0.8);">
        <div class="text-center">
            <h3>AGREGAR ROL</h3>
        </div>
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label">NOMBRE: </label>
                <input type="text" style="background-color: lightgoldenrodyellow" class="form-control" name="name" value="" autofocus required>
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
    $(document).ready(function() {
        $('#tabla').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            responsive: true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ]
        });
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