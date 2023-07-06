@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Insumo
                        <a href="{{ route('insumo.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Insumos
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
                        @if (Route::is('insumo.show'))
                            {!! Form::model($insumo, ['method' => 'PATCH', 'url' => route('insumo.update', $insumo->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('insumo.store')]) !!}
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
                        {!! Form::label('descricao', 'Descricao') !!}
                        {!! Form::input('text', 'descricao', null, ['class' => 'form-control', 'placeholder' => 'Descricao', 'required']) !!}

                        {!! Form::label('unidade', 'Unidade:') !!}
                        {!! Form::select('uni_unitaria', ['kilo' => 'KG','tonelada' => 'TO', 'litro' => 'LT', 'metro' => 'M',  'unidade' => 'UN', 'pacote' =>'PT', 'maquina' => 'MQ', 'mquadrado' => 'M2', 'mcubico' => 'M3'], null, ['class' => 'form-control', 'placeholder' => 'Selecione uma unidade unitaria', 'required']) !!}
                        {!! Form::label('quantidade', 'Quantidade') !!}
                        {!! Form::input('text', 'quantidade', null, ['class' => 'form-control', 'placeholder' => 'Quantidade', 'required']) !!}
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
