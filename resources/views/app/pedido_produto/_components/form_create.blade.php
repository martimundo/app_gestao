<div class="container">
    <nav aria-label="breadcrumb ml-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('pedido.index') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                    Retornar
                </a>
            </li>
        </ol>
    </nav>
    <form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="cars">Escolho os produtos</label>
                    <select name="produto_id" id="cars"
                        class="form-select @error('cliente_id') is-invalid @enderror" id="message">
                        <option>-- Selecione os Produtos --</option>
                        @foreach ($produtos as $produto)
                            <option
                                value="{{ $produto->id }}"{{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                                {{ $produto->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('produto_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="">Qtde</label>
                    <input 
                        type="number" 
                        name="quantidade"
                        class="form-control form-control-sm @error('quantidade') is-invalid @enderror" id="message"
                        value="{{ old('quantidade') ? old('quantidade') : ''}}">
                    @error('quantidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success mt-3"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    <i class="fa-regular fa-floppy-disk"></i> Salvar
                </button>
            </div>
    </form>
</div>
