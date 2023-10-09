@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="container p-2">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="{{ route('produto.create') }}"class="btn btn-success btn-sm ">Cadastrar Novo Produto</a></li>
            </ol>
        </nav>
        <table class="table table-striped table-responsive table-hover table-bordered table-sm">
            <caption>Lista Produtos</caption>
            <thead>
                <tr>
                    <th scope="col">Cód. Prod.</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Site do Fornecedor</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Unid</th>
                    <th scope="col">Vl.Custo</th>
                    <th scope="col">Vl.Venda</th>
                    <th scope="col">Qtd.Min.</th>
                    <th scope="col">Qtd.Max.</th>
                    <th scope="col">Comprimento</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Largura</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (count($produtos) > 0 && count($produtos) < 10)
                    @foreach ($produtos as $produto)
                        <td>#{{ $produto->id }}</td>
                        <td> {{ $produto->nome }}</td>
                        <td> {{ $produto->fornecedor->nome }}</td>
                        <td> {{ $produto->fornecedor->site }}</td>
                        <td> {{ $produto->peso }}</td>
                        <td> {{ $produto->unidade_id }}</td>
                        <td> {{ $produto->preco_custo }}</td>
                        <td> {{ $produto->preco_venda }}</td>
                        <td> {{ $produto->estoque_minimo }}</td>
                        <td> {{ $produto->estoque_maximo }}</td>
                        <td> {{ $produto->produtoDetalhe->comprimento ?? '' }} </td>
                        <td> {{ $produto->produtoDetalhe->altura ?? '' }} </td>
                        <td> {{ $produto->produtoDetalhe->larguda ?? '' }} </td>
                        <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}"
                                class="btn btn-outline-primary btn-sm">Detalhes</td>
                        <td>
                            <a
                                href="{{ route('produto.edit', ['produto' => $produto->id]) }} "class="btn btn-outline-info btn-sm">Editar
                        </td>
                        <td>
                            <form action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
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
