<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bolsa;

class BolsaController extends Controller
{
    public function index()

    {
        $registros = Bolsa::all();
        return view('admin.bolsasAll.index', compact('registros'));

    }

    public function adicionar()
    {
        return view('admin.bolsasAll.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/bolsas/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        Bolsa::create($dados);

        return redirect()->route('admin.bolsas');
    }

    public function editar($id)
    {
        $registro = Bolsa::find($id);
        return view('admin.bolsasAll.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/bolsas/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        Bolsa::find($id)->update($dados);

        return redirect()->route('admin.bolsas');
    }

    public function deletar($id)
    {
        Bolsa::find($id)->delete();
        return redirect()->route('admin.bolsas');
    }

}

