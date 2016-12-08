<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Mail\correo;
use Illuminate\Support\Facades\Mail;
use DB;
use App;
use App\pedido;
use App\carrito;
use App\usuario;
use App\categoria;

class pedidoController extends Controller
{

	public function pedido(){
        $auth_id = Auth::id();

		$articulo = DB::table('carrito AS c')
            ->join('articulo AS a', 'a.id_articulo', '=', 'c.id_articulo')
            ->where('c.id_usuario', '=', $auth_id)
            ->select('c.id_articulo', 'c.cantidad', 'c.subtotal','a.nombre AS nombre', 'a.precio AS precio')
            ->get();

        $total = DB::table('carrito')
            ->where('id_usuario', '=', $auth_id)
            ->sum('subtotal');

        $categoria = categoria::all();
    	return view('checkout', compact('articulo', 'categoria', 'total'));
    }

    public function anadirAlCarrito($id, Request $data){
        $cantidad = $data->input('cantidad');
        $precio = DB::table('articulo')
        	->where('id_articulo', '=', $id)
        	->get();

        $auth_id = Auth::id();

        $existe = DB::table('carrito')
            ->where(function($query) use($id, $auth_id)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $auth_id);
            })
            ->get();

        if ($existe->count()==0) {
            $nuevo = new carrito;
            $nuevo->id_usuario=$auth_id;
            $nuevo->id_articulo=$id;
            $nuevo->cantidad=$cantidad;
            $nuevo->subtotal=($precio->first()->precio*$cantidad);
            $nuevo->save();
        }else{
            DB::table('carrito')
            ->where(function($query) use($id, $auth_id)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $auth_id);
            })
            ->increment('cantidad', $cantidad);

            $nuevo = DB::table('carrito')
            ->where(function($query) use($id, $auth_id)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $auth_id);
            })
            ->get();

            DB::table('carrito')
            ->where(function($query) use($id, $auth_id, $nuevo)
            {
                $query->where('id_articulo', '=', $id)
                      ->where('id_usuario', '=', $auth_id);
            })
            ->update(['subtotal' => $precio->first()->precio*$nuevo->first()->cantidad]);
        }

        DB::table('articulo')
            ->where('id_articulo', '=', $id)
            ->decrement('stock', $cantidad);

        return back();
    }

    public function cancelarProducto($id){
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

    public function confirmarPedido($id){
        $auth_id = Auth::id();

    	$total = DB::table('carrito')
            ->where('id_usuario', '=', $auth_id)
    		->sum('subtotal');

    	$nuevo = new pedido;
        $nuevo->id_usuario=$id;
        $nuevo->total=$total;
        $nuevo->save();

        $articulos = DB::table('carrito')
            ->where('id_usuario', '=', $auth_id)
            ->get();

        foreach ($articulos as $a) {
            DB::table('articulo')
                ->where('id_articulo', '=', $a->id_articulo)
                ->increment('vendido', $a->cantidad);
        }        

        DB::table('carrito')
            ->where('id_usuario', '=', $auth_id)
            ->delete();
	
	$email = DB::table('users')
            ->where('id', '=', $auth_id)
	        ->select('email')
            ->get();

	Mail::to($email->first()->email)->send(new correo());

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

    public function pdfPedidos($id, $p){
	$pedido = DB::table('pedido')
        ->where(function($query) use($id, $p)
           {
                $query->where('id_usuario', '=', $id)
                      ->where('id_pedido', '=', $p);
            })
        ->get();	

        $vista=view('pdfPedidos', compact('pedido'));
        $dompdf=App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }
}
