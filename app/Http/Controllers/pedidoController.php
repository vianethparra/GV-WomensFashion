<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use DB;
use App\pedido;
use App\carrito;
use App\usuario;
use App\categoria;

class pedidoController extends Controller
{

	public function checkout(){
        $auth_id = Auth::id();

		$articulo = DB::table('carrito AS c')
            ->join('articulo AS a', 'a.id_articulo', '=', 'c.id_articulo')
            ->where('c.id_usuario', '=', $auth_id)
            ->select('c.id_articulo', 'c.cantidad', 'a.nombre AS nombre', 'a.precio AS precio')
            ->get();

        $categoria = categoria::all();
    	return view('checkout', compact('articulo', 'categoria'));
    }

    public function agregarArticulo($id, Request $data){
        $cantidad = $data->input('cantidad');
        $precio = DB::table('articulo')
        	->where('id_articulo', '=', $id)
        	->get();

        $auth_id = Auth::id();

        $nuevo = new carrito;
        $nuevo->id_usuario=$auth_id;
        $nuevo->id_articulo=$id;
        $nuevo->cantidad=$cantidad;
        $nuevo->subtotal=($precio->first()->precio*$cantidad);
        $nuevo->save();

        DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->decrement('stock', $cantidad);

        return back();
    }

    public function dejarArticulo($id){
        $auth_id = Auth::id();

    	$articulo = DB::table('carrito')
    		->where(function($query) use($id, $auth_id)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $auth_id);
            })
    		->get();

    	DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->increment('stock', $articulo->first()->cantidad);

        DB::table('carrito')
            ->where(function($query) use($id, $auth_id)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $auth_id);
            })
            ->delete();

    	return back();
    }

    public function realizarPedido($id){
        $auth_id = Auth::id();

    	$total = DB::table('carrito')
            ->where('id_usuario', '=', $auth_id)
    		->sum('subtotal');

    	$nuevo = new pedido;
        $nuevo->id_usuario=$id;
        $nuevo->total=$total;
        $nuevo->save();

        DB::table('carrito')
            ->where('id_usuario', '=', $auth_id)
            ->delete();

        return Redirect('/consultarPedido/'.$auth_id);
    }

    public function consultarPedido($id){
    	$pedidos = DB::table('pedido AS p')
            ->join('users AS u', 'u.id', '=', 'p.id_usuario')
            ->where('p.id_usuario', '=', $id)
            ->select('p.id_pedido', 'p.created_at', 'p.id_usuario', 'p.total', 'u.name AS nombre')
            ->get();

        $categoria = categoria::all();
        return view('consultarPedido', compact('pedidos', 'categoria'));
    }
}
