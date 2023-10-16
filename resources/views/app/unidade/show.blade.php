@extends('app.layouts.basico')

@section('titulo', 'Unidade')

@section('conteudo')
    <div class="container">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('unidade.index') }}">Retornar</a></li>
            </ol>
        </nav>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $unidade->unidade }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $unidade->descricao }}</h6>
                <a href="{{ route('unidade.edit', $unidade->id) }}" class="btn btn-primary">Editar Dados</a>
            </div>
        </div>
    </div>
@endsection
