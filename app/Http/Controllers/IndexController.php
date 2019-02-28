<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recado;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recados = Recado::ativos();
        return view('index', ['recados' => $recados->get()]);
    }

    public function recado(Request $request) {

        $recado = new Recado();
        $recado->autor = $request->autor;
        $recado->relacao = $request->relacao;
        $recado->recado = $request->mensagem;
        $recado = $recado->save();

        if ($recado) $retorno = "Recado enviado com sucesso! Logo mais ele aparecerá em nosso site. Muito obrigado, ele é muito importante para nós!";
        else $retorno = "Infelizmente algo deu errado! Entre em contato conosco via telefone (17) 9 8174-5101 ou (17) 9 8158-3922 e conte-nos o que aconteceu";
        return redirect('enviado')->with('retorno', $retorno);
    }

    public function enviado() {
        $retorno = "Infelizmente algo deu errado! Entre em contato conosco via telefone (17) 9 8174-5101 ou (17) 9 8158-3922 e conte-nos o que aconteceu";
        if(Session::has('retorno')) {
            $retorno = Session::get('retorno');
        }

        return view ('enviado', compact('retorno'));
    }
}
