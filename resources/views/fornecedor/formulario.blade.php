@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados dos Fornecedores
                        <a href="{{ route('fornecedor.index') }}" class="btn btn-success btn-sm float-end">
                            Lista Fornecedores
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
                        @if(Route::is('fornecedores.show'))
                        {!! Form::model($fornecedor,
                                        ['method'=>'PATCH',
                                        'files'=>'True',
                                        'url'=>'fornecedores/'.$fornecedor->id]) !!}
                        <div class="text-center">
                            <img
                            src="{{ url('/') }}/uploads/fornecedores/{{ $fornecedor->icone }}"
                            alt="{{ $fornecedor->titulo }}"
                            title="{{ $fornecedor->titulo }}"
                            class="img-thumbnail"
                            width="150"/>
                        </div>
                    @else
                    {!! Form::open(['method'=>'POST','files'=>'True', 'url'=>'fornecedor']) !!}
                    @endif
                    {!! Form::open(['method'=>'POST', 'url'=>'fornecedor']) !!}
                        {!! Form::label('titulo', 'Titulo') !!}
                        {!! Form::input('text', 'titulo', null, ['class'=>'form-control','placeholder'=>'titulo', 'required', 'maxlenght'=>50, 'autofocus']) !!}
                        {!! Form::label('icone', 'Icone') !!}
                        {!! Form::file('icone',
                        ['class'=>'form-control  btn-sm']) !!}


                        @if (Route::is('fornecedor.show'))
                            {!! Form::model($fornecedor, ['method' => 'PATCH', 'url' => route('fornecedor.update', $fornecedor->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('fornecedor.store')]) !!}
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
                        {!! Form::label('endereco', 'Endereço') !!}
                        {!! Form::input('text', 'endereco', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Endereço',
                            'required',
                        ]) !!}
                        {!! Form::label('fone', 'Fone') !!}
                        {!! Form::input('text', 'fone', null, [
                            'class' => 'form-control
                                                                                            mb-3',
                            'placeholder' => 'fone',
                            'required',
                        ]) !!}
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::input('email', 'email', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Email',
                            'required',
                        ]) !!}
                        {!! Form::label('descricao', 'descricao') !!}
                        {!! Form::input('text', 'descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição', 'required']) !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
