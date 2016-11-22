<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\articulo;
use App\categoria;
use App\comentario;

class articuloController extends Controller
{
    public function catalogo(){
        $articulo = articulo::all();
        $categoria = categoria::all();

    	return view('catalogo', compact('articulo', 'categoria'));
    }

    public function categoria($id){
        $articulo = DB::table('articulo')
            ->where('categoria', '=', $id)
            ->get();

        $categoria = categoria::all();
        return view('catalogo', compact('articulo', 'categoria'));
    }

    public function buscarArticulo(Request $data){
        $nombre=$data->input('buscar');
        
        if ($nombre=='Buscar') {
            return Redirect('/catalogo');
        }

        $articulo=DB::table('articulo')
            ->where('nombre', 'LIKE', '%'.$nombre.'%')
            ->get();

        if ($articulo->count()==0) {
             return Redirect('/error404');
        }

        $categoria = categoria::all();
        return view('catalogo', compact('articulo', 'categoria'));
    }

    public function articulo($id){ 
        $articulo = DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->get();

        $comentario = DB::table('comentario AS c')
            ->join('users AS u', 'u.id', '=', 'c.usuario')
            ->where('id_articulo', '=', $id)
            ->select('u.name AS usuario', 'c.comentario', 'c.created_at')
            ->get();

        $categoria = categoria::all();
        return view('articulo', compact('articulo', 'comentario', 'categoria'));
    }

    public function guardarComentario($id, Request $data){
        $usuario = Auth::user()->id;
        $comentario = $data->input('comentario');

        $nuevo = new comentario;
        $nuevo->id_articulo=$id;
        $nuevo->usuario=$usuario;
        $nuevo->comentario=$comentario;
        $nuevo->save();

        return Redirect('/articulo/'.$id);
    }

    public function error404(){
        $categoria = categoria::all();
        return view('error404', compact('categoria'));
    }
}