<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Produtos:</h1>
    <table>
        @if ($produtosList->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>qtd_estoque</th>
                        <th>preco</th>
                        <th>Importado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtosList as $produto)
                        <tr>
                            <td>
                                <a href="/produtos/{{ $produto->id }}">
                                    {{ $produto->id }}
                                </a>
                            </td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->qtd_estoque }}</td>
                            <td>{{ $produto->preco }}</td>
                            <td>{{ $produto->importado ? 'Sim' : 'Não' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Produtos não encontrados! </p>
        @endif
        </ul>
</body>

</html>
