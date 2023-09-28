@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    {{-- ESTRUTURA DE CONTROLE DE DECIÇÃO COM BLADE IF, ELSEIF E ELSE --}}
<div class="container mb-2 mt-2">

    <table class="table table-striped table-responsive table-hover" >
        <thead>
            <tr>
                <th scope="col">Cód.</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Email</th>
                <th scope="col">Site</th>
                <th scope="col">UF</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cadastrado em:</th>
                <th scope="col"></th>
                <th scope="col">
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody class="mb-5">

            @if (count($fornecedores) > 0 && count($fornecedores) < 10)
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <th> <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Cód:{{ $fornecedor->id }}
                        </th>
                        <th> {{ $fornecedor->nome }}</th>
                        <th> {{ $fornecedor->cnpj }}</th>
                        <th> {{ $fornecedor->email }}</th>
                        <th> {{ $fornecedor->site }}</th>
                        <th> {{ $fornecedor->uf }}</th>
                        <th> {{ $fornecedor->telefone }}</th>
                        <th> {{ $fornecedor->created_at }}</th>
                        <th><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}" class="btn btn-danger">Excluir
                        </th>
                        <th><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}" class="btn btn-info">Editar
                        </th>
                    </tr>
                @endforeach
            @elseif(count($fornecedores) > 10)
                <h3>Existem muitos fornecedores cadatrados no sistemas</h3>
            @else
                <h3>Ainda não existe fornecedore cadatrado no sistema.</h3>
            @endif
        </tbody>
        <div class="row">
            <div class="col-12">
                {{ $fornecedores->appends($request)->links() }}
                Total de Registros por pagina: <strong>{{ $fornecedores->count() }}</strong><br>
                Total de Registros: <strong>{{ $fornecedores->total() }}</strong>
            </div>
        </div>
    </table>   
</div>
@endsection
