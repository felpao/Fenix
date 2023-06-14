@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista das Compras
                    <a href="{{ route('compra.create') }}" class="btn btn-success btn-sm float-end">
                        Nova Compra
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
                                <th>id</th>
                                <th>Nome</th>
                                <th>Data da Compra</th>
                                <th>Unidade Unitaria</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($compras as $compra)
                            <tr>
                                <td> {{ $compra->id }}</td>
                                <td>{{ $compra->nome }}</td>
                                <td>{{ $compra->data_compra }}</td>
                                <td>{{ $compra->uni_unitaria }}</td>
                                <td>{{ $compra->quantidade }}</td>
                                <td>{{ $compra->valor }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('compra.show', $compra->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('compra.destroy', $compra->id),
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
                        {{ $compras->links() }}
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
</div>
@endsection
