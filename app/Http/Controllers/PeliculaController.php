<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Actor;
use App\Models\Director;

class PeliculaController extends Controller
{
    //
    function index(){
        $peliculas = Pelicula::all();
        return view('pelicula/index', compact('peliculas'));
        //return response()->json($peliculas);
    }

    function nuevo(){
        $generos = Genero::all();
        $actores = Actor::all();
        $directores = Director::all();
        return view('pelicula/nuevo', compact('generos','actores','directores'));
    }

    function guardar(Request $request){
        $pelicula = new Pelicula;
        $pelicula->generos_id = $request->genero;
        $pelicula->nombre = $request->nombre;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->duracion = $request->duracion;
        /* No está implementado: relacion muchos a muchos
        $pelicula->actores()->sync($request->input('actores',[]));
        $pelicula->directores()->sync($request->input('directores',[]));*/
        //$pelicula->foto = $request->foto;
        $archivo = $request->file('foto');
        if($archivo){ // Si enviaron un archivo adjunto
            $ext = $archivo->extension(); // Ej: png, jpg, jpeg, txt, ppt, pdf
            $hoy = date('YmdHis'); // Ej: 20240106124518
            $nombreArchivo = "film_$hoy.$ext"; // Ej: film_20240106124518.png
            $pelicula->foto = $nombreArchivo; // Asignamos el nuevo nombre del archivo al campo imagen
            // Guardamos el archivo en la carpeta libros del disco local
            $archivo->storeAs('peliculas', "/$nombreArchivo"); // Ej: storage/app/peliculas/film_20240106124518.png
        }

        $pelicula->save();
        return redirect()->route('peliculas.index');
        /*return response()->json([
            'pelicula'=>$pelicula
        ]);*/
    }

    function mostrar($id){
        $pelicula = Pelicula::find($id);
        $generos = Genero::all();
        return view('pelicula/detalle',compact('generos','pelicula'));
    }

    function editar(Request $request){
        $id = $request->id;
        $pelicula = Pelicula::find($id);
        $pelicula->generos_id = $request->genero;
        $pelicula->nombre = $request->nombre;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->duracion = $request->duracion;
        // Definir la imagen actual
        $imagenActual = $pelicula->foto; // Ej: default.jpg o book_20240106124518.png
        // Recuperamos el archivo adjunto con nombre imagen
        $archivo = $request->file('foto');
        if($archivo){ // Si enviaron un archivo adjunto
            // Verificamos que el nombre de la imagen actual no es default.jpg
            if($imagenActual!="default.jpg"){
                // Eliminamos la imagen actual del libro
                \Storage::delete("peliculas/$imagenActual");
            }
            $ext = $archivo->extension(); // Ej: png, jpg, jpeg, txt, ppt, pdf
            $hoy = date('YmdHis'); // Ej: 20240106124518
            $nombreArchivo = "film_$hoy.$ext"; // Ej: book_20240106124518.png
            $pelicula->foto = $nombreArchivo; // Asignamos el nuevo nombre del archivo al campo imagen
            $archivo->storeAs('peliculas',"/$nombreArchivo"); // Ej: storage/app/libros/book_20240106124518.png
        }
        $pelicula->estado = $request->estado;
        $pelicula->save();
        return redirect()->route('peliculas.index');
        /*return response()->json([
            'pelicula'=>$pelicula
        ]);*/
    }

    function eliminar($id){
        $pelicula = Pelicula::find($id);
        // Definir la imagen actual
        $imagenActual = $pelicula->foto;
        // Verificamos que el nombre de la imagen actual no es default.jpg
        if($imagenActual!="default.jpg"){
            // Eliminamos la imagen actual del libro
            \Storage::delete("peliculas/$imagenActual");
        }
        $pelicula->delete();
        return redirect()->route('peliculas.index');
        /*return response()->json([
            'mensaje'=> 'Pelicula eliminada'
        ]);*/
    }
}
