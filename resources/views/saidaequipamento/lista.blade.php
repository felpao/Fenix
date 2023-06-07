@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista da Saida dos Equipamentos
                    <a href="{{ route('saidaequipamento.create') }}" class="btn btn-success btn-sm float-end">
                        Nova Saida
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
                                <th>Data</th>
                                <th>Quantidade</th>
                                <th>Equipamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($saidaequimapentos as $saidaequimapento)
                            <tr>
                                <td> {{ $saidaequimapento->id }}</td>
                                <td>{{ $saidaequimapento->data_pedido }}</td>
                                <td>{{ $saidaequimapento->equipamento->id }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('saidaequipamento.show', $saidaequimapento->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('saidaequipamento.destroy', $saidaequimapento->id),
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
                        {{ $saidaequimapentos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
