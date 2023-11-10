@extends('layouts.app')

@section('content')

<div class="container py-2" style="min-height: 80vh;" id="principal">
    <div class="text-center">
        <h3>EDITAR ROLE</h3>
    </div>
    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NOMBRE ROL: </label>
            <input type="text" class="form-control" name="name" value="{{ $role->name }}" autofocus>
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