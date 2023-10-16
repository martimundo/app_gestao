@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="container p-2">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="{{route('cliente.create')}}"class="btn btn-success btn-sm ">Cadastrar Cliente</a></li>
            </ol>
        </nav>
        <table class="table table-striped table-responsive table-hover table-bordered table-sm">
            <caption>Relação de Clientes</caption>
            <thead>
                <tr>
                    <th scope="col">Cód. Prod.</th>
                    <th scope="col">Nome</th>                    
                    <th colspan="3">Ações</th>
                </tr>
            </thead>            
            <tbody>
                @if (count($clientes) > 0 && count($clientes) < 10)
                    @foreach ($clientes as $cliente)
                        <td>#{{ $cliente->id }}</td>
                        <td> {{ $cliente->nome }}</td>                        
                        <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}" class="btn btn-outline-primary btn-sm">Detalhes</td>
                        <td>
                            <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }} "class="btn btn-outline-info btn-sm">Editar
                        </td>
                        <td>
                            <form action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                @elseif(count($clientes) > 10)
                    <p class="text-primary">Clientes cadastrados</p>
                @else
                    <p class="text-danger text-uppercase">Você não tem clientes cadastrados</p>
                @endif
            </tbody>
        </table>
        {{$clientes->appends($request)->links()}}
        Qtd. Total:<spam class="text-muted">{{$clientes->total()}}</spam><br>
        
        <hr>        
        Exibindo: {{$clientes->count()}} clientes de {{$clientes->total()}} de ({{$clientes->firstItem()}} até {{$clientes->lastItem()}})
    </div>

@endsection
