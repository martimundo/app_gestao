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

        if ($request->input('_token') != '' && $request->input('id') == '') {

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

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            // dd($fornecedor);
            $fornecedor->update($request->all());

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id')]);
        }
        return redirect()->route('app.fornecedor.listar')->with('sucess','Fornecedor Cadatrado Com sucesso!');
    }



    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'LIKE', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores], ['request' => $request->all()]);
    }

    public function editar($id)
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.create', compact('fornecedor'));
    }

    public function excluir($id)
    {

        $fornecedor = Fornecedor::find($id);  
        $fornecedor->delete();

        return redirect()->route('app.fornecedor.listar')->with('sucess', 'Registro excluído');
    }
}
