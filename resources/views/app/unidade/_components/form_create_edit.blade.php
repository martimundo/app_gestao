<div class="container">
    <nav aria-label="breadcrumb ml-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('unidade.index') }}" class="btn btn-primary btn-sm">Retornar</a></li>
        </ol>
    </nav>
    @if (isset($unidade->id))
        <form action="{{ route('unidade.update', ['unidade' => $unidade->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('unidade.store') }}" method="post">
                @csrf
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="cars">Descrição da unidade</label>
                <input type="text"name="descricao"placeholder="Descrição"
                    class="form-control form-control-sm @error('descricao') is-invalid @enderror" id="message"
                    value="{{ $unidade->descricao ?? old('descricao') }}">
                @error('descricao')
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
