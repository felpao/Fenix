@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Equipamento
                        <a href="{{ route('equipamento.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Equipamentos
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
                        @if (Route::is('equipamento.show'))
                            {!! Form::model($equipamento, ['method' => 'PATCH', 'url' => route('equipamento.update', $equipamento->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('equipamento.store')]) !!}
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
                        {!! Form::label('descricao', 'Descrição') !!}
                        {!! Form::input('text', 'descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição', 'required']) !!}
                        {!! Form::label('quantidade', 'Quantidade') !!}
                        {!! Form::input('text', 'quantidade', null, ['class' => 'form-control', 'placeholder' => 'Quantidade', 'required']) !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
