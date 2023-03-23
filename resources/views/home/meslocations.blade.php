@extends('home.layout.app')
@section('content')
    <br>
     
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Mes Locations</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Mes Locations</h6>
        </div>
    </div>
    <div class="card">
    
      <div class="card-header">
  
        <h3 class="card-title">Location</h3>
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
              <th>Image</th>
            <th>Nom</th>
            
            <th>Annee</th>
            <th>Date de location</th>

            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
              @foreach ($voitures as $item)
              <tr>
                  <td><img src="{{asset("storage/imagevoiture/".$item->images)}}" width="70px" alt=""></td>
                  <td>{{$item->nomvoiture}}</td>
                  <td>{{$item->annee}}</td>

                  <td>{{$item->date_loc}}</td>
                  
                  <td>
                      @if ($item->rendu == 0)
                      <a class="btn btn-warning"  href="{{url('/rendre/'.$item->id_loc)}}">Rendre</a>
                  @else
                      <span class="badge badge-success">Rendu</span>
                      
                  @endif
                      
                      
                  </td>
            </tr>
              @endforeach
            
          
          
          </tbody>
          <tfoot>
          <tr>
            <th>Image</th>
            <th>Nom</th>

              <th>Annee</th>
            <th>Date de location</th>

              <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

    <!-- Related Car End -->
@endsection
