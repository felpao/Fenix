@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista das Descrições
                    <a href="{{ route('desccompras.create') }}" class="btn btn-success btn-sm float-end">
                        Nova Descrição
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
                                <th>Descrição do Pedido</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($desccompras as $desccompras)
                            <tr>
                                <td> {{ $desccompras->id }}</td>
                                <td>{{ $desccompras->desc_ped }}</td>
                                <td>{{ $desccompras->$compra->id }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('desccompras.show', $desccompras->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('desccompras.destroy', $desccompras->id),
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
                        {{ $desccompras->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
