@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar empleados</div>
                <div class="card-body">
                    <form action="{{ route('empleado.update', ['id' => $empleado->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input value="{{ $empleado->codigo }}" type="text" class="form-control" id="codigo" name="codigo">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="{{ $empleado->nombre }}" type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input value="{{ $empleado->apellido_paterno }}" type="text" class="form-control" id="apellido_paterno" name="apellido_paterno">
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input value="{{ $empleado->apellido_materno }}" type="text" class="form-control" id="apellido_materno" name="apellido_materno">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input value="{{ $empleado->email }}" type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="tipo_contrato">Tipo de contrato</label>
                        <input value="{{ $empleado->tipo_contrato }}" type="text" class="form-control" id="tipo_contrato" name="tipo_contrato">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value="true" @if($empleado->estado) selected @endif>Activo</option>
                            <option value="false" @if(!$empleado->estado) selected @endif>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Agregar empleado</button>

                    </form>
                </div>
        </div>
    </div>
</div>

@endsection