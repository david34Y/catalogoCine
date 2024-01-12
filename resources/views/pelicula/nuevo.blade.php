@extends('layouts/app')

@section('content')
<div class="d-flex justify-content-between mt-3">
    <h1>Nueva Pelicula</h1>
    <div>
        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
</div>
<form action="{{ route('peliculas.guardar') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label for="inputGenero" class="col-sm-2 col-form-label">Género</label>
        <div class="col-sm-10">
            <select name="genero" class="form-select" id="inputGenero" required>
                <option value="">Seleccione una opción</option>
                @foreach($generos as $genero)
                <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="inputNombre" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputSinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
        <div class="col-sm-10">
            <textarea name="sinopsis" class="form-control" id="inputSinopsis" required></textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputDuracion" class="col-sm-2 col-form-label">Duración</label>
        <div class="col-sm-10">
            <input type="time" name="duracion" class="form-control" id="inputDuracion" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="file" name="foto" class="form-control" id="inputFoto" accept="image/*" />
        </div>
    </div>
     <!--div class="mb-3 row">
        <label for="inputActores" class="col-sm-2 col-form-label">Actores</label>
        <div class="col-sm-10">
            <select name="actores[]" class="form-select select2" id="inputActores" multiple required>
                <option value="">Seleccione varias opciones</option>
                @foreach($actores as $actor)
                <option value="{{$actor->id}}">{{$actor->nombres}} {{$actor->apellidos}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputDirectores" class="col-sm-2 col-form-label">Directores</label>
        <div class="col-sm-10">
            <select name="directores[]" class="form-select select2" id="inputDirectores" multiple required>
                <option value="">Seleccione varias opciones</option>
                @foreach($directores as $director)
                <option value="{{$director->id}}">{{$director->nombres}} {{$director->apellidos}}</option>
                @endforeach
            </select>
        </div>
    </div-->
    <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>
@endsection
