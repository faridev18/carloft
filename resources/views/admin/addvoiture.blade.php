@extends('admin.layout.app')
@section('contenu')
<h1>Ajouter Voiture</h1>
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Ajouter voiture</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if (count($errors) > 0)
                  <div style="margin: 20px" class="alert alert-danger">
                   
                      @foreach ($errors->all() as $error)
                          {{$error}} <br>
                      @endforeach
                    
                  </div>
              @endif
              @if (Session::has('status'))
                  <div style="margin: 20px" class="alert alert-success">
                    {{Session::get('status')}}
                  </div>
                  
              @endif

              <form action="/savevoiture" enctype="multipart/form-data" method="POST">
    
                @csrf
              <div class="card-body">
                    <div class="form-group">
                        <label for="">Nom Voiture</label>
                        <input type="text" name="nomvoiture" class="form-control" id="" placeholder="PEUGEOT 208">
                    </div>
                    <div class="form-group">
                        <label for="">Année</label>
                        <input type="text" name="annee" class="form-control" id="" placeholder="2016">
                  </div>
                  <div class="form-group">
                    <label for="">Types</label>
                    <select name="types" class="form-control"  name="" id="">
                        <option  value="manuel">Manuel</option>
                        <option  value="auto">Automatique</option>
                    </select>
                  </div>
                  <div class="form-group">
                        <label for="">Kilométrage</label>
                        <input name="kilo" type="text" class="form-control" id="" placeholder="25">
                  </div>
                  <div class="form-group">
                        <label for="">Prix</label>
                        <input name="prix" type="text" class="form-control" id="" placeholder="50000">
                  </div>
                <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" id="" >
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        
              
            </form>
  </div>



@endsection
