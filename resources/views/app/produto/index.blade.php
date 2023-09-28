@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <table class="table table-striped table-responsive" id="datatablesSimple">
        <thead>
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
                <th scope="col">Criado em:</th>
                <th scope="col">Ações</th>

            </tr>
        </thead>
        <tbody>
            @if (count($produtos) > 0 && count($produtos) < 10)
                @foreach ($produtos as $produto)
                    <tr>
                        <th># {{ $produto->id }}</th>
                        <th> {{ $produto->nome }}</th>
                        <th> {{ $produto->descricao }}</th>
                        <th> {{ $produto->peso }}</th>
                        <th> {{ $produto->preco_custo }}</th>
                        <th> {{ $produto->unidade_id }}</th>
                        <th> {{ $produto->preco_venda }}</th>
                        <th> {{ $produto->estoque_minimo }}</th>
                        <th> {{ $produto->estoque_maximo }}</th>
                        <th> {{ $produto->created_at }}</th>
                        <th>
                            <a href="{{ route('produto.create')}} "class="btn btn-success">Novo
                        </th>
                        <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}"
                                class="btn btn-primary">Detalhes</th>
                        <th>
                            <a href="{{ route('produto.edit', ['produto' => $produto->id]) }} "class="btn btn-info">Editar
                        </th>

                        <th>
                            <form action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Excluir</button>
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
@endsection
