<?php

namespace App\Http\Controllers;

use App\ListaPresenca;
use App\Presente;
use App\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Recado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use laravel\pagseguro\Platform\Laravel5\PagSeguro;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recados = Recado::ativos()->orderBy('created_at', 'desc');
        return view('index', ['recados' => $recados->get()]);
    }

    public function salvarRecado(Request $request) {

        $recado = new Recado();
        $recado->autor = $request->autor;
        $recado->relacao = $request->relacao;
        $recado->recado = $request->mensagem;
        $recado = $recado->save();

        if ($recado) $retorno = "Logo mais seu recado aparecerá em nosso site. Muito obrigado, você é muito importante para nós!";
        else $retorno = "Infelizmente algo deu errado! Entre em contato conosco via telefone (17) 9 8174-5101 ou (17) 9 8158-3922 e conte-nos o que aconteceu";
        return redirect('enviado')->with('retorno', $retorno);
    }

    public function enviado() {
        $retorno['titulo'] = "[Erro ao enviar]";
        $retorno['mensagem'] = "Algo deu errado! Entre em contato conosco via telefone <br /> (17) 9 8174-5101 ou (17) 9 8158-3922 e nos avise.";
        if(Session::has('retorno')) {
            $retorno['titulo'] = "Enviado com sucesso!";
            $retorno['mensagem'] = Session::get('retorno');
        }

        return view ('enviado', compact('retorno'));
    }

    public function listaPresenca() {
        return view ('presenca');
    }

    public function confirmarPresenca(Request $request) {
        $presenca = new ListaPresenca();
        $presenca->nome = $request->nome;
        $presenca->quantidade = $request->quantidade;
        $presenca->confirma_presenca = $request->confirma_presenca;
        $presenca->observacoes = $request->observacoes;
        $presenca = $presenca->save();

        if ($presenca) $retorno = "Muito obrigado, sua informação vai nos ajudar a deixar a nossa festa ainda mais especial.";
        else $retorno = "Algo deu errado! Entre em contato conosco via telefone (17) 9 8174-5101 ou (17) 9 8158-3922 e conte-nos o que aconteceu";
        return redirect('enviado')->with('retorno', $retorno);
    }

    public function listaPresentes(Request $request) {

        $produtos = Produto::ativos();
        if (isset($request->categoria)) {
            $produtos->where('categoria', $request->categoria);
        }
        if (isset($request->ordenacao)) {
            $produtos->orderBy($request->ordenacao, (isset($request->dir) ? $request->dir : 'asc'));
        } else {
            $produtos->orderBy('nome', 'asc');
        }
        $produtos = $produtos->get();
        return view ('presentes', compact('produtos', 'request'));
    }

    public function pagamento(Request $request) {

        $presente = new Presente();

        $presente->nome = $request->nome;
        $presente->email = $request->email;
        $presente->telefone = $request->telefone;
        $presente->cpf = $request->cpf;
        $presente->nascimento = $request->nascimento;
        $presente->mensagem = $request->mensagem;
        $presente->codigo_pagamento = '';
        $presente->status = 0;
        $presente->created_at = Carbon::now();
        $presente->produto = $request->id;

        $produto = Produto::find($request->id);

        $data = [
            'items' => [
                [
                    'id' => $produto->id,
                    'description' => $produto->nome,
                    'quantity' => '1',
                    'amount' => $produto->getOriginal('valor')
                ],
            ],
            'shipping' => [
                'address' => [
                    'postalCode' => '15046233',
                    'street' => 'Rua Nelson Matta',
                    'number' => '607',
                    'district' => 'Alto das Andorinhas',
                    'city' => 'São José do Rio Preto',
                    'state' => 'SP',
                    'country' => 'BRA',
                ],
                'type' => 3
            ],
            'sender' => [
                'email' => $request->email,
                'name' => $request->nome,
                'documents' => [
                    [
                        'number' => str_replace(['.', '-'], '', $request->cpf),
                        'type' => 'CPF'
                    ]
                ],
                'phone' => str_replace(['(', ')', '-', ' '], '', $request->telefone),
                'bornDate' => $request->nascimento,
            ]
        ];
        try {
            $checkout = PagSeguro::checkout()->createFromArray($data);
            $credentials = PagSeguro::credentials()->get();
            $information = $checkout->send($credentials);

            $presente->codigo_pagamento = $information->getCode();
            $presente->save();
            $produto->status = 2;
            $produto->save();
            if ($information && $information->getLink()) {
                return Redirect::to($information->getLink());
            }
        } catch (\Exception $e) {
            $presente->status = 2;
            $presente->save();
        }
        return redirect('enviado');
    }

    public function finalizado(Request $request) {
        $retorno['titulo'] = "[Erro ao enviar]";
        $retorno['mensagem'] = "Algo deu errado! Entre em contato conosco via telefone <br /> (17) 9 8174-5101 ou (17) 9 8158-3922 e nos avise.";
        if(isset($request->transaction_id)) {
            $retorno['titulo'] = "Compra realizada com sucesso!";
            $retorno['mensagem'] = "Ficamos muito felizes em receber o seu presente!";
        }

        return view ('enviado', compact('retorno'));
    }
}
