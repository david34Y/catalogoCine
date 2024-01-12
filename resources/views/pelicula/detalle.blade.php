@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Editar Pelicula</h1>
    <div>
        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
</div>
<form action="{{ route('peliculas.editar') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$pelicula->id}}" />
    <div class="mb-3 row">
        <label for="inputGenero" class="col-sm-2 col-form-label">Género</label>
        <div class="col-sm-10">
            <select name="genero" class="form-select" id="inputGenero" required>
                <option value="">Seleccione una opción</option>
                @foreach($generos as $genero)
                <option value="{{$genero->id}}" @selected($genero->id==$pelicula->generos_id)>{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="inputNombre" value="{{$pelicula->nombre}}" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputSinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
        <div class="col-sm-10">
            <textarea name="sinopsis" class="form-control" id="inputSinopsis" required>{{$pelicula->sinopsis}}</textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputDuracion" class="col-sm-2 col-form-label">Duración</label>
        <div class="col-sm-10">
            <input type="time" name="duracion" class="form-control" id="inputDuracion" value="{{$pelicula->duracion}}"/>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            @if($pelicula->foto!='default.jpg')
            <img src="{{ url('peliculas/'.$pelicula->foto) }}" height="120" />
            @endif
            <input type="file" name="foto" class="form-control" id="inputFoto" accept="image/*" />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
        <div class="col-sm-10">
            <select name="estado" class="form-select" id="inputEstado">
                <option value="A" @selected($pelicula->estado=='A')>Activo</option>
                <option value="I" @selected($pelicula->estado=='I')>Inactivo</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection