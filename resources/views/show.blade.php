@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion de {{ $empleado->nombre}} {{ $empleado->apellido_paterno}} {{ $empleado->apellido_materno}}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Código: </b>{{ $empleado->codigo }}</li>
                        <li class="list-group-item"><b>Nombre: </b>{{ $empleado->nombre }}</li>
                        <li class="list-group-item"><b>Apellido paterno: </b>{{ $empleado->apellido_paterno }}</li>
                        <li class="list-group-item"><b>Apellido materno: </b>{{ $empleado->apellido_materno }}</li>
                        <li class="list-group-item"><b>Correo electronico: </b>{{ $empleado->email }}</li>
                        <li class="list-group-item"><b>Tipo de Contrato: </b>{{ $empleado->tipo_contrato }}</li>
                        <li class="list-group-item"><b>Estado: </b>{{ $empleado->estado ? 'Activo' : 'Inactivo' }}</li>
                    </ul>
                    <a class="btn btn-primary" href="{{ route('empleado.list') }}" role="button">Regresar a la lista de empleados</a>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection