<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Collection;
use DB;
use App\pedido;
use App\carrito;
use App\usuario;

class pedidoController extends Controller
{

	public function checkout(){
		$articulo = DB::table('carrito AS c')
            ->join('articulo AS a', 'a.id_articulo', '=', 'c.id_articulo')
            ->select('c.id_articulo', 'c.cantidad', 'a.nombre AS nombre', 'a.precio AS precio', 'a.stock AS stock')
            ->get();

    	return view('checkout', compact('articulo'));
    }

    public function agregarArticulo($id, Request $data){
        $cantidad = $data->input('cantidad');
        $precio = DB::table('articulo')
        	->where('id_articulo', '=', $id)
        	->get();

        $nuevo = new carrito;
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
    	$articulo = DB::table('carrito')
    		->where('id_articulo', '=', $id)
    		->get();

    	DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->increment('stock', $articulo->first()->cantidad);

        DB::table('carrito')
            ->where('id_articulo', '=', $id)
            ->delete();

    	return back();
    }

    public function realizarPedido($id){
    	$cont = carrito::all();

    	if($cont->count()==0) {
    		return back();
    	}

    	$total = DB::table('carrito')
    		->sum('subtotal');

    	$nuevo = new pedido;
        $nuevo->id_usuario=$id;
        $nuevo->total=$total;
        $nuevo->save();

        DB::table('carrito')
            ->delete();

        return Redirect('/checkout');
    }

    public function consultarPedido($id){
    	$pedidos = DB::table('pedido AS p')
            ->join('usuario AS u', 'u.id_usuario', '=', 'p.id_usuario')
            ->where('p.id_usuario', '=', $id)
            ->select('p.id_pedido', 'p.created_at', 'p.id_usuario', 'p.total', 'u.nombre AS nombre')
            ->get();

        return view('consultarPedido', compact('pedidos'));
    }
}
