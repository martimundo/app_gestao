@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    {{-- ESTRUTURA DE CONTROLE DE DECIÇÃO COM BLADE IF, ELSEIF E ELSE --}}
    <div class="container mb-2 mt-2">

        <table class="table table-striped table-responsive table-hover table-sm table-borderless">
            <thead>
                <tr>
                    <th scope="col">Cód.</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Site</th>
                    <th scope="col">UF</th>
                    <th scope="col">Telefone</th>
                    <th colspan="3" class="text-center bg-primary rounded" style="color: white">Ações</th>

                </tr>
            </thead>

            <tbody class="mb-5">

                @if (count($fornecedores) > 0 && count($fornecedores) < 10)
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <th> <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Cód:{{ $fornecedor->id }}
                            </th>
                            <td> {{ $fornecedor->nome }}</td>
                            <td> {{ $fornecedor->cnpj }}</td>
                            <td> {{ $fornecedor->email }}</td>
                            <td> {{ $fornecedor->site }}</td>
                            <td> {{ $fornecedor->uf }}</td>
                            <td> {{ $fornecedor->telefone }}</td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"
                                    class="btn btn-danger">Excluir
                            </td>
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}" class="btn btn-info">Editar
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <strong>
                                    <p>Relação de Produtos: <spam>*</spam> {{ $fornecedor->nome }}</p>
                                </strong>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr class="table-success">
                                            <th>Codigo do Produto</th>
                                            <th>Nome Produto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td scope="row">{{ $produto->id }}</td>
                                                <td scope="row">{{ $produto->nome }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
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
