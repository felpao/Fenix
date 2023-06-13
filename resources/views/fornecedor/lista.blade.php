@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista dos Fornecedores
                    <a href="{{ route('fornecedor.create') }}" class="btn btn-success btn-sm float-end">
                        Novo Fornecedor
                    </a>
                </div>
                <div class="card-body">
                    @if (Session::has('menssagem_sucesso'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('menssagem_sucesso') }}
                        </div>
                    @endif
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th>Fone</th>
                                <th>Email</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fornecedores as $fornecedor)
                            <tr>
                                <td> {{ $fornecedor->id }}</td>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->endereco }}</td>
                                <td>{{ $fornecedor->fone }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>{{ $fornecedor->descricao }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('fornecedor.show', $fornecedor->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('fornecedor.destroy', $fornecedor->id),
                                    'style' => 'display:inline',
                                    ]) !!}
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">
                                        Excluir
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            @empty

                            <tr>
                                <td colspan="3">Nâo há itens para listar</td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $fornecedores->links() }}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('compras/report') }}" target="_blank"
                     class="btn btn-sm btn-warning">
                        Relatório
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
