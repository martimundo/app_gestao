<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {

        return view('app.fornecedor.index');
    }

    public function create(Request $request)
    {

        return view('app.fornecedor.create');
    }

    public function store(Request $request)
    {
        
        if ($request->input('_token') != '') {

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required|',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome dever ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome dever ter no máximo 40 caracteres',
                'uf.min' => 'O campo nome dever ter no minimo 2 caracteres',
                'uf.max' => 'O campo nome dever ter no máximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

           $fornecedor = new Fornecedor();
           $fornecedor->create($request->all());
           
        }
        return redirect()->route('app.fornecedor.create');
    }



    public function listar()
    {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedor.listar', compact('fornecedores'));
    }
}
