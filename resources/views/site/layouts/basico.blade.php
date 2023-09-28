<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> @yield('title', 'App Super Gestão')</title>    
    <link rel="stylesheet" href="{{ asset('/assets/css/estilo_basico.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
</head>

<body >
    @include('site.layouts._partials.topo')
    
    @yield('conteudo'){{-- aqui eu chamo o meu conteudo criado dentro da seção. --}}
    @include('site.layouts._partials.rodape')
</body>

</html>
