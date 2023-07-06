@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados da Saída dos Insumos
                        <a href="{{ route('saidainsumo.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Saída dos Insumos\
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
                        @if (Route::is('saidainsumo.show'))
                            {!! Form::model($saidainsumo, ['method' => 'PATCH', 'url' => route('saidainsumo.update', $saidainsumo->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('saidainsumo.store')]) !!}
                        @endif
                        {!! Form::label('quantidade', 'Quantidade') !!}
                        {!! Form::input('number', 'quantidade', null, ['class' => 'form-control', 'placeholder' => 'Quantidade', 'required']) !!}
                        {!! Form::label('desc_pedido', 'Descrição do Pedido') !!}
                        {!! Form::input('text', 'desc_pedido', null, [
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Descrição do Pedido',
                            'required',
                            'maxlenght' => 50,
                        ]) !!}
                        {!! Form::label('data_pedido', 'Data Pedido') !!}
                        {!! Form::input('date', 'data_pedido', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Data do Pedido',
                            'required',
                        ]) !!}
                        {!! Form::label('insumo_id', 'Insumos') !!}
                        {!! Form::select('insumo_id', $insumos, null, [
                            'class' => 'form-control',
                            'placeholder' => 'Selecione um
                                                insumo',
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
