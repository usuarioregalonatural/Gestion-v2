@extends('adminlte::page')


@section('content')


    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Alta de Proveedores</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST">
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert-success">
                        {{session_status()}}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-sm-2 control-label">Dirección:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" placeholder="direccion" name="direccion">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Guardar</button>
                    <button type="submit" class="btn btn-default float-right">Cancelar</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>

@endsection
