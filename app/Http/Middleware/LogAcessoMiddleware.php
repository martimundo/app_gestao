<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        //dd($request);//aqui eu posso pegar os dados que vem do request HTTP

        //para recuperar um atributo do request
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();//para recuperar a rota usamos o metodo getNomeDaREota que esta no atributo requestUri
        LogAcesso::create(['log'=>"O $ip requisotu a rota $rota"]);
        //return $next($request);

       //$resposta = $next($request);
        //$resposta->setstatusCode(201, 'Tudo OK!');
        //dd($resposta);
        
        return Response('Chegamos no middleware e finalizamos no middleware');
    }
}
