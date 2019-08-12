@extends('adminlte::page')

@section('title', 'Início')

@section('content_header')
    <h1>Início</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $qtd['artesaos'] }}</h3>
                <p>Artesãos</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $qtd['tiposArtesanato'] }}</h3>
                <p>Tipos de Artesanato</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $qtd['finalidadesProducao'] }}</h3>
                <p>Finalidades de Produção</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-list"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $qtd['tecnicasProducao'] }}</h3>
                <p>Técnicas de Produção</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Boas Vindas</h3>
    </div>
    <div class="box-body">
        Seja bem-vindo ao sistema de Artesãos.
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
         
    </div>
    <!-- /.box-footer-->
</div>
@stop