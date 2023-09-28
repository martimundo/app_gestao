@extends('site.layouts.basico')
@section('titulo', $titulo)  
@section('conteudo')
    
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @component('site.layouts._components.form_contato', ['classe'=>'borda-preta', 'motivo_contatos'=>$motivo_contatos])
                <p>A nossa equipe fará a analise da sua solicitação e entraremos em contato o mais breve possível</p>
                <p>O prazo para respota é de 48 Horas. Obrigado!</p>
                @endcomponent
            </div>
        </div>
       
@endsection
