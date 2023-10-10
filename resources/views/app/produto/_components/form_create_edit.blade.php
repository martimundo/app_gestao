<div class="container">
    <nav aria-label="breadcrumb ml-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produto.index') }}">Voltar</a></li>

        </ol>
    </nav>
    @if (isset($produto->id))
        <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('produto.store') }}" method="post">
                @csrf
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="cars">Nome</label>
                <input type="text"name="nome"placeholder="Nome do Produto"
                    class="form-control form-control-sm @error('nome') is-invalid @enderror" id="message"
                    value="{{ $produto->nome ?? old('nome') }}">
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <label for="cars">Fornecedor</label>
            <select name="fornecedor_id" id="cars" class="form-select @error('fornecedor_id') is-invalid @enderror" id="message">
                <option>-- Selecione um Fornecedor --</option>
                @foreach ($fornecedores as $fornecedor)
                    <option
                        value="{{ $fornecedor->id }}"{{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>
                        {{ $fornecedor->nome }}</option>
                @endforeach
            </select>
            @error('fornecedor_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="cars">Preço de Custo</label>
            <input type="text"name="preco_custo"placeholder="Preço de Custo"
                class="form-control form-control-sm @error('preco_custo') is-invalid @enderror" id="message"
                value="{{ $produto->preco_custo ?? old('preco_custo') }}">
            @error('preco_custo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-3">
            <label for="cars">Preço de Venda</label>
            <input type="text"name="preco_venda"placeholder="Preço de Venda"
                class="form-control form-control-sm @error('preco_venda') is-invalid @enderror" id="message"
                value="{{ $produto->preco_venda ?? old('preco_venda') }}">
            @error('preco_venda')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-3">
            <label for="cars">Peso</label>
            <input type="text" name="peso"placeholder="Informe o peso"
                class="form-control form-control-sm @error('preco_venda') is-invalid @enderror" id="message"
                value="{{ $produto->peso ?? old('peso') }}">
            @error('peso')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>
    <div class="row">
        <div class="col-3">
            <label for="cars">Estoque Minimo</label>
            <input type="text"name="estoque_minimo"placeholder="Estoque Minimo"
                class="form-control form-control-sm @error('estoque_minimo') is-invalid @enderror" id="message"
                value="{{ $produto->estoque_minimo ?? old('estoque_minimo') }}">
            @error('estoque_minimo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="col-3">
            <label for="cars">Estoque Máximo</label>
            <input type="text"name="estoque_maximo"placeholder="Estoque Máximo"
                class="form-control form-control-sm @error('estoque_maximo') is-invalid @enderror" id="message"
                value="{{ $produto->estoque_maximo ?? old('estoque_maximo') }}">
            @error('estoque_maximo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-3">
            <label for="cars">Unidade</label>
            <select name="unidade_id" id="cars" class="form-select @error('unidade_id') is-invalid @enderror" id="message" >
                <option>-- Selecione a Unidade de Medida --</option>
                @foreach ($unidades as $unidade)
                    <option
                        value="{{ $unidade->id }}"{{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                        {{ $unidade->descricao }}
                    </option>
                @endforeach
            </select>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="message">Descrição do Produto</label>
        <textarea style="height: 10rem;" class="form-control @error('descricao') is-invalid @enderror" id="message"
            type="text" name="descricao" placeholder="Uma breve descricao">{{ $produto->descricao ?? old('descricao') }}</textarea>
        @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-outline-primary mt-3" style="margin-bottom: 30px;">Salvar</button>
    </form>
</div>
