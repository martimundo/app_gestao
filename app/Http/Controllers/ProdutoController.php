<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', compact('unidades', $unidades));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:10|max:40',
            'descricao' => 'required|min:10|max:240',
            'peso' => 'required|integer',
            'preco_custo' => 'required',
            'unidade_id' => 'exists:unidades,id',
            'preco_venda' => 'required',
            'estoque_minimo' => 'required',
            'estoque_maximo' => 'required',

        ];

        $feedback = [

            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome dever ter no minimo 3 caractares.',
            'nome.max' => 'O campo nome dever ter no máximo 40 caractares.',
            'descricao.min' => 'O campo descricao dever ter no minimo 10 caractares.',
            'descricao.max' => 'O campo descricao dever ter no máximo 240 caractares.',
            'peso.integer' => 'O peso dever ser um valor inteiro. Ex: 1,2,3...',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {        
        $unidade = Unidade::first()->get();
        return view('app.produto.show',['produto'=>$produto,'unidade'=>$unidade] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {        
        $unidades = Unidade::all();
        return view('app.produto.edit',['produto'=> $produto, 'unidades'=>$unidades]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {        
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
