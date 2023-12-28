@extends('admin.layout.app')
@section('contenu')
<h1>User</h1>
<div class="card">
    
    <div class="card-header">

      <h3 class="card-title">Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (Session::has('status'))
        <div style="margin: 20px" class="alert alert-success">
          {{Session::get('status')}}
        </div>
    @endif
        
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nom</th>
          <th>Image</th>
          <th>Annee</th>
          <th>Types</th>
          <th>Kiliolmétrage</th>
          <th>Prix</th>
          <th>Etat</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
            @foreach ($voitures as $item)
            <tr>
                <td><img src="{{asset("storage/imagevoiture/".$item->images)}}" width="70px" alt=""></td>
                <td>{{$item->nomvoiture}}</td>
                <td>{{$item->annee}}</td>
                <td>{{$item->types}}</td>
                <td>{{$item->kilo}}</td>
                <td>{{$item->prix}}</td>
                <td>
                    @if ($item->location == 0)
                        <span class="badge badge-info">Diponible</span>
                    @else
                        <span class="badge badge-success">Loué</span>
                        
                    @endif
                </td>
                <td>
                    
                    <a class="btn btn-warning"  href="{{url('/editvoiture/'.$item->id_voiture)}}">Modifier</a>
                    <a class="btn btn-danger"  href="{{url('/deletevoiture/'.$item->id_voiture)}}" onclick="return confirm('Voulez vous vraiment suprimer cette voiture ?');">Supprimer</a>
                </td>
          </tr>
            @endforeach
          
        
        
        </tbody>
        <tfoot>
        <tr>
          <th>Image</th>
          <th>Nom</th>
            <th>Annee</th>
            <th>Types</th>
            <th>Kiliolmétrage</th>
            <th>Prix</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
