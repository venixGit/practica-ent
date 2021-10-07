@extends('layouts.app')

@section('content')

<!-- mensajes de sesion -->
@if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert" >
        {{Session::get('mensaje')}}
    </div>
@endif
    
<div class="container">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow card-success card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-tittle mt-2">Profesores</h3>
                                <a href="{{url('profesor/create')}}" class="btn btn-success">Nuevo profesor</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table  class="table table-striped table-hover dtr-inline dt-responsive"
                                        id="tblprofesores"
                                        width="100%">
                                    <caption>Listado de profesores</caption>
                                    <thead class="thead-dark|thead-light">
                                        <tr>                                           
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <!-- tbody -->
                                    <tbody>
                                    @foreach( $profesores as $profesor )
                                            <tr>
                                                <td class="align-middle">{{$profesor->nombre}}</td>
                                                <td class="align-middle">{{$profesor->telefono}}</td>
                                                <td class="align-middle">{{$profesor->correo}}</td>
                                                <td class="align-middle text-center">
                                                    <div class="btn-group">
                                                        <a  href="{{url('/profesor/'.$profesor->id.'/edit')}}"
                                                            class="btn btn-warning mb-auto text-white" 
                                                            title="Editar">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form action="{{url('/profesor/'.$profesor->id)}}" method="POST">
                                                            @csrf
                                                            <!-- metodo para eliminar -->
                                                            {{method_field('DELETE')}}
                                                            <button type="submit"
                                                                    class="btn btn-danger mt-auto"
                                                                    onclick="return confirm('Deseas borrar?')"
                                                                    title="Eliminar">
                                                                    <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection