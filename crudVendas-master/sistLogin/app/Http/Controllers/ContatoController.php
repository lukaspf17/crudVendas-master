<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = [
          (object)["nome"=>"Maria", "tel"=> "21 3453-3434"],
          (object)["nome"=>"Pedro", "tel"=> "21 3453-3400"],
        ];

        $contato = new Contato();
        dd($contato -> lista());
        return view('contato.index', compact('contatos'));
    }

    public function criar(Request $req)
    {
        dd($req->all());
        return "Esse é o Criar do ContatoController";
    }

    public function editar()
    {
        return "Esse é o Editar do ContatoController";
    }
}
