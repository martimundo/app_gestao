<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {  

        $motivo_contato = MotivoContato::all();
        // dd($motivo_contato);     

        //para carregar a view do formulário
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contato]);
    }

    public function salvar(Request $request)
    {
        /*
       Primeira forma de salvar os dados no banco de dados
        $sitecontato = new SiteContato();
       $sitecontato->nome = $request->input('nome');
       $sitecontato->email = $request->input('email');
       $sitecontato->telefone = $request->input('telefone');
       $sitecontato->motivo_contato = $request->input('motivo_contato');
       $sitecontato->mensagem = $request->input('mensagem');
       $sitecontato->save();
       */

        /**
         * Nesse segundo caso, vamos usar o metodo fill() que vai inserir os dados através de um array associativo. 
        Podemos usar tbm o metodo create() para salver os dados no banco de dados...essa técnica é muito boa quando
        não precisamos de uma validação muito especifica para salvar dados no banco de dados.
         */

        //$contato = new SiteContato();
        //$contato->fill($request->all());
        //$contato->save();
        //$contato->create($request->all());

        //Como relizar a validação dos dados antes de salvar os dados no banco de dados.

        $regras = [
            'nome' => 'required|min:5|max:100|unique:site_contatos',
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedback = [

            'nome.required' => "O campo Nome, precisa ser preenchido",
            'nome.min' => "O nome precisa ter no minimo 5 caracteres",
            'nome.max' => "O nome deve ter no máximo 100 caracteres",
            'nome.unique' => "O nome informado ja esta cadastrado",
            'email.email' => "Informe um email valido",
            'mensagem.max' => "A mensgem deve ter no máximo 2000 caracteres",
            'required' => "O campo :attribute deve ser preenchido"
        ];
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        //retornando para a nome da rota principal 
        return redirect()->route('site.index');
    }
}
