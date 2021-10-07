<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar profesores
        $datos['profesores']=Profesor::where('estado', "=", 1)
                                    ->paginate(5);
        return view('profesor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $datosProfesor = $request->except('_token');
        Profesor::insert($datosProfesor);

        // return response()->json($datosProfesor);
        return redirect('profesor')->with('mensaje','Profesor registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profesor = Profesor::findOrFail($id);
        //retorno la vista con los datos del profesor
        return view('profesor.edit', compact('profesor'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        try {
            //no mando el toquen y method a la bd
            $datosProfesor = $request->except('_token','_method');

            //busco el Profesor y lo actualizo
            Profesor::where('id','=', $id)
                        ->update($datosProfesor);
            //reconfirmar que es el id del Profesor
            $profesor = Profesor::findOrFail($id);

            return redirect('profesor')->with('mensaje','Profesor actualizado correctamente');
            
        } catch (\Throwable $th) {
            return view('profesor.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProfesor = Profesor::find($id);
        $deleteProfesor->estado = 0;
        $deleteProfesor->save();


        return redirect('profesor')->with('mensaje','Profesor eliminado correctamente');
    }
}
