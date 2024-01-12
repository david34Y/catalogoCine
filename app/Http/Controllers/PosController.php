<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;

class PosController extends Controller
{
    private $listaPizzas = [
        [
            'codigo'=>1,
            'nombre'=>'Router Starlink',
            'precio'=>500,
            'imagen'=>'pizza.png',
            'descripcion'=>'IDU.'
        ],
        [
            'codigo'=>2,
            'nombre'=>'Site Remoto',
            'precio'=>700,
            'imagen'=>'pizza.png',
            'descripcion'=>'ODU.'
        ]
    ];

    function index(){
        $lista = Pelicula::all();
        // Enviamos la variable $lista a la vista pos.blade.php
        // Obtengo la variable $carrito de la sesión
        // si no existe $carrito en la sesión, $carrito sera un arreglo vacío
        $carrito = session('carrito', []);
        return view('pos', compact('lista','carrito'));
    }

    function agregar($codigo){
        // En la variable $seleccionado, vamos a guarda la pizza encontrada en $listaPizzas
        $seleccionado = null;
        // Definimos un nuevo carrito
        $nCarrito = session('carrito', []);
       // isset valida si existe una variable y devuelve true si existe de lo contrario false
       // verificamos si existe el elemento con el indice igual a $codigo, en $nCarrito
        if(isset($nCarrito[$codigo])){ // Si existe, incrementamos la cantidad en 1
            $seleccionado = $nCarrito[$codigo];
            $nCantidad = $seleccionado['cantidad'] + 1;
        }else{ // Si no existe, agregamos el nuevo producto al carrito
            $nCantidad = 1;
            // Buscamos la pizza que coincida con el valor de $codigo
            foreach($this->listaPizzas as $pizza){
                if($pizza['codigo']==$codigo){
                    // Asigamos los datos de la pizza a $seleccionado
                    $seleccionado = $pizza;
                    break; // Detenemos la iteración
                }
            }
        }
        // Defino el producto con los datos correspondientes
        $producto = [
            'nombre' => $seleccionado['nombre'],
            'precio' => $seleccionado['precio'],
            'cantidad' => $nCantidad,
        ];
        // Añadimos el producto al nuevo carrito
       // y le asignamos el valor al índice, igual que el código del producto
        $nCarrito[$codigo] = $producto;
        
       // Actualizamos el $carrito de la sesión, con los productos de $nCarrito
        session(['carrito'=>$nCarrito]);
        return redirect()->route('pos');
}

    function eliminar($codigo){
        $nCarrito = session('carrito');
        // Obtenemos el producto por el índice que es iagual al código del producto
        $producto = $nCarrito[$codigo];
        // Si la cantidad del producto es igual a 1, eliminamos el producto
        if($producto['cantidad']==1){
           unset($nCarrito[$codigo]);
        }else{ // Si la cantidad es mayora a 1, disminuimos la cantidad del producto en 1
           $nCarrito[$codigo]['cantidad'] = $producto['cantidad'] - 1;
        }
        // Actualizamos el $carrito de la sesión, con los productos de $nCarrito
        session(['carrito'=>$nCarrito]);
        return redirect()->route('pos');
     }
}
