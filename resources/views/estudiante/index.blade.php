<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fontawesome -->
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
        crossorigin="anonymous"
    />


<div class="container">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow card-success card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-tittle mt-2">Estudiantes</h3>
                                <a href="{{url('estudiante/create')}}" class="btn btn-success">Nuevo estudiante</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table  class="table table-striped table-hover dtr-inline dt-responsive"
                                        id="tblEstudiantes"
                                        width="100%">
                                    <caption>Listado de estudiantes</caption>
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
                                    @foreach( $estudiantes as $estudiante )
                                            <tr>
                                                <td class="align-middle">{{$estudiante->nombre}}</td>
                                                <td class="align-middle">{{$estudiante->telefono}}</td>
                                                <td class="align-middle">{{$estudiante->correo}}</td>
                                                <td class="align-middle text-center">
                                                    <div class="btn-group">
                                                        <a  href="{{url('/estudiante/'.$estudiante->id.'/edit')}}"
                                                            class="btn btn-warning mb-auto text-white" 
                                                            title="Editar">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form action="{{url('/estudiante/'.$estudiante->id)}}" method="POST">
                                                            @csrf
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