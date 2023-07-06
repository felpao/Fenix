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
                    <table id="myTable" class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Data</th>
                                <th>Equipamento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($saidaequimapentos as $saidaequimapento)
                            <tr>
                                <td> {{ $saidaequimapento->id }}</td>
                                <td>{{ $saidaequimapento->data_pedido }}</td>
                                <td>{{ $saidaequimapento->equipamento->nome }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('saidaequipamento.show', $saidaequimapento->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => route('saidaequipamento.destroy', $saidaequimapento->id),
                                        'style' => 'display:inline',
                                        'id' => 'form-excluir-' . $saidaequimapento->id,
                                    ]) !!}
                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                        onclick="confirmarExclusao(event,{{ $saidaequimapento->id }})">
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
                        {{ $saidaequimapentos->links() }}
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
