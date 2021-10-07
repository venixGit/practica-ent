
<!-- validacion campos -->
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert" >
        <ul>
            <!-- recorremos cada error -->
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

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