@extends('layouts.app')

@section('content')

<div class="container py-2" style="min-height: 80vh;" id="principal">
    <div class="text-center">
        <h3>EDITAR PLATILLO</h3>
    </div>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
                <label class="form-label">ESTADO: </label>
                <select class="form-select" aria-label="Default select example" name="state">
                    <option value='pendiente'>pendiente</option>
                    <option value='finalizado'>finalizado</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">MESERO: </label>
                <br>

                <select class="form-select" aria-label="Default select example" name="waiter_id" id="meseros">
                <option value='{{ $order->waiter_id }} ' >{{ $order->waiter_id }}  </option>    
                @foreach ($meseros as $mesero)
                    <option value="{{ $mesero->id }}">{{ $mesero->id }} ~ {{ $mesero->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label class="form-label" for="client_id">CLIENTE:</label>
                 <select class="form-select" aria-label="Default select example" name="client_id" id="clientes">
                 <option value='{{ $order->waiter_id }} ' >{{ $order->client_id }}  </option>   
                 @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->id }} ~ {{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="table">MESA:</label>
                <input type="number" name="table" id="table" class="form-control" value="{{ $order->table }} " >
            </div>
            <div class="mb-3">
                <label class="form-label" for="plate_id">PLATO:</label>
                <select class="form-select" aria-label="Default select example" name="plate_id" id="platillos">
                <option value='{{ $order->plate_id }} ' >{{ $order->plate_id }}  </option>    
                @foreach ($plates as $plate)
                    <option value="{{ $plate->id }}">{{ $plate->id }} ~ {{ $plate->name }} : {{ $plate->description }} : ${{ $plate->price }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="drink_id">BEBIDA:</label>
                <select class="form-select" aria-label="Default select example" name="plate_id" id="platillos">
                <option value='{{ $order->drink_id  }} ' >{{ $order->drink_id }} </option>
                    @foreach ($drinks as $drink)
                    <option value="{{ $drink->id }}">{{ $drink->id }} ~ {{ $drink->name }} : {{ $drink->description }} : ${{ $drink->price }}</option>
                    
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="total">TOTAL:</label>
                <input type="text" name="total" id="total" class="form-control" >
            </div>
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