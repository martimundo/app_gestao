<div class="container">
    <nav aria-label="breadcrumb ml-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}" class="btn btn-primary btn-sm">Retornar</a></li>
        </ol>
    </nav>
    @if (isset($cliente->id))
        <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('cliente.store') }}" method="post">
                @csrf
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="cars">Nome do Cliente</label>
                <input type="text"name="nome"placeholder="Nome do Cliente"
                    class="form-control form-control-sm @error('nome') is-invalid @enderror" id="message"
                    value="{{ $cliente->nome ?? old('nome') }}">
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
