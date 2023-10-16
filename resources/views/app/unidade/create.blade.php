@extends('app.layouts.basico')

@section('titulo', 'Unidade')

@section('conteudo')
    <div class="p-1">
        <h2>Cadastro de Unidades de Medidas</h2>
        @component('app.unidade._components.form_create_edit')
        @endcomponent
    </div>
@endsection
