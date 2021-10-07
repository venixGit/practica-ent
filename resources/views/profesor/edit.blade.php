@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7">
                    <div class="card shadow card-success card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title mt-2">Editar profesor</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{url('/profesor/'.$profesor->id)}}" enctype="multipart/form-data">
                                @csrf
                                {{method_field('PATCH')}}
                                @include('profesor.form',['modo'=>'Actualizar'])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection