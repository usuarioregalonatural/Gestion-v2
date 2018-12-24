@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')

    <h1>Ultima Semana</h1>

@stop



@section('content')


<!--    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-ban"></i> Alert!</h5>
        Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
        entire
        soul, like these sweet mornings of spring which I enjoy with my whole heart.
    </div>
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-info"></i> Alert!</h5>
        Info alert preview. This alert is dismissable.
    </div>
-->
    <!-- Small Box (Stat card) -->
    <h5 class="mb-2 mt-4"><b></b></h5>
    <div class="row">
        <!-- /.col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Nuevos Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
       <!-- /.col -->
        <!-- /.col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>2.330,43 </h3>

                    <p>Ingresos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>-876,55 </h3>

                    <p>Gastos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-euro"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
    </div>
<!-- row-->
    <div class="container-fluid">
        <h5 class="mb-2"></h5>
        <div class="row">

        <div>
            <!-- col-->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info" ><i class="fa fa-american-sign-language-interpreting"></i>
                     <!--   <i class="fa fa-caret-square-o-right"></i> -->
                    </span>

                    <div class="info-box-content" >
                        <span class="info-box-text">Pedidos pendientes preparar</span>
                        <span class="info-box-number">12</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- col-->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success" ><i class="fa fa-ship"></i>
                        <!--   <i class="fa fa-caret-square-o-right"></i> -->
                    </span>

                    <div class="info-box-content" >
                        <span class="info-box-text">Pedidos pendientes enviar</span>
                        <span class="info-box-number">3</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- col-->

        </div>

        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
@stop



@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">

@stop



@section('js')

    <script> console.log('Hi!'); </script>

@stop

