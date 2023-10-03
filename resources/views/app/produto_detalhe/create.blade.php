@extends('app.layouts.basico')

@section('titulo', 'Cadatrar Detalhes do Produto')

@section('conteudo')

    @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
    @endcomponent


@endsection
