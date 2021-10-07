<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fontawesome -->
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
        crossorigin="anonymous"
    />


<div class="row">
    <div class="col-12">
        <div class="row">
            <!-- nombre -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input  type="text"
                            class="form-control"
                            id="nombre"
                            name="nombre"
                            placeholder="Nombre del estudiante"
                            value="{{isset($estudiante->nombre) ? $estudiante->nombre : old('nombre')}}">
                </div>
            </div>
            <!-- telefono -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input  type="number"
                            class="form-control"
                            id="telefono"
                            name="telefono"
                            placeholder="Numero del estudiante"
                            value="{{isset($estudiante->telefono) ? $estudiante->telefono : old('telefono')}}">
                </div>
            </div>
            <!-- correo -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="correo">correo</label>
                    <input  type="email"
                            class="form-control"
                            id="correo"
                            name="correo"
                            placeholder="Correo del estudiante"
                            value="{{isset($estudiante->correo) ? $estudiante->correo : old('correo')}}">
                </div>
            </div>
            

            <div class="d-flex justify-content-between mt-4">
                <a href="{{url('estudiante')}}" class="btn btn-danger text-center">Cancelar</a>
            </div>  
            <input          class="btn btn-info mt-4 ml-auto"
                            type="submit"
                            id="btnGuardar"
                            value="{{$modo}} datos">
        </div>
    </div>
</div>