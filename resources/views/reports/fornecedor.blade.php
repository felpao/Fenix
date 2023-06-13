<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Fornecedores</title>
</head>
<body>
    <h1>Relatório de fornecedores</h1>
    <hr>
    <table border="1" cellpadding ='0' cellspacing="0"
        style="width: 100%;  text-align: center" >
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Fone</th>
            <th>E-mail</th>
            <th>Descrição</th>
        </tr>
        @forelse ($fornecedores as $fornecedor)
        <tr>
            <td>{{ $fornecedores->id }}</td>
            <td>{{ $fornecedores->nome }}</td>
            <td>{{ $fornecedores->endereco }}</td>
            <td>{{ $fornecedores->fone }}</td>
            <td>{{ $fornecedores->email }}</td>
            <td>{{ $fornecedores->descricao }}</td>
            <td><img src="{{ $logo }}" alt="">
          <img src="{{ public_path('/uploads/fornecedores/') }}" alt="">
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
