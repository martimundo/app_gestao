@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="p-1">
        <h2>Cadastro de Clientes</h2>
        @component('app.cliente._components.form_create_edit')
        @endcomponent
    </div>
@endsection
