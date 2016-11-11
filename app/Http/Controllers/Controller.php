<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function principal(){
    	return view('inicio');
    }

    public function catalogo(){
    	return view('catalogo');
    }

    public function checkout(){
    	return view('checkout');
    }

    public function contacto(){
        return view('contact');
    }

    public function cuenta(){
        return view('cuenta');
    }

    public function log(){
        return view('log');
    }

    public function faq(){
        return view('faq');
    }

    public function somos(){
        return view('quienesSomos');
    }

    public function articulo(){
        return view('articulo');
    }
}