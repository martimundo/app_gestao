<?php

namespace App\Http\Middleware;

use Closure;
use Dotenv\Repository\RepositoryInterface;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_padrao, $perfil)
    {
        /*echo $metodo_padrao. '-'. $perfil;
        if($metodo_padrao == 'padrao'){
            echo "Verificar acesso via bd com usuário e senha. $perfil<br>";
        };

        if($metodo_padrao == 'ldap'){
            echo "Verificar senha no AD DS. $perfil<br>";
        };

        if($perfil == 'visitante'){
            echo "Exibir apenas alguns recursos";
        }

        //verifica se tem acesso alguma rota...
        if (false) {
            return $next($request);
        } else {

            return Response('VOCÊ NÃO LOGOU NO SISTEMA PARA ACESSAR ESSA ÁREA');
        }*/

        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro'=>2]);
        }

    }
}
