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
                        @if (Route::is('compras.show'))
                            {!! Form::model($compra, ['method' => 'PATCH', 'files' => 'True', 'url' => 'compras/' . $compra->id]) !!}
                            <div class="text-center">
                                <img src="{{ url('/') }}/uploads/compras/{{ $compra->icone }}"
                                    alt="{{ $compra->titulo }}" title="{{ $compra->titulo }}" class="img-thumbnail"
                                    width="150" />
                            </div>
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'compra']) !!}
                        @endif
                        {!! Form::open(['method' => 'POST', 'url' => 'compra']) !!}
                        {!! Form::label('titulo', 'Titulo') !!}
                        {!! Form::input('text', 'titulo', null, [
                            'class' => 'form-control',
                            'placeholder' => 'titulo',
                            'required',
                            'maxlenght' => 50,
                            'autofocus',
                        ]) !!}
                        {!! Form::label('icone', 'Icone') !!}
                        {!! Form::file('icone', ['class' => 'form-control  btn-sm']) !!}

                        @if (Route::is('compra.show'))
                            {!! Form::model($compra, ['method' => 'POST', 'url' => route('compra.update', $compra->id)]) !!}
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


                        {!! Form::label('uni_unitaria', 'Unidade:') !!}
                        {!! Form::select(
                            'uni_unitaria',
                            [
                                'kilo' => 'KG',
                                'tonelada' => 'TO',
                                'litro' => 'LT',
                                'metro' => 'M',
                                'unidade' => 'UN',
                                'pacote' => 'PT',
                                'maquina' => 'MQ',
                                'mquadrado' => 'M2',
                                'mcubico' => 'M3',
                            ],
                            null,
                            ['class' => 'form-control', 'placeholder' => 'Selecione uma unidade unitaria', 'required'],
                        ) !!}

                        {!! Form::label('quantidade', 'Quantidade') !!}
                        {!! Form::input('number', 'quantidade', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Quantidade',
                            'required',
                        ]) !!}
                        {!! Form::label('valor', 'Valor') !!}
                        {!! Form::input('number', 'valor', null, ['class' => 'form-control', 'placeholder' => 'Valor', 'required']) !!}

                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
