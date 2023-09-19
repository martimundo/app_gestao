@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    {{-- ESTRUTURA DE CONTROLE DE DECIÇÃO COM BLADE IF, ELSEIF E ELSE --}}
    <h3 class="mb-5">Lista de Fornecedores</h3>
    <table class="table table-striped table-hover table-bordered table-responsive ">
        <thead>
            <tr>
                <th>Cód. Fornec.</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>Site</th>
                <th>Telefone</th>
                <th>Cadastrado em:</th>
            </tr>
        </thead>
        <tbody class="mb-5">
          
            @if (count($fornecedores) > 0 && count($fornecedores) < 10)
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <th> {{ $fornecedor->id }}</th>
                        <th> {{ $fornecedor->nome }}</th>
                        <th> {{ $fornecedor->cnpj }}</th>
                        <th> {{ $fornecedor->email }}</th>
                        <th> {{ $fornecedor->site }}</th>
                        <th> {{ $fornecedor->telefone }}</th>
                        <th> {{ $fornecedor->created_at }}</th>
                    </tr>
                @endforeach
            @elseif(count($fornecedores) > 10)
                <h3>Existem muitos fornecedores cadatrados no sistemas</h3>
            @else
                <h3>Ainda não existe fornecedore cadatrado no sistema.</h3>
            @endif
        </tbody>

    </table>

@endsection
