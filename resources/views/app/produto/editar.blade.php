@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">

            <ul>
                <li>
                    <a href="{{ route('app.fornecedor.create') }}">Novo</a>
                    <a href="{{ route('app.fornecedor.listar') }}">Listar Fornecedores</a>
                    <a href="{{ route('app.fornecedor') }}">Pesquisar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.store') }}" method="post">
                    @csrf
                    <input type="text"name="nome"placeholder="Nome" class="borda-preta" value="{{ $fornecedor->nome }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text"name="cnpj"placeholder="CNPJ" class="borda-preta" value="{{ old('cnpj') }}">
                    {{ $errors->has('cnpj') ? $errors->first('cnpj') : '' }}

                    <input type="text"name="site"placeholder="Site" class="borda-preta" value="{{ old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text"name="uf"placeholder="UF" class="borda-preta" value="{{ old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text"name="email"placeholder="E-mail" class="borda-preta" value="{{ old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
