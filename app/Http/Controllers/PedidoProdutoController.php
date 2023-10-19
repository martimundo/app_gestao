<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        
        //$pedido->produtos; //eager loading

        return view('app.pedido_produto.create', ['pedido'=>$pedido, 'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id'=>'required|exists:produtos,id',
            'quantidade'=>'required'
        ];
        $feedback=[
            'produto_id.exists'=>'Produto Informado não cadastrado',
            'required'=>'O campo :attribute deve possuir um valor valido!'
        ];

        $request->validate($regras, $feedback);

        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id =$request->get('produto_id'); 
        $pedidoProduto->quantidade = $request->get('quantidade');       
        $pedidoProduto->save();
        
        // $pedido->produtos()->attach(
        //     $request->get('produto_id'),
        //     ['quantidade'=>$request->get('quantidade')],
        // );
        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, Produto $produto)
    {        
        $pedido->produtos()->detach($produto->id);
        return redirect()
            ->route('pedido-produto.create', ['pedido'=>$pedido->id])
            ->with('success','Produto removido.');
    }
}
