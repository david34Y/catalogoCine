<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\ClientePelicula;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{
    function index(){
        $peliculas = Pelicula::where('estado',1)
                        ->where('id', Auth::user()->id)
                        ->orderBy('nombre')
                        ->get();
        return view('principal', compact('peliculas'));
    }

    function eliminar($id){
        $pelicula = Pelicula::find($id);
        // Eliminamos el registro encontrado
        if ($pelicula) {
            $clientePelicula=ClientePelicula::where('clientes_id', Auth::user()->id)
                                ->where('peliculas_id', $pelicula->id)
                                ->get();

            if ($clientePelicula->isNotEmpty()) {
            $clientePelicula->each(function ($relation) {
                $relation->delete();
            });
        }
        }
        return redirect()->route('principal');
    }

    
}
