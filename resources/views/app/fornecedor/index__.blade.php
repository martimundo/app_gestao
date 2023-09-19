<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="container">
    <h2>Fornecedores</h2>

    {{-- ESTRUTURA DE CONTROLE DE DECIÇÃO COM BLADE IF, ELSEIF E ELSE --}}
        
    @if (count($fornecedores) > 0 && count($fornecedores) < 10)
        <h3>Lista de Fornecedores</h3>
        @foreach ($fornecedores as $fornecedor)
            <ul>
                <li>Razão Social: {{ $fornecedor->nome }}<br> CNPJ:{{$fornecedor->cnpj}}<br> <strong>Tel:{{$fornecedor->telefone}}</strong></li>  
            </ul>
            
        @endforeach
    @elseif(count($fornecedores) > 10)
        <h3>Existem muitos fornecedores cadatrados no sistemas</h3>
    @else
        <h3>Ainda não existe fornecedore cadatrado no sistema.</h3>
    @endif
</body>
</html>


