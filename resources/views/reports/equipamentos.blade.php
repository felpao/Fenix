<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Equipamentos</title>
</head>
<body>
    <h1>Relatório de equipamentos</h1>
    <hr>
    <table border="1" cellpadding ='0' cellspacing="0"
        style="width: 100%;  text-align: center" >
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
        </tr>
        @forelse ($equipamentos as $equipamento)
        <tr>
            <td>{{ $equipamento->id }}</td>
            <td>{{ $equipamento->nome }}</td>
            <td>{{ $equipamento->descricao }}</td>
            <td>{{ $equipamento->quantidade }}</td>

        </td>
        </tr>

        @empty
        <tr>
            <td colspan="3">Nenhum equipamento cadastrado</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
