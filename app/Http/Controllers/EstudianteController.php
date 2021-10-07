<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['estudiantes']=Estudiante::where('estado', "=", 1)
                                    ->paginate(5);
        return view('estudiante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar campos
        $campos = [
            'nombre'    => 'required|string|max:100',
            'telefono'  => 'required|int|min:8',
            'correo'    => 'required|email'
        ];

        //mensajes de error
        $mensaje=[
            'required'      =>'El :attribute es requerido',
        ];

        //enviamos los mensajes
        $this->validate($request, $campos, $mensaje);

        //validamos que no se envie el token a la bd
        $datosEstudiante = $request->except('_token');
        Estudiante::insert($datosEstudiante);

        // return response()->json($datosEstudiante);
        return redirect('estudiante')->with('mensaje','Estudiante registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //busco al estudiante
        $estudiante = Estudiante::findOrFail($id);
        //
        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //validar campos
        $campos = [
            'nombre'    => 'required|string|max:100',
            'telefono'  => 'required|int|min:8',
            'correo'    => 'required|email'
        ];

        //mensajes de error
        $mensaje=[
            'required'      =>'El :attribute es requerido',
        ];

        //enviamos los mensajes
        $this->validate($request, $campos, $mensaje);

        try {
            //no mando el toquen y method a la bd
            $datosEstudiante = $request->except('_token','_method');

            //busco el estudiante y lo actualizo
            Estudiante::where('id','=', $id)
                        ->update($datosEstudiante);
            //reconfirmar que es el id del Estudiante
            $Estudiante = Estudiante::findOrFail($id);

            return redirect('estudiante')->with('mensaje','Estudiante actualizado correctamente');
            
        } catch (\Throwable $th) {
            return view('estudiante.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deleteEstudiante = Estudiante::find($id);
        $deleteEstudiante->estado = 0;
        $deleteEstudiante->save();


        return redirect('estudiante')->with('mensaje','Estudiante eliminado correctamente');
    }
}
