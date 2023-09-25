
@extends('app.layouts.basico')

@section('titulo', 'Detelhes do Produto')

@section('conteudo')

    <div class="conteudo-basico">
       
        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">

               @component('app.produto._components.form_create_edit',['unidades'=>$unidades])
                   
               @endcomponent
            </div>
        </div>
    </div>

@endsection
