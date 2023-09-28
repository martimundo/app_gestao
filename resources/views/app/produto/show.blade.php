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
      <p class="card-text">{{ $produto->nome}}.</p>      
      <p class="card-text">{{ $produto->peso}}.</p>
      <p class="card-text">{{ $produto->preco_custo}}.</p>
      <p class="card-text">{{ $produto->preco_venda}}.</p>
      <p class="card-text">{{ $produto->estoque_minimo}}.</p>
      <p class="card-text">{{ $produto->estoque_maximo}}.</p>
      <p class="card-text">{{ $produto->unidade_id}}.</p>
      <a href="{{route('produto.edit', $produto->id)}}" class="btn btn-primary">Editar Dados</a>
    </div>
  </div>   
</div>
        

@endsection
