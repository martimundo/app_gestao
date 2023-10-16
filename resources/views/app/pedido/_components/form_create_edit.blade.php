<div class="container">
    <nav aria-label="breadcrumb ml-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pedido.index') }}" class="btn btn-primary btn-sm">Retornar</a></li>
        </ol>
    </nav>
    @if (isset($pedido->id))
        <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('pedido.store') }}" method="post">
                @csrf
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="cars">Nome do Cliente</label>
                <select name="cliente_id" id="cars" class="form-select @error('cliente_id') is-invalid @enderror" id="message" >
                    <option>-- Selecione o Cliente --</option>
                    @foreach ($clientes as $cliente)
                        <option
                            value="{{ $cliente->id }}"{{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>                
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-success mt-3" style="margin-bottom: 100px;">Salvar</button>
        </div>       
        </form>
    </div>
