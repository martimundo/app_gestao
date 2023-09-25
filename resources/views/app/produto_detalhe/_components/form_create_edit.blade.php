@if (isset($produto_detalhe_detalhe->id))
    <form action="{{ route('produto.update', ['produto' => $produto_detalhe->id]) }}" method="post">
        
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">           
        @csrf
@endif
<label for="cars">Nome</label>
<input type="text"name="nome"placeholder="Nome do Produto" class="borda-preta"
    value="{{ $produto_detalhe->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<label for="cars">Descrição</label>
<input type="text"name="descricao"placeholder="Uma breve descricao" class="borda-preta"
    value="{{ $produto_detalhe->descricao ?? old('descricao') }}">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

<label for="cars">Peso</label>
<input type="text" name="peso"placeholder="Informe o peso" class="borda-preta"
    value="{{ $produto_detalhe->peso ?? old('peso') }}">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<label for="cars">Preço de Custo</label>
<input type="text"name="preco_custo"placeholder="Preço de Custo" class="borda-preta"
    value="{{ $produto_detalhe->preco_custo ?? old('preco_custo') }}">
{{ $errors->has('preco_custo') ? $errors->first('preco_custo') : '' }}

<label for="cars">Preço de Venda</label>
<input type="text"name="preco_venda"placeholder="Preço de Venda" class="borda-preta"
    value="{{ $produto_detalhe->preco_venda ?? old('preco_venda') }}">
{{ $errors->has('preco_venda') ? $errors->first('preco_venda') : '' }}

<label for="cars">Estoque Minimo</label>
<input type="text"name="estoque_minimo"placeholder="Estoque Minimo" class="borda-preta"
    value="{{ $produto_detalhe->estoque_minimo ?? old('estoque_minimo') }}">
{{ $errors->has('estoque_minimo') ? $errors->first('estoque_minimo') : '' }}

<label for="cars">Estoque Maximo</label>
<input type="text"name="estoque_maximo"placeholder="Estoque Máximo" class="borda-preta"
    value="{{ $produto_detalhe->estoque_maximo ?? old('estoque_maximo') }}">
{{ $errors->has('estoque_maximo') ? $errors->first('estoque_maximo') : '' }}

<label for="cars">Unidade</label>
<select name="unidade_id" id="cars" style="margin-bottom: 30px;">
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"{{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach

</select>
<button type="submit" class="borda-preta" style="margin-bottom: 30px;">Salvar</button>
</form>
