<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function auth(Request $request){
        // Recuperamos los valores enviados desde el formulario
        $usuario = $request->email;
        $clave = $request->password;
        if(Auth::attempt(['email'=>$usuario, 'password'=>$clave, 'estado'=>'A'])){
            return redirect()->route('principal');
        }else{
            $request->session()->flash('respuesta', '!Credenciales incorrectas!');
            return redirect()->route('inicio');
        }
    }

    function logout(Request $request){
        // Eliminamos todos los datos de la sesión
        Auth::logout();
        // Redireccionamos a la pagina de inicio
        return redirect()->route('inicio');
    }
}
