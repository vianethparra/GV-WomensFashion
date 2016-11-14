<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\articulo;
use App\categoria;
use App\comentario;

class articuloController extends Controller
{
    public function catalogo(){
        $articulo = articulo::all();

    	return view('catalogo', compact('articulo'));
    }

    public function categoria($id){
        $articulo = DB::table('articulo')
            ->where('categoria', '=', $id)
            ->get();

        return view('catalogo', compact('articulo'));
    }

    public function buscarArticulo(Request $data){
        $nombre=$data->input('buscar');
        
        $articulo=DB::table('articulo')
            ->where('nombre', 'LIKE', '%'.$nombre.'%')
            ->get();

        return view('catalogo', compact('articulo'));
    }

    public function articulo($id){ 
        $articulo = DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->get();

        $comentario = DB::table('comentario')
            ->where('id_articulo', '=', $id)
            ->get();

        return view('articulo', compact('articulo', 'comentario'));
    }

    public function guardarComentario($id, Request $data){
        $usuario = $data->input('usuario');
        $comentario = $data->input('comentario');

        $nuevo = new comentario;
        $nuevo->id_articulo=$id;
        $nuevo->usuario=$usuario;
        $nuevo->comentario=$comentario;
        $nuevo->save();

        return Redirect('/articulo/'.$id);
    }
}
