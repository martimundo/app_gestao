@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="p-1">
        <h4>Editar de Pedido</h4>
        @component('app.pedido._components.form_create_edit',['pedido' => $pedido, 'clientes'=>$clientes])
        @endcomponent
    </div>
@endsection
