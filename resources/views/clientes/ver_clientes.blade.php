@extends('adminlte::page')


@section('content')
    <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Alta de Cliente</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="http://localhost/Proyectos/Gestion-v2/public/index.php/ver_clientes" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDireccion" class="col-sm-2 control-label">Dirección</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion">
                        </div>
                    </div>
                    <div class="form-group">

                <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Guardar</button>
                            <button type="submit" class="btn btn-default float-right">Cancelar</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer -->
            </form>

        </div>
        <!-- /.card -->
    </div>


@endsection
