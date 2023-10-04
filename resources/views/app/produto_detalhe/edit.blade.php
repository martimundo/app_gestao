@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    <h2>Editar Detalhes do Produto</h2>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Produto</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $produto_detalhe->produto->nome }}</h6>
            <p class="card-text">Descrição: {{ $produto_detalhe->produto->descricao }} .</p>
        </div>
    </div>
    
    @component('app.produto_detalhe._components.form_create_edit', [
        'produto_detalhe' => $produto_detalhe,
        'unidades' => $unidades,
    ])
    @endcomponent

@endsection
