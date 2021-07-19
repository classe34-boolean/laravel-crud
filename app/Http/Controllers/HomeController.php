<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function saluta($nome) {
        return "Ciao " . $nome;
    }

    public function quadrato($numero) {
        if(is_numeric($numero)) {
            return $numero * $numero;
        } else {
            return "Il parametro fornito non è un numero";
        }
    }
}
