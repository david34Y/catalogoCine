@extends('layouts/app')

@section('content')
<div class="d-flex justify-content-between mt-3">
    <h1>Peliculas</h1>
    <div>
        <a href="{{ route('peliculas.nuevo') }}" class="btn btn-primary">Nuevo</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Género</th>
            <th>Duración</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($peliculas as $pela)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pela->nombre }}</td>
            <td>{{ $pela->genero->nombre}}</td>
            <td>{{ $pela->duracion }}</td>
            <td>S/. {{ $pela->precio }}</td>
            <td>{{ $pela->estado }}</td>
            <td>
                <a href="{{ route('peliculas.mostrar', ['id'=>$pela['id']]) }}" class="btn btn-secondary">Editar</a>
                <a href="{{ route('peliculas.eliminar', ['id'=>$pela['id']]) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
