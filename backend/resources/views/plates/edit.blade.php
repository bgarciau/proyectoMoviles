@extends('layouts.app')

@section('content')

<div class="container py-2" style="min-height: 80vh;" id="principal">
    <div class="text-center">
        <h3>EDITAR PLATILLO</h3>
    </div>
    <form action="{{ route('plates.update', $plate->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NOMBRE PLATILLO: </label>
            <input type="text" class="form-control" name="name" value="{{ $plate->name }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">DESCRIPCION: </label>
            <input type="text" class="form-control" name="description" value="{{ $plate->description }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">PRECIO:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $plate->price }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="stock">STOCK:</label>
            <input type="text" name="stock" id="stock" class="form-control" value="{{ $plate->stock }}">
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