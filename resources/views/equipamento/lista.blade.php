@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista dos Equipamentos
                    <a href="{{ route('equipamento.create') }}" class="btn btn-success btn-sm float-end">
                        Novo Equipamento
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
                                <th>Descrição</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($equipamentos as $equipamento)
                            <tr>
                                <td> {{ $equipamento->id }}</td>
                                <td>{{ $equipamento->nome }}</td>
                                <td>{{ $equipamento->email }}</td>
                                <td>{{ $equipamento->fone }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('equipamento.show', $equipamento->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('equipamento.destroy', $equipamento->id),
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
                        {{ $equipamentos->links() }}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('equipamentos/report') }}" target="_blank"
                     class="btn btn-sm btn-warning">
                        Relatório
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
