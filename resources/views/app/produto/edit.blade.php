@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <h2>Editar Produto</h2>
    @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades])
    @endcomponent

@endsection
