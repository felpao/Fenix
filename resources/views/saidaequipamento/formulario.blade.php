@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados da Saida de Equipamento
                        <a href="{{ route('saidaequipamento.index') }}" class="btn btn-success btn-sm float-end">
                            Listar saidas de Equipamentos

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
                        @if (Route::is('saidaequipamento.show'))
                            {!! Form::model($saidaequimapento, ['method' => 'PATCH', 'url' => route('saidaequipamento.update', $saidaequimapento->id)]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'url' => route('saidaequipamento.store')]) !!}
                        @endif
                        {!! Form::label('data_pedido', 'Data do Pedido') !!}
                        {!! Form::input('date', 'data_pedido', null, [
                            'class' => 'form-control
                                                                    mb-3',
                            'placeholder' => 'Data do Pedido',
                            'required']) !!}
                        {!! Form::label('quantidade', 'Quantidade') !!}
                        {!! Form::input('text', 'qunatidade', null, ['class' => 'form-control', 'placeholder' => 'Quantidade', 'required']) !!}
                        {!! Form::label('equipamento_id','Equipamento') !!}
                        {!!
                        Form::select('equipamento_id',$equipamentos,null,['class' => 'form-control','placeholder'=>'Selecione um
                        Equipamento','required'])
                        !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
