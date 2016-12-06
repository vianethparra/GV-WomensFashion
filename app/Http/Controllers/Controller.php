<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Collection;
use App\categoria;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function principal(){
        $categoria = categoria::all();
    	return view('inicio', compact('categoria'));
    }

    public function contacto(){
        $categoria = categoria::all();
        return view('contact', compact('categoria'));
    }

    public function registroUsuario(){
        return view('auth/register');
    }

    public function log(){
        return view('auth/login');
    }

    public function faq(){
        $categoria = categoria::all();
        return view('faq', compact('categoria'));
    }

    public function somos(){
        $categoria = categoria::all();
        return view('quienesSomos', compact('categoria'));
    }
}