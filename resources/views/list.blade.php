@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de empleados</div>
                <div class="card-body">
                @if(\Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{ \Session::get('success') }}!
                </div>
                @endif
                @if(!count($empleados))
                <div class="alert alert-danger" role="alert">No hay empleados registrados</div>
                @endif
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        <th scope="row">{{$empleado->codigo}}</th>
                        <td>{{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('empleado.state', ['id' => $empleado->id]) }}" class="btn btn-warning">{{ $empleado->estado ? 'Desactivar' : 'Activar' }}</a>
                            <a href="{{ route('empleado.edit', ['id' => $empleado->id]) }}" class="btn btn-secondary">Editar</a>
                            <a href="{{ route('empleado.view', ['id' => $empleado->id]) }}" class="btn btn-secondary">Vista previa</a>
                            <a href="{{ route('empleado.delete', ['id' => $empleado->id]) }}" class="btn btn-danger">Eliminar</a>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('empleado.create') }}" role="button">Agregar empleado</a>
        </div>
    </div>
</div>

@endsection