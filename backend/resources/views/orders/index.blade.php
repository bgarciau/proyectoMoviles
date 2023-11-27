@extends('layouts.app')

@section('content')
<div style="min-height: 85vh;">
    <div class="container bg-dark text-light py-4">
        <div>
            <div class="p-1">
                <div class="text-center">
                    <h2>ORDENES</h2>
                    <button class="btn btn-success btn-sm mb-3" id="btnAgregar"><i class="bi bi-plus-square-dotted">
                            AGREGAR</i></button>
                </div>
                <!-- TABLA CON LOS DATOS -->
                <div class="overflow-x-scroll">
                    <table id="tabla" class="table table-sm table-bordered table-striped table-hover table-warning">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Mesero</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Mesa</th>
                                <th scope="col">Plato</th>
                                <th scope="col">Bebida</th>
                                <th scope="col">Total</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td scope="row">
                                    {{ $order->id }}
                                </td>
                                <td>
                                    {{ $order->state }}
                                </td>
                                <td>
                                    {{ $order->waiter_id }}
                                </td>
                                <td>
                                    {{ $order->client_id }}
                                </td>
                                <td>
                                    {{ $order->table }}
                                </td>
                                <td>
                                    {{ $order->plate_id }}
                                </td>
                                <td>
                                    {{ $order->drink_id }}
                                </td>
                                <td>
                                    {{ $order->total }}
                                </td>
                                <td>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Editar</a>
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
<dialog id="dialogAgregar" style="min-width: 50%; background-color: hsla(50, 100%, 50%, 0.801);">
    <div class="card" style="background-color: hsla(54, 100%, 50%, 0.8);">
        <div class="text-center">
            <h3>AGREGAR ORDEN</h3>
        </div>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label">ESTADO: </label>
                <select class="form-select" style="background-color: lightgoldenrodyellow" aria-label="Default select example" name="state">
                    <option value='pendiente'>pendiente</option>
                    <option value='finalizado'>finalizado</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">MESERO: </label>
                <br>

                <select class="form-select" style="background-color: lightgoldenrodyellow" aria-label="Default select example" name="waiter_id" id="meseros">
                <option value= >Seleccione un mesero </option>    
                @foreach ($meseros as $mesero)
                    <option value="{{ $mesero->id }}">{{ $mesero->id }} ~ {{ $mesero->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label class="form-label" for="client_id">CLIENTE:</label>
                <select class="form-select" style="background-color: lightgoldenrodyellow" aria-label="Default select example" name="client_id" id="clientes">
                <option value= >Seleccione un cliente </option>   
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->id }} ~ {{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="table">MESA:</label>
                <input type="number" style="background-color: lightgoldenrodyellow" name="table" id="table" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label" for="plate_id">PLATO:</label>
                <select class="form-select" style="background-color: lightgoldenrodyellow" aria-label="Default select example" name="plate_id" id="platillos">
                <option value= >Seleccione un platillo </option>    
                @foreach ($plates as $plate)
                    <option value="{{ $plate->id }}">{{ $plate->id }} ~ {{ $plate->name }} : {{ $plate->description }} : ${{ $plate->price }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="drink_id">BEBIDA:</label>
                <select class="form-select" style="background-color: lightgoldenrodyellow" aria-label="Default select example" name="plate_id" id="platillos">
                <option value= >Seleccione una bebida </option>
                    @foreach ($drinks as $drink)
                    <option value="{{ $drink->id }}">{{ $drink->id }} ~ {{ $drink->name }} : {{ $drink->description }} : ${{ $drink->price }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="total">TOTAL:</label>
                <input type="text" style="background-color: lightgoldenrodyellow" name="total" id="total" class="form-control" >
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