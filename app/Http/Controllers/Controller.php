<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Collection;
use DB;
use App\usuario;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function principal(){
    	return view('inicio');
    }

    public function contacto(){
        return view('contact');
    }

    public function cuenta(){
        return view('cuenta');
    }

    public function crearCuenta(Request $data){
        $nombre = $data->input('nombre');
        $correo = $data->input('correo');
        $contra = $data->input('contra');
        $recontra = $data->input('recontra');

        if ($contra<>$recontra) {
            return back();
        } else {
            $nuevo = new usuario;
            $nuevo->nombre=$nombre;
            $nuevo->correo=$correo;
            $nuevo->contrasena=$contra;
            $nuevo->tipo=2;
            $nuevo->save();
        }   

        return redirect('/log');
    }

    public function log(){
        return view('log');
    }

    public function login(Request $data){
        $correo = $data->input('correo');
        $contra = $data->input('contra');

        $login=DB::table('usuario')
            ->where(function($query) use($correo, $contra)
            {
                $query->where('contrasena', '=', $contra)
                      ->where('correo', '=', $correo)
                      ->where('tipo', '=', 2);
            })
            ->get();

        if ($login->count()==0) {
            return back();
        } else {
            return Redirect('/catalogo');
        }       
    }

    public function faq(){
        return view('faq');
    }

    public function somos(){
        return view('quienesSomos');
    }
}