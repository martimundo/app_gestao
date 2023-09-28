@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    
    <div class="p-1">
        <h2>Cadastar Produto</h2>
        @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
    @endcomponent
    </div>
    


@endsection
