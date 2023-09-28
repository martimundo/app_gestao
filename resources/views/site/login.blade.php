@extends('site.layouts.basico')
@section('titulo', $titulo)

@section('conteudo') 
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form action="{{ route('site.login') }}" method="post">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control sm" id="inputEmail" type="email" placeholder="name@example.com" name="usuario" value="{{old('name')}}" />
                                            <label for="inputEmail">Email address</label>
                                            {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="senha" type="password" placeholder="Password" value="{{old('senha')}}"/>
                                            <label for="inputPassword">Password</label>
                                            {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                                        </div>                                        
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Esqueceu a Senha?</a>
                                            <button type="submit" class="btn btn-primary">Acessar</button>                                            
                                        </div>
                                    </form>
                                    <div style="color: red">
                                        {{ isset($erro) && $erro != '' ? $erro : '' }}                  
                                    </div>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="#">Primeiro Acesso</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>        
    </div>
@endsection
