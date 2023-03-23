@extends('admin.layout.app')
@section('contenu')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"></span>

        <div class="info-box-content">
          <span class="info-box-text">Utilisateur</span>
          <span class="info-box-number">{{$nuser}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-success"></span>

        <div class="info-box-content">
          <span class="info-box-text">Voitures Disponibles</span>
          <span class="info-box-number">{{$nvoi}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-warning"></span>

        <div class="info-box-content">
          <span class="info-box-text">Voiture en cours de location</span>
          <span class="info-box-number">{{$nlou}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-danger"></span>

        <div class="info-box-content">
          <span class="info-box-text">Location</span>
          <span class="info-box-number">{{$nloca}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
@endsection
