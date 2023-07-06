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
                    <table id="myTable" class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Insumo</th>
                                <th>quantidade</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($saidainsumos as $saidainsumo)
                            <tr>
                                <td> {{ $saidainsumo->id }}</td>
                                <td>{{ $saidainsumo->data_pedido }}</td>
                                <td>{{ $saidainsumo->desc_pedido }}</td>
                                <td>{{ $saidainsumo->quantidade }}</td>
                                <td>{{ $saidainsumo->insumo->nome }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('saidainsumo.show', $saidainsumo->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['saidainsumo.destroy', $saidainsumo->id],
                                        'style' => 'display:inline',
                                        'id' => 'form-excluir-' . $saidainsumo->id,
                                    ]) !!}

                                    <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="confirmarExclusao(event,{{ $saidainsumo->id }})">
                                        Excluir
                                      </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Nenhum registro encontrado.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>

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
