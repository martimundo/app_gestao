<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>App-Gestão - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('/assets/style/app.css') }}">
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <meta charset="utf-8">
</head>

<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo'){{--aqui eu chamo o meu conteudo criado dentro da seção. --}}
    @include('site.layouts._partials.rodape')
</body>

</html>
