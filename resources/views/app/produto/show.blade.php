@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Detalhes do Produto</p>
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

                <label for="cars">Nome</label>
                <input type="text" class="borda-preta" value="{{ $produto->nome}}">           

                <label for="cars">Descrição</label>
                <input type="text" class="borda-preta" value="{{ $produto->descricao}}">            

                <label for="cars">Peso</label>
                <input type="text" class="borda-preta" value="{{ $produto->peso}}">             

                <label for="cars">Estoque Minimo</label>
                <input type="text"class="borda-preta" value="{{ $produto->preco_custo}}">              

                <label for="cars">Preço de Venda</label>
                <input type="text"class="borda-preta" value="{{ $produto->preco_venda}}">              

                <label for="cars">Estoque Minimo</label>
                <input type="text"class="borda-preta" value="{{ $produto->estoque_minimo}}">               

                <label for="cars">Estoque Maximo</label>
                <input type="text"class="borda-preta" value="{{ $produto->estoque_maximo}}">              

                <label for="cars">Unidade Medida</label>
                <input type="text" class="borda-preta"value="{{ $produto->unidade_id}}">         
            </div>
        </div>
    </div>

@endsection
