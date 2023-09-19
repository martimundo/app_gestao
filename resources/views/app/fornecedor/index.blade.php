@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('app.fornecedor.create')}}">Novo</a>
                    <a href="{{route('app.fornecedor')}}">Pesquisar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{route('app.fornecedor.listar')}}" method="post">
                    @csrf
                    <input type="text"name="nome"placeholder="Nome" class="borda-preta">
                    <input type="text"name="site"placeholder="Site" class="borda-preta">
                    <input type="text"name="uf"placeholder="UF"     class="borda-preta">
                    <input type="text"name="email"placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>                   

                </form>
            </div>
        </div>
    </div>
    

@endsection
