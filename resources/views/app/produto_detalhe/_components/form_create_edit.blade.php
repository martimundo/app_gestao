@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto' => $produto_detalhe->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
            @csrf
@endif
<label for="cars">Produto ID</label>
<input type="text"name="produto_id" placeholder="Produto ID" class="borda-preta"
    value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<label for="cars">Comprimento</label>
<input type="text"name="comprimento" placeholder="Comprimento do Produto" class="borda-preta"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<label for="cars">Altura</label>
<input type="text" name="altura" placeholder="Informe a Altura do Produto" class="borda-preta"
    value="{{ $produto_detalhe->altura ?? old('altura') }}">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<label for="cars">Largura</label>
<input type="text"name="largura"placeholder="Largura do Produto" class="borda-preta"
    value="{{ $produto_detalhe->largura ?? old('largura') }}">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<label for="cars">Unidade</label>
<select name="unidade_id" id="cars" style="margin-bottom: 30px;">
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"{{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach

</select>
<button type="submit" class="borda-preta" style="margin-bottom: 30px;">Salvar</button>
</form>
