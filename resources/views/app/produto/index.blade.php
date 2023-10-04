@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="container p-2">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="{{ route('produto.create') }}"
                        class="btn btn-outline-success btn-sm">Novo</a></li>
            </ol>
        </nav>
        <table class="table table-striped table-responsive table-bordered table-hover table-sm">
            <caption>Lista Produtos</caption>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cód. Prod.</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Preço de Custo</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Estoque Min.</th>
                    <th scope="col">Estoque Max.</th>
                    <th scope="col">Comprimento</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Largura</th>
                    <th scope="col">Ações</th>
                    <th scope="col">Ações</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @if (count($produtos) > 0 && count($produtos) < 10)
                    @foreach ($produtos as $produto)
                        <tr>
                            <th scope="row">#{{ $produto->id }}</th>
                            <th scope="row"> {{ $produto->nome }}</th>
                            <th scope="row"> {{ $produto->descricao }}</th>
                            <th scope="row"> {{ $produto->peso }}</th>
                            <th scope="row"> {{ $produto->preco_custo }}</th>
                            <th scope="row"> {{ $produto->unidade_id }}</th>
                            <th scope="row"> {{ $produto->preco_venda }}</th>
                            <th scope="row"> {{ $produto->estoque_minimo }}</th>
                            <th scope="row"> {{ $produto->estoque_maximo }}</th>
                            <th scope="row">{{ $produto->produtoDetalhe->comprimento ?? '' }} </th>
                            <th scope="row">{{ $produto->produtoDetalhe->altura ?? '' }} </th>
                            <th scope="row">{{ $produto->produtoDetalhe->larguda ?? '' }} </th>
                            <th scope="row"><a href="{{ route('produto.show', ['produto' => $produto->id]) }}"
                                    class="btn btn-outline-primary btn-sm">Detalhes</th>
                            <th scope="row">
                                <a
                                    href="{{ route('produto.edit', ['produto' => $produto->id]) }} "class="btn btn-outline-info btn-sm">Editar
                            </th>
                            <th scope="row">
                                <form action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm" type="submit">Excluir</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                @elseif(count($produtos) > 10)
                    <h4>Produtos cadastrados</h4>
                @else
                    <h4>Você não tem produtos cadastrados</h4>
                @endif
            </tbody>
        </table>
    </div>

@endsection
