@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista das saidas dos insumos
                    <a href="{{ route('saidainsumo.create') }}" class="btn btn-success btn-sm float-end">
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
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Insumo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($saidainsumos as $saidainsumo)
                            <tr>
                                <td> {{ $saidainsumo->id }}</td>
                                <td>{{ $saidainsumo->data_pedido }}</td>
                                <td>{{ $saidainsumo->desc_ped }}</td>
                                <td>{{ $saidainsumo->insumo->id }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('saidainsumo.show', $saidainsumo->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('saidainsumo.destroy', $saidainsumo->id),
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
                        {{ $saidainsumos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
