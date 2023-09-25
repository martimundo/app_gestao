@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-basico">
        
        <div class="titulo-pagina">
            <h3>Listagem de Produtos</h3>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Cadastrar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('produto.create') }}">Novo Produto</a></li>
                      <li><a class="dropdown-item" href="#">Detalhes do Produto</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('app.fornecedor')}}">Fornecedores</a></li>
                      <li><a class="dropdown-item" href="{{ route('app.cliente') }}">Clientes</a></li>
                    </ul>
                  </li>                  
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
        <div class="menu">
            
        </div>
    </div>
    <div class="container mt-3">
        <table class="table table-striped table-hover table-bordered table-responsive mb-5">
            <thead>
                <tr>
                    <th>Cód. Prod.</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Peso</th>
                    <th>Preço de Custo</th>
                    <th>Unidade</th>
                    <th>Prelo de Venda</th>
                    <th>Estoque Min.</th>
                    <th>Estoque Max.</th>
                    <th>Criado em:</th>
                    <th>Ações</th>
                    <th>Ações</th>
                    <th>Ações</th>
    
                </tr>
            </thead>
            <tbody class="mb-5">
    
                @if (count($produtos) > 0 && count($produtos) < 10)
                    @foreach ($produtos as $produto)
                        <tr>
                            <th># {{ $produto->id }}</th>
                            <th> {{ $produto->nome }}</th>
                            <th> {{ $produto->descricao }}</th>
                            <th> {{ $produto->peso }}</th>
                            <th> {{ $produto->preco_custo }}</th>
                            <th> {{ $produto->unidade_id }}</th>
                            <th> {{ $produto->preco_venda }}</th>
                            <th> {{ $produto->estoque_minimo }}</th>
                            <th> {{ $produto->estoque_maximo }}</th>
                            <th> {{ $produto->created_at }}</th>
                            <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}" class="btn btn-primary">Detalhes</th>
                            <th>
                                <a href="{{ route('produto.edit', ['produto' => $produto->id]) }} "class="btn btn-info">Editar
                            </th>
    
                            <th>
                                <form action="{{route('produto.destroy',['produto'=>$produto->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" >Excluir</button>
                                </form>
                           </th>
                        </tr>
                    @endforeach
                @elseif(count($produtos) > 10)
                    <h4>Produtos cadastrados</h4>
                @else
                    <h4>Você não tem produtos cadastrados</h4>
                @endif
            </tbody>
    
            {{ $produtos->appends($request)->links() }}
            Total de Registros por pagina: <strong>{{ $produtos->count() }}</strong><br>
            Total de Registros: <strong>{{ $produtos->total() }}</strong>
        </table>
    </div>    
    


@endsection
