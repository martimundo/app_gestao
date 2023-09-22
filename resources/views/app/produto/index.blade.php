@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.create') }}">Novo</a>
                    <a href="">Pesquisar</a>
                </li>
            </ul>
        </div>
    </div>

    <h3 class="mb-5 text-center">Produtos</h3>
    <table class="table table-striped table-hover table-bordered table-responsive mb-5">
        <thead>
            <tr>
                <th>Cód. Prod.</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Peso</th>
                <th>Preço de Custo</th>
                <th>Unidade</th>
                <th>Prelo de Venda</th>
                <th>Estoque Min.</th>
                <th>Estoque Max.</th>
                <th>Criado em:</th>
                <th>Ações</th>
                <th>Ações</th>
                <th>Ações</th>

            </tr>
        </thead>
        <tbody class="mb-5">

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
                        <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Detalhes</th>
                        <th>
                            <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar
                        </th>

                        <th>
                            <form action="{{route('produto.destroy',['produto'=>$produto->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" >Excluir</button>
                            </form>
                       </th>
                    </tr>
                @endforeach
            @elseif(count($produtos) > 10)
                <h3>Existem muitos fornecedores cadatrados no sistemas</h3>
            @else
                <h3>Ainda não existe fornecedore cadatrado no sistema.</h3>
            @endif
        </tbody>

        {{ $produtos->appends($request)->links() }}
        Total de Registros por pagina: <strong>{{ $produtos->count() }}</strong><br>
        Total de Registros: <strong>{{ $produtos->total() }}</strong>
    </table>


@endsection
