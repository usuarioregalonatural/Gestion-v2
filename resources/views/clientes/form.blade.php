@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if (isset( $Client->id))
                            Editando el Cliente: {!! $Client->nombre !!}
                        @else
                            Nuevo Cliente
                        @endif
                    </div>

                    <div class="panel-body">
                        @if (isset( $Client->id))
                            {!! Form::open(['route' => ['clientes.update', $Client], 'method' => 'PUT']) !!}
                        @else
                            {!! Form::open(['route' => 'clientes.store', 'method' => 'POST']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre del Cliente'); !!}
                            {!! Form::text('nombre', @$Client->nombre,['class' => 'form-control', 'required']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('identificacion', 'RUC o Cedula'); !!}
                            {!! Form::text('identificacion', @$Client->identificacion,['class' => 'form-control']);; !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección'); !!}
                            {!! Form::text('direccion', @$Client->direccion,['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telefono', 'Teléfono'); !!}
                            {!! Form::text('telefono', @$Client->telefono,['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('movil', 'Movil'); !!}
                            {!! Form::text('movil', @$Client->movil,['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'E-mail'); !!}
                            {!! Form::text('email', @$Client->email,['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('web', 'Página Web'); !!}
                            {!! Form::text('web', @$Client->web,['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            @if (isset( $Client->id))
                                {!! Form::submit('Editar Cliente',['class' => 'btn btn-warning']); !!}
                            @else
                                {!! Form::submit('Crear Cliente',['class' => 'btn btn-warning']); !!}
                            @endif
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection