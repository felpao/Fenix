@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados da Compra
                        <a href="{{ route('compra.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Compras
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
                        @if (Route::is('compra.show'))
                            {!! Form::model($compra, ['method' => 'PATCH', 'url' => route('compra.update', $compra->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('compra.store')]) !!}
                        @endif
                        {!! Form::label('nome', 'Nome') !!}
                        {!! Form::input('text', 'nome', null, [
                            'class' => 'form-control
                                                                    mb-3',
                            'placeholder' => 'Nome',
                            'required',
                            'maxlenght' => 50,
                            'autofocus',
                        ]) !!}
                        {!! Form::label('data_compra', 'Data da Compra') !!}
                        {!! Form::input('date', 'data_compra', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Data da Compra',
                            'required',
                        ]) !!}
                        {!! Form::label('uni_unitaria', 'Unidade Unitaria') !!}
                        {!! Form::input('text', 'uni_unitaria', null, [
                            'class' => 'form-control
                                                                                            mb-3',
                            'placeholder' => 'Unidade Unitaria',
                            'required',
                        ]) !!}
                        {!! Form::label('quantidade', 'Quantidade') !!}
                        {!! Form::input('text', 'quantidade', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Quantidade',
                            'required',
                        ]) !!}
                        {!! Form::label('valor', 'Valor') !!}
                        {!! Form::input('text', 'valor', null, ['class' => 'form-control', 'placeholder' => 'Valor', 'required']) !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection