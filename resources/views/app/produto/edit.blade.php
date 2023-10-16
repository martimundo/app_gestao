@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="row">
        <div class="col-6">
            <h5 class="m-2">Editar Produto</h5>
        </div>
    </div>
    @component('app.produto._components.form_create_edit', [
        'produto' => $produto,
        'unidades' => $unidades,
        'fornecedores' => $fornecedores,
    ])
    @endcomponent

@endsection
