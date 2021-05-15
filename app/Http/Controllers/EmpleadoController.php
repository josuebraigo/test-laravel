<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    //

    public function create() {
        return view('crud');
    }

    public function list() {
        $empleados = Empleado::all();
        return view('list', compact('empleados'));
    }

    public function store(Request $request) {
        // Empleado::create($request->all());
        $messages = [
                'nombre.regex' => 'El nombre no debe incluír números',
                'apellido_paterno.regex' => 'El apellido paterno no debe incluír números',
                'apellido_materno.regex' => 'El apellido materno no debe incluír números',
                'email' => 'El correo debe tener un formato de e-mail, debe contener un @',
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'regex: /\D/',
            'apellido_paterno' => 'regex: /\D/',
            'apellido_materno' => 'regex: /\D/',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('empleado.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $empleado = new Empleado;
        $empleado->codigo = $request->codigo;
        $empleado->nombre = $request->nombre;
        $empleado->apellido_paterno = $request->apellido_paterno;
        $empleado->apellido_materno = $request->apellido_materno;
        $empleado->email = $request->email;
        $empleado->tipo_contrato = $request->tipo_contrato;
        $empleado->estado = $request->estado == 'true' ? true : false;
        $empleado->save();

        return redirect()->route('empleado.list');
    }

    public function edit($id) {
        $empleado = Empleado::find($id);

        return view('update', compact('empleado'));
    }

    public function update($id, EmpleadoRequest $request) {
        
        $validated = $request->validated();

        if($validated->fails()) {
            return redirect()->back()->with($validated)->withInput();
        }
        
        $empleado = Empleado::find($id);

        $empleado->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'tipo_contrato' => $request->tipo_contrato,
            'estado' => $request->estado == 'true' ? true : false
        ]);

        return redirect()->route('empleado.list');
    }

    public function show($id) {
        $empleado = Empleado::find($id);

        return view('show', compact('empleado'));
    }

    public function delete($id) {
        $empleado = Empleado::find($id);


        $empleado->delete();

        return redirect()->route('empleado.list')->with('success', 'El empleado se ha eliminado correctamente');
    }

    public function changeState($id) {
        $empleado = Empleado::find($id);

        // dd($empleado)

        $empleado->estado = $empleado->estado ? 0 : 1; 

        $empleado->save();

        return redirect()->route('empleado.list')->with('success', 'Se ha cambiado el estatus del empleado correctamente');
    }
}
