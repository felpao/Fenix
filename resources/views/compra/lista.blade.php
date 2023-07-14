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
                    <table id="myTable" class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nome</th>
                                <th>Data da Compra</th>
                                <th>Unidade Unitaria</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th>Ações</th>
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
                                        'id' => 'form-excluir-' . $compra->id,
                                    ]) !!}
                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                        onclick="confirmarExclusao(event,{{ $compra->id }})">
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
                        {{ $compras->links() }}
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
        var table = $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
            },
            dom: 'frtiBp',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
            columnDefs: [
                {
                    "targets": [3], // índice da coluna que deseja ocultar
                    "visible": false
                }
            ]
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

<!-- Scripts do jQuery, DataTables e Buttons -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
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
