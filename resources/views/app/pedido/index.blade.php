@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="container p-2">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="{{route('pedido.create')}}"class="btn btn-success btn-sm ">Cadastrar Pedido</a></li>
            </ol>
        </nav>
        <table class="table table-striped table-responsive table-hover table-bordered table-sm">
            <caption>Relação de Pedidos</caption>
            <thead>
                <tr>
                    <th scope="col">Cód. Pedido.</th>
                    <th scope="col">Cliente</th>                    
                    <th colspan="3">Ações</th>
                </tr>
            </thead>            
            <tbody>
                @if (count($pedidos) > 0 )
                    @foreach ($pedidos as $pedido)
                        <td>#{{ $pedido->id }}</td>
                        <td> {{ $pedido->cliente->nome }}</td>                        
                        <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}" class="btn btn-outline-primary btn-sm">Detalhes</td>
                        <td>
                            <a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }} "class="btn btn-outline-info btn-sm">Editar
                        </td>
                        <td>
                            <form action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                @elseif(count($pedidos) > 10)
                    <p class="text-primary">Pedidos cadastrados</p>
                @else
                    <p class="text-danger text-uppercase">Você não tem novos pedidos cadastrados</p>
                @endif
            </tbody>
        </table>
        {{$pedidos->appends($request)->links()}}
        Qtd. Total:<spam class="text-muted">{{$pedidos->total()}}</spam><br>
        
        <hr>        
        Exibindo: {{$pedidos->count()}} pedidos de {{$pedidos->total()}} de ({{$pedidos->firstItem()}} até {{$pedidos->lastItem()}})
    </div>

@endsection
