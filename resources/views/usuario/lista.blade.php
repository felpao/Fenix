@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista dos Usuarios
                        <a href="{{ route('usuario.create') }}" class="btn btn-success btn-sm float-end">
                            Novo Usuario
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
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($usuarios as $usuario)
                                    <tr>
                                        <td> {{ $usuario->id }}</td>
                                        <td>{{ $usuario->nome }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('usuario.show', $usuario->id) }}"
                                                class="btn btn-primary btn-sm mx-1">
                                                Editar
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => route('usuario.destroy', $usuario->id),
                                                'style' => 'display:inline',
                                                'id' => 'form-excluir-' . $usuario->id,
                                              ]) !!}
                                            <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                onclick="confirmarExclusao(event,{{ $usuario->id }})">
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
                            {{ $usuarios->links() }}
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
