@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Cadastrar Produto</p>
        </div>
        <div class="menu">

            <ul>
                <li>
                    <a href="">Novo</a>
                    <a href="">Listar Produtos</a>
                    <a href=">Pesquisar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">                
                <form action="" method="post">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text"name="nome"placeholder="Nome do Produto" class="borda-preta"
                        value="{{ $produto->nome ?? old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="number"name="peso"placeholder="Inform o peso do produto" class="borda-preta"
                        value="{{ $produto->peso ?? old('peso') }}">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <input type="text" name="preco_custo"placeholder="Informe o preço de custo" class="borda-preta"
                        value="{{ $produto->preco_custo ?? old('preco_custo') }}">
                    {{ $errors->has('preco_custo') ? $errors->first('preco_custo') : '' }}

                    <input type="text"name="site"placeholder="Site" class="borda-preta"
                        value="{{ $produto->site ?? old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text"name="uf"placeholder="UF" class="borda-preta"
                        value="{{ $produto->uf ?? old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text"name="email"placeholder="E-mail" class="borda-preta"
                        value="{{ $produto->email ?? old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
