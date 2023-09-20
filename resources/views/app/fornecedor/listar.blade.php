@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Listagem de Fornecedores</p>
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

    {{-- ESTRUTURA DE CONTROLE DE DECIÇÃO COM BLADE IF, ELSEIF E ELSE --}}
    <h3 class="mb-5">Lista de Fornecedores</h3>
    <table class="table table-striped table-hover table-bordered table-responsive mb-5">
        <thead>
            <tr>
                <th>Cód. Fornec.</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>Site</th>
                <th>UF</th>
                <th>Telefone</th>
                <th>Cadastrado em:</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="mb-5">

            @if (count($fornecedores) > 0 && count($fornecedores) < 10)
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <th> <a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Cód:{{ $fornecedor->id }}</th>
                        <th> {{ $fornecedor->nome }}</th>
                        <th> {{ $fornecedor->cnpj }}</th>
                        <th> {{ $fornecedor->email }}</th>
                        <th> {{ $fornecedor->site }}</th>
                        <th> {{ $fornecedor->uf }}</th>
                        <th> {{ $fornecedor->telefone }}</th>
                        <th> {{ $fornecedor->created_at }}</th>
                        <th>Excluir </th>
                        <th><a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Editar</th>
                    </tr>
                @endforeach
            @elseif(count($fornecedores) > 10)
                <h3>Existem muitos fornecedores cadatrados no sistemas</h3>
            @else
                <h3>Ainda não existe fornecedore cadatrado no sistema.</h3>
            @endif
        </tbody>

        {{$fornecedores->appends($request)->links()}}  
        Total de Registros por pagina: <strong>{{$fornecedores->count()}}</strong><br>
        Total de Registros: <strong>{{$fornecedores->total()}}</strong>
    </table>

@endsection
