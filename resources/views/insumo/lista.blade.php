@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista dos Insumos
                        <a href="{{ route('insumo.create') }}" class="btn btn-success btn-sm float-end">
                            Novo Insumo
                        </a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('menssagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('menssagem_sucesso') }}
                            </div>
                        @endif

                        <table id="myTable" class="table table-sm table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Unidade Unitaria</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($insumos as $insumo)
                                    <tr>
                                        <td> {{ $insumo->id }}</td>
                                        <td>{{ $insumo->nome }}</td>
                                        <td>{{ $insumo->descricao }}</td>
                                        <td>{{ $insumo->uni_unitaria }}</td>
                                        <td>{{ $insumo->quantidade }}</td>
                                        <td>{{ $insumo->valor }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('insumo.show', $insumo->id) }}"
                                                class="btn btn-primary btn-sm mx-1">
                                                Editar
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => route('insumo.destroy', $insumo->id),
                                                'style' => 'display:inline',
                                                'id' => 'form-excluir-' . $insumo->id,
                                            ]) !!}
                                            <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                onclick="confirmarExclusao(event,{{ $insumo->id }})">
                                                Excluir
                                            </button>
                                            <!-- botão-->
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
                            {{ $insumos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                }
            });
        });
    </script>
    <script>
        function confirmarExclusao(event, id) {
          event.preventDefault();

          Swal.fire({
            title: 'Tem certeza que deseja excluir?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, exclua!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById('form-excluir-' + id).submit();
            }
          })
        }
            </script>
@endsection
