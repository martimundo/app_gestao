@extends('app.layouts.basico')

@section('titulo', 'Unidades')

@section('conteudo')
    <div class="p-1">
        <h2>Editar Unidades</h2>
        @component('app.cliente._components.form_create_edit')
        @endcomponent
    </div>
@endsection
