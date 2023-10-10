@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="p-1">
        <h2>Cadastar Produto</h2>
        @component('app.produto._components.form_create_edit', ['unidades' => $unidades, 'fornecedores'=>$fornecedores])
    @endcomponent
    </div>
    


@endsection
