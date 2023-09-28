@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

<nav aria-label="breadcrumb ml-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('produto.index')}}">Voltar</a></li>
        
    </ol>
</nav>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('app.fornecedor.create') }}">Novo</a>
            <a href="{{ route('app.fornecedor.listar') }}">Listar Fornecedores</a>
            <a href="{{ route('app.fornecedor') }}">Pesquisar</a>
        </li>
    </ul>
    <form action="{{ route('app.fornecedor.store') }}" method="post">
        <input type="hidden" name="id" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label " name="nome"placeholder="Nome"
            value="{{ $fornecedor->nome ?? old('nome') }}">Nome</label>
            <input type="text" class="form-control" id="name">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label" name="cnpj"placeholder="CNPJ"
            value="{{ $fornecedor->cnpj ?? old('cnpj') }}">CNPJ</label>
            <input type="text" class="form-control" id="cnpj">
            {{ $errors->has('cnpj') ? $errors->first('cnpj') : '' }}
        </div>
        <div class="mb-3">
            <label for="site" class="form-label" name="site"placeholder="Site"
            value="{{ $fornecedor->telefone ?? old('telefone') }}">Site</label>
            <input type="text" class="form-control" id="site">
            {{ $errors->has('site') ? $errors->first('site') : '' }}
        </div>
        <div class="mb-3">
            <label for="uf" class="form-label" name="uf"placeholder="UF" value="{{ old('uf') }}">UF</label>
            <input type="text" class="form-control" id="uf">
            {{ $errors->has('uf') ? $errors->first('uf') : '' }}
        </div>
        <div class="mb-3">
            <label for="email" class="form-label" name="email"placeholder="E-mail"
                value="{{ old('email') }}">E-mail</label>
            <input type="email" class="form-control" id="email">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

@endsection
