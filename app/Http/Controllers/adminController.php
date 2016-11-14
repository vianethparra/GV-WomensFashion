<?php

namespace App\Http\Controllers;
use DB;
use Excel;
use App\usuario;
use App\articulo;
use App\comentario;
use App\categoria;
use App\pedido;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Collection;

class adminController extends Controller
{
    public function log(){
    	return view ('adminLog');
    }

    public function inicio(){
    	return view ('adminInicio');
    }

    public function adminLog(Request $data){
    	$usuario = $data->input('user');
    	$contra = $data->input('contra');

    	$admin=DB::table('usuario')
        	->where(function($query) use($usuario, $contra)
            {
                $query->where('contrasena', '=', $contra)
                      ->where('nombre', '=', $usuario)
                      ->where('tipo', '=', 1);
            })
            ->get();

    	if ($admin->count()==0) {
    		return back();
    	} else {
    		return Redirect('/inicio');
    	}    	
    }

    public function consultarArticulos(){
        $articulo = articulo::all();
        return view('consultarArticulos', compact('articulo'));
    }

    public function eliminarArticulo($id){
        DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->delete();
        
        return Redirect('/consultarArticulos');
    }

    public function generarArticulo(){
        return view('generarArticulo');
    }

    public function generarArticuloCSV(){
        return view('generarArticuloCSV');
    }

    public function guardarArticuloCSV(Request $data){
        Excel::load($data->input('csv'))->each(function (Collection $csvLine) {
            $nuevo = new articulo;
            $nuevo->nombre=$csvLine->get('nombre');
            $nuevo->categoria=$csvLine->get('categoria');
            $nuevo->precio=$csvLine->get('precio');
            $nuevo->stock=$csvLine->get('stock');
            $nuevo->descripcion=$csvLine->get('descripcion');
            $nuevo->save();
        });

        return Redirect('/consultarArticulos');
    }
    
    
    public function guardarArticulo(Request $data){
        $nombre = $data->input('nombre');
        $categoria = $data->input('categoria');
        $precio = $data->input('precio');
        $stock = $data->input('stock');
        $descripcion = $data->input('descripcion');

        $nuevo = new articulo;
        $nuevo->nombre=$nombre;
        $nuevo->categoria=$categoria;
        $nuevo->precio=$precio;
        $nuevo->stock=$stock;
        $nuevo->descripcion=$descripcion;
        $nuevo->save();

        return redirect('/consultarArticulos');
    }

    public function editar($id){
        $articulo = DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->get();

        return view('editarArticulo', compact('articulo'));
    }

    public function editarArticulo($id, Request $data){
        DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->update(['nombre' => $data->input('nombre'),
                     'categoria' => $data->input('categoria'),
                     'precio' => $data->input('precio'),
                     'stock' => $data->input('stock'),
                     'descripcion' => $data->input('descripcion')]);

        return Redirect('/consultarArticulos');
    }

    public function comentarios($id){
        $comentario = DB::table('comentario AS c')
            ->join('articulo AS a', 'a.id_articulo', '=', 'c.id_articulo')
            ->where('c.id_articulo', '=', $id)
            ->select('c.id_comentario', 'c.id_articulo', 'a.nombre AS nombre', 'c.usuario', 'c.comentario')
            ->get();


        return view('comentarios', compact('comentario'));
    }

    public function eliminarComentario($id, $art){
        DB::table('comentario')
            ->where('id_comentario', '=', $id)
            ->delete();
        
        return Redirect('/comentarios/'.$art);
    }

    public function categorias(){
        $categoria = categoria::all();

        return view('consultarCategorias', compact('categoria'));
    }

    public function pedidos(){
        $pedidos = DB::table('pedido AS p')
            ->join('usuario AS u', 'u.id_usuario', '=', 'p.id_usuario')
            ->select('p.id_pedido', 'p.created_at', 'p.id_usuario', 'p.total', 'u.nombre AS nombre')
            ->get();

        return view('consultarPedidos', compact('pedidos'));
    }
}
