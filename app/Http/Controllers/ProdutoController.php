<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Item;
use App\Produto;
use App\ProdutoDetalhe;
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
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(10);

        // foreach($produtos as $key => $produto){

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

        //     if(isset($produtoDetalhe)){
        //         //$produtoDetalhe->getAttributes();
        //         $produtos[$key]['comprimento']   = $produtoDetalhe->comprimento;
        //         $produtos[$key]['altura']        = $produtoDetalhe->altura;
        //         $produtos[$key]['largura']       = $produtoDetalhe->largura;
        //     }
        // }
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
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', compact('unidades',$unidades, 'fornecedores', $fornecedores));
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
            'fornecedor_id'=>'exists:fornecedores,id'

        ];

        $feedback = [

            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome dever ter no minimo 3 caractares.',
            'nome.max' => 'O campo nome dever ter no máximo 40 caractares.',
            'descricao.min' => 'O campo descricao dever ter no minimo 10 caractares.',
            'descricao.max' => 'O campo descricao dever ter no máximo 240 caractares.',
            'peso.integer' => 'O peso dever ser um valor inteiro. Ex: 1,2,3...',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=>'Informe um fornecedor para o produto.'
        ];

        $request->validate($regras, $feedback);
        //dd($request->all());

        Produto::create($request->all());
        return redirect()->route('produto.index')->with('success', 'Produto Cadastro com sucesso');
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
        
        return view('app.produto.show', ['produto' => $produto, 'unidade' => $unidade]);
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
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores'=>$fornecedores]);
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
        $regras = [
            'nome' => 'required|min:10|max:40',
            'descricao' => 'required|min:10|max:240',
            'peso' => 'required|integer',
            'preco_custo' => 'required',
            'unidade_id' => 'exists:unidades,id',
            'preco_venda' => 'required',
            'estoque_minimo' => 'required',
            'estoque_maximo' => 'required',
            'fornecedor_id'=>'exists:fornecedores,id'

        ];

        $feedback = [

            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome dever ter no minimo 3 caractares.',
            'nome.max' => 'O campo nome dever ter no máximo 40 caractares.',
            'descricao.min' => 'O campo descricao dever ter no minimo 10 caractares.',
            'descricao.max' => 'O campo descricao dever ter no máximo 240 caractares.',
            'peso.integer' => 'O peso dever ser um valor inteiro. Ex: 1,2,3...',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=>'Informe um fornecedor para o produto.'
        ];

        $request->validate($regras, $feedback);

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
