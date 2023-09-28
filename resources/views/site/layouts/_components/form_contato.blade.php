    <form id="contactForm" action="{{ route('salvar.contato') }}" method="post" class="mb-5 form-group">
        @csrf
        <!-- Name input -->
        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" placeholder="Informe seu Nome" name="nome"
                value="{{ old('nome') }}" />
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror  
        </div>
        <!-- Telefone -->
        <div class="mb-3">
            <label class="form-label" for="telefone">Telefone</label>
            <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text" placeholder="Telefone" name="telefone"
                value="{{ old('telefone') }}" />
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>


        <div class="mb-3">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-control @error('telefone') is-invalid @enderror" id="email" type="email" placeholder="Informe seu e-mail" name="email"
                value="{{ old('email') }}" />
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="form-floating">
            <select class="form-select @error('telefone') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example"
                name="motivo_contatos_id">
                <option selected>Qual o motivo do Contato?</option>
                @foreach ($motivo_contatos as $motivo_contato)
                    <option value="{{ $motivo_contato->id }}"
                        {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                        {{ $motivo_contato->motivo_contato }}</option>
                @endforeach
            </select>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
            <label for="floatingSelect">Escola uma opção</label>
        </div>
        <!-- Message input -->
        <div class="mb-3">
            <label class="form-label" for="message">Informe sua Message</label>
            <textarea style="height: 10rem;" class="form-control @error('telefone') is-invalid @enderror" id="message" type="text" name="mensagem"
                placeholder="Preencha aqui a sua mensagem"> {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <!-- Form submit button -->
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>

    </form>
