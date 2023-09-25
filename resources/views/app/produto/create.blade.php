@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
           <h3>Cadastrar Produto</h3>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.index') }}">Voltar</a>
                    <a href="">Consultar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">

               @component('app.produto._components.form_create_edit',['unidades'=>$unidades])
                   
               @endcomponent
            </div>
        </div>
    </div>

@endsection
