@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="p-1">
        <div class="m-2">
            <h5>Adicionar Produtos ao Pedido</h5>
            <p class="m-0">Pedido nº: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente->nome }}</p>
        </div>
        @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
        @endcomponent

        <h6>itens do Pedido</h6>
        <div class="container p-2">
            <table class="table table-striped table-responsive table-hover table-bordered table-sm">
                <caption>Item do Pedido</caption>
                <thead>
                    <tr>
                        <th scope="col">Cód. Produto.</th>
                        <th scope="col">Nome do Produto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
