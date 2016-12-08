<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\articulo;
use App\categoria;
use App\comentario;
use App\votos;

class articuloController extends Controller
{
    public function mostrarCatalogo(){
        $articulo = articulo::all();
        $categoria = categoria::all();

    	return view('catalogo', compact('articulo', 'categoria'));
    }

    public function por_Categoria($id){
        $articulo = DB::table('articulo')
            ->where('categoria', '=', $id)
            ->get();

        $categoria = categoria::all();
        return view('catalogo', compact('articulo', 'categoria'));
    }

    public function por_Articulo(Request $data){
        $nombre=$data->input('buscar');
        
        if ($nombre=='Buscar') {
            return Redirect('/mostrarCatalogo');
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

        $votos = DB::table('votos')
            ->where('id_articulo', '=', $id)
            ->sum('puntuacion');

        $dvotos = DB::table('votos')
            ->where('id_articulo', '=', $id)
            ->sum('negativo');

        $categoria = categoria::all();
        return view('articulo', compact('articulo', 'comentario', 'categoria', 'votos', 'dvotos'));
    }

    public function escribirComentario($id, Request $data){
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

    public function votar($id){
        $usuario = Auth::user()->id;
        $ex = DB::table('votos')
             ->where(function($query) use($id, $usuario)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $usuario);
            })
            ->get();

        if ($ex->count()==0) {
            $nuevo = new votos;
            $nuevo->id_articulo=$id;
            $nuevo->id_usuario=$usuario;
            $nuevo->puntuacion=1;
            $nuevo->save();
        }else{
            DB::table('votos')
            ->where('id_usuario', '=', $usuario)
            ->update(['puntuacion' => 1,
                     'negativo' => 0]);
        }        

        return back();
    }

    public function desvotar($id){
        $usuario = Auth::user()->id;
        $ex = DB::table('votos')
             ->where(function($query) use($id, $usuario)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $usuario);
            })
            ->get();

        if ($ex->count()==0) {
            $nuevo = new votos;
            $nuevo->id_articulo=$id;
            $nuevo->id_usuario=$usuario;
            $nuevo->negativo=1;
            $nuevo->save();
        }else{
            DB::table('votos')
            ->where('id_usuario', '=', $usuario)
            ->update(['puntuacion' => 0,
                     'negativo' => 1]);
        }        

        return back();
    }
}
