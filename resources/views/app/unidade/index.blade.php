@extends('app.layouts.basico')

@section('titulo', 'Unidades')

@section('conteudo')
    <div class="container p-2">
        <nav aria-label="breadcrumb ml-1">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="{{route('unidade.create')}}"class="btn btn-success btn-sm ">Cadastrar Unidade</a></li>
            </ol>
        </nav>
        <table class="table table-striped table-responsive table-hover table-bordered table-sm">
            <caption>Relação de Unidades</caption>
            <thead>
                <tr>
                    <th scope="col">Cód. Unidade.</th>
                    <th scope="col">Prefixo Unidade</th>
                    <th scope="col">Nome</th>
                    <th colspan="3">Ações</th>                    
                    
                </tr>
            </thead>            
            <tbody>
                @if (count($unidades) > 0 )
                    @foreach ($unidades as $unidade)
                        <td>#{{ $unidade->id }}</td>
                        <td> {{ $unidade->unidade }}</td>
                        <td> {{ $unidade->descricao }}</td>                        
                        <td><a href="{{ route('unidade.show', ['unidade' => $unidade->id]) }}" class="btn btn-outline-primary btn-sm">Detalhes</td>
                        <td>
                            <a href="{{ route('unidade.edit', ['unidade' => $unidade->id]) }} "class="btn btn-outline-info btn-sm">Editar
                        </td>
                        <td>
                            <form action="{{ route('unidade.destroy', ['unidade' => $unidade->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                @elseif(count($unidades) > 10)
                    <p class="text-primary">Unidadades cadastradas</p>
                @else
                    <p class="text-danger text-uppercase">Você não tem unidades cadastradas</p>
                @endif
            </tbody>
        </table>
        {{$unidades->appends($request)->links()}}
        Qtd. Total:<spam class="text-muted">{{$unidades->total()}}</spam><br>
        
        <hr>        
        Exibindo: {{$unidades->count()}} unidades de {{$unidades->total()}} de ({{$unidades->firstItem()}} até {{$unidades->lastItem()}})
    </div>

@endsection
