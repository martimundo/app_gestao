@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-basico">
        <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.fornecedor.create') }}">Novo</a>
                    <a href="{{ route('app.fornecedor') }}">Pesquisar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.listar') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="formName" class="form-label">Procurar pelo Nome</label>
                        <input name="nome" type="text" class="form-control" id="formName" placeholder="Nome do Fornecedor">
                    </div>
                    <div class="mb-3">
                        <label for="formCNPJ" class="form-label">Procurar pelo CNPJ</label>
                        <input name="cnpj" type="text" class="form-control" id="formCNPJ"
                            placeholder="CNPJ">
                    </div>
                    <div class="mb-3">
                        <label for="formSite" class="form-label">Procurar pelo Site</label>
                        <input name="site" type="text" class="form-control" id="formSite"
                            placeholder="Endereço web do Fornecedor">
                    </div>
                    <div class="mb-3">
                        <label for="formUF" class="form-label">Pelo pelo UF do Fornecedor</label>
                        <input name="uf" type="text" class="form-control" id="formUF"
                            placeholder="UF do Fornecedor">
                    </div>
                    <div class="mb-3">
                        <label for="formEmail" class="form-label">Procurar pelo Email</label>
                        <input name="email" type="text" class="form-control" id="formEmail"
                            placeholder="fornecedor@email.com.br">
                    </div>                    
                    <button type="submit" class="btn btn-primary">Pesquisar</button>

                </form>
            </div>
        </div>
    </div>


@endsection
