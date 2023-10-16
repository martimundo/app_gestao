@extends('app.layouts.basico')

@section('titulo', 'Unidades')

@section('conteudo')
    <div class="p-1">
        <h5 class="m-2">Editar Unidades</h5>
        @component('app.unidade._components.form_create_edit', ['unidade'=>$unidade])
        @endcomponent
    </div>
@endsection
