@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados da Descrição das Compras
                        <a href="{{ route('desccompras.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Descrição das Compras
                        </a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('menssagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('menssagem_sucesso') }}
                            </div>
                        @endif
                        @if (Session::has('menssagem_erro'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('menssagem_erro') }}
                            </div>
                        @endif
                        @if (Route::is('desccompras.show'))
                            {!! Form::model($desccompras, ['method' => 'PATCH', 'url' => route('desccompras.update', $desccompras->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('desccompras.store')]) !!}
                        @endif
                        {!! Form::label('desc_ped', 'DescPed') !!}
                        {!! Form::input('text', 'nome', null, [
                            'class' => 'form-control
                                                                                            mb-3',
                            'placeholder' => 'Descrição do Pedido',
                            'required',
                        ]) !!}
                        {!! Form::label('compra_id', 'Compras') !!}
                        {!! Form::select('compra_id', $compra, null, [
                            'class' => 'form-control',
                            'placeholder' => 'Selecione uma
                                                 Compra',
                            'required',
                        ]) !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
