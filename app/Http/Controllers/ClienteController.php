<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);
        
        return view('app.cliente.index', ['clientes'=>$clientes, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('app.cliente.create');
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
            'nome' => 'required|min:10|max:60',       

        ];

        $feedback = [

            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome dever ter no minimo 3 caractares.',
            'nome.max' => 'O campo nome dever ter no máximo 40 caractares.',
            
        ];
        
        $cliente = $request->validate($regras, $feedback);
        Cliente::create($request->all());

        return redirect()->route('cliente.index')->with('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('app.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('app.cliente.edit', compact('cliente', $cliente));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $regras = [
            'nome' => 'required|min:10|max:60',       

        ];

        $feedback = [

            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome dever ter no minimo 3 caractares.',
            'nome.max' => 'O campo nome dever ter no máximo 40 caractares.',
            
        ];

        $request->validate($regras, $feedback);
        $cliente->update($request->all());
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {   
      
        if($cliente->pedido){
            return redirect()->route('cliente.index')
            ->with("warning", "O cliente {$cliente->nome} ser excluído(a) verifique se ela tem pedidos!");
        }else{
            
            $cliente->delete();
        }
        return redirect()->route('cliente.index');
    }
}
