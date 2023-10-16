@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="container">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pedido.index') }}" class="btn btn-success btn-sm ">Voltar</a></li>

            </ol>
        </nav>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $pedido->id }}</h5>
                <p class="card-title">Cliente: {{ $pedido->cliente_id }}</p>
                <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-primary">Editar Dados</a>
            </div>
        </div>
    </div>

@endsection
