<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Compras</title>
</head>
<body>
    <h1>Relatório de compras</h1>
    <hr>
    <table border="1" cellpadding ='0' cellspacing="0"
        style="width: 100%;  text-align: center" >
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data</th>
            <th>Unidade Unitaria</th>
            <th>Quantidade</th>
            <th>Valor</th>
        </tr>
        @forelse ($compras as $compra)
        <tr>
            <td>{{ $compras->id }}</td>
            <td>{{ $compras->nome }}</td>
            <td>{{ $compras->data_compra }}</td>
            <td>{{ $compras->uni_unitaria }}</td>
            <td>{{ $compras->quantidade }}</td>
            <td>{{ $compras->valor }}</td>
            <td><img src="{{ $logo }}" alt="">
          <img src="{{ public_path('/uploads/compras/') }}" alt="">
        </td>
        </tr>

        @empty
        <tr>
            <td colspan="3">Nenhum tipo cadastrado</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
