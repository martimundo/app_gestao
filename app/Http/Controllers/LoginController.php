<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if($request->get('erro') == 1){
            $erro = "Usuário e ou Senha não existem";
        }

        if($request->get('erro') == 2){
            $erro = "Para acessar essa área é necessário logar no sistema.";
        }

        return view('site.login', ['titulo' => 'Login', 'erro'=>$erro]);
    }

    public function autenticar(Request $request)
    {

        //regras de validação de dados recebidos pelo formulário de login
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório.',
            'senha.required' => 'A senha é obrigatória.'
        ];

        //validando as regras com o validate
        $request->validate($regras, $feedback);

        //aqui é recuperado os parametros do formulário de login
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //instanciar o Model User.
        $user = new User();

        //verificação no BD se existe o usuário essa consulta retorna um querybuilder
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()->first();

        if (isset($usuario->name)) {

            session_start();
            $_SESSION['nome']= $usuario->name;
            $_SESSION['email']= $usuario->email;

            //dd($_SESSION);

           return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }
    }

    public function logout(){

        session_destroy();
        return redirect()->route('site.login');
    }
}
