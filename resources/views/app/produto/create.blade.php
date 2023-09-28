@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <h2>Cadastar Produto</h2>
    
    @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
    @endcomponent


@endsection
