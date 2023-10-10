@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="container">
<nav aria-label="breadcrumb ml-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('produto.index')}}">Voltar</a></li>
            
        </ol>
    </nav>

<div class="card" style="width: 18rem;">    
    <div class="card-body">
      <h5 class="card-title">{{ $produto->nome}}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">{{ $produto->descricao}}</h6>
      <p class="card-text">Produto: {{ $produto->nome}}.</p>      
      <p class="card-text">Fornecedor: {{ $produto->fornecedor->nome}}.</p>      
      <p class="card-text">Peso: {{ $produto->peso}}.</p>
      <p class="card-text">Vl. Custo: {{ $produto->preco_custo}}.</p>
      <p class="card-text">Vl. Venda: {{ $produto->preco_venda}}.</p>
      <p class="card-text">Qtd. Min: {{ $produto->estoque_minimo}}.</p>
      <p class="card-text">Qtd. Max: {{ $produto->estoque_maximo}}.</p>
      <p class="card-text">Unidade: {{ $produto->unidade_id}}.</p>
      <a href="{{route('produto.edit', $produto->id)}}" class="btn btn-primary">Editar Dados</a>
    </div>
  </div>   
</div>
        

@endsection
