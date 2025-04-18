<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Users:</h1>
    <table>
        @if ($listUsers->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listUsers as $user)
                        <tr>
                            <td>
                               <a href="/users/{{$user->id}}"> {{ $user->id }}</a>
                            </td>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Produtos não encontrados! </p>
        @endif
</body>
</html>
