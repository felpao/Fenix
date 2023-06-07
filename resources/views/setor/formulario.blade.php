@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Setor
                        <a href="{{ route('setor.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Setores
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
                        @if (Route::is('setor.show'))
                            {!! Form::model($setor, ['method' => 'PATCH', 'url' => route('setor.update', $setor->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('setor.store')]) !!}
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
                        {!! Form::label('encarregado', 'Encarregado') !!}
                        {!! Form::input('text', 'encarregado', null, ['class' => 'form-control', 'placeholder' => 'Encarregado', 'required']) !!}
                        {!! Form::label('fone', 'Fone') !!}
                        {!! Form::input('text', 'fone', null, ['class' => 'form-control', 'placeholder' => 'Fone', 'required']) !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
