@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="container mt-1">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('app.fornecedor.create') }}" class="btn btn-outline-primary">Novo</a>
                    <a href="{{ route('app.fornecedor.listar') }}" class="btn btn-outline-secondary">Listar Fornecedores</a>
                    <a href="{{ route('app.fornecedor') }}" class="btn btn-outline-warning">Pesquisar</a>
                </li>

            </ol>
        </nav>
        <form action="{{ route('app.fornecedor.store') }}" method="post">
            <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                    <input type="text"name="nome"placeholder="Nome" class="form-control"
                        value="{{ $fornecedor->nome ?? old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">CNPJ</label>
                    <input type="text"name="cnpj"placeholder="CNPJ" class="form-control"
                        value="{{ $fornecedor->cnpj ?? old('cnpj') }}">
                    {{ $errors->has('cnpj') ? $errors->first('cnpj') : '' }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">Nº Telefone</label>
                    <input type="text"name="telefone"placeholder="Nº Telefone" class="form-control"
                        value="{{ $fornecedor->telefone ?? old('telefone') }}">
                    {{ $errors->has('cnpj') ? $errors->first('cnpj') : '' }}
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">Site da Empresa</label>
                    <input type="text"name="site"placeholder="Site" class="form-control"
                        value="{{ $fornecedor->site ?? old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">UF</label>
                    <input type="text"name="uf"placeholder="UF" class="form-control"
                        value="{{ $fornecedor->uf ?? old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                    <input type="text"name="email"placeholder="E-mail" class="form-control"
                        value="{{ $fornecedor->email ?? old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-1">Cadastrar</button>
        </form>
    </div>
@endsection
