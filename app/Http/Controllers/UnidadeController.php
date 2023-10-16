<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unidades = Unidade::paginate(10);
        return view('app.unidade.index', ['unidades'=>$unidades, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.unidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras=[
            'unidade' => 'required|max:2',
            'descricao'=>'required|min:5|max:150'

        ];
        $fedback=[
            'required'=>'O campo :attribute dever ser prenchido',
            'unidade.max'=>'O campo Unidade só pode ter no máximo dois caracteres',
            'descricao.min'=>'O campo descrição deve ter no minino 5 caracteres',
            'descricao.max'=>'O campo descrição deve ter no máximo 150 caracteres'
        ];

        $request->validate($regras, $fedback);
        $unidade = new Unidade();
        $unidade->create($request->all());

        return redirect()->route('unidade.index')->with('success','Unidade Cdastrada com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        return view('app.unidade.show', compact('unidade', $unidade));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        return view('app.unidade.edit', ['unidade'=>$unidade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidade $unidade)
    {
        $regras=[
            'unidade' => 'required|max:2',
            'descricao'=>'required|min:5|max:150'

        ];
        $fedback=[
            'required'=>'O campo :attribute dever ser prenchido',
            'unidade.max'=>'O campo Unidade só pode ter no máximo dois caracteres',
            'descricao.min'=>'O campo descrição deve ter no minino 5 caracteres',
            'descricao.max'=>'O campo descrição deve ter no máximo 150 caracteres'
        ];

        $request->validate($regras, $fedback);
       
        $unidade->update($request->all());

        return redirect()->route('unidade.index')->with('success','Unidade Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {        
        $unidade->delete($unidade);
        return redirect()->route('unidade.index');
    }
}
