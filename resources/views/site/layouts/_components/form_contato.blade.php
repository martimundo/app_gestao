{{ $slot }}
{{ $classe }}
<form action="{{ route('salvar.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome" class="{{ $classe }}" name="nome" value="{{ old('nome') }}">
    @if ($errors->has('nome')) {{ $errors->first('nome') }}@endif
    <br>
    <input type="text" placeholder="Telefone" class="{{ $classe }}" name="telefone" value="{{ old('telefone') }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input type="text" placeholder="E-mail" class="{{ $classe }}" name="email" value="{{ old('email') }}">
    @if ($errors->has('email')) {{ $errors->first('email') }} @endif
    <br>

    <select class="{{ $classe }}" name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id')) {{ $errors->first('motivo_contatos_id') }}@endif
    <br>
    <textarea class="{{ $classe }}" name="mensagem" placeholder="Preencha aqui a sua mensagem"> {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
       {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{--}}
@if ($errors->any())
    <div
        style="position:absolute; top:0px; left:0px; width:100%; background-color:brown; text-align:center; color:white">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach
    </div>
@endif
{{--}}
