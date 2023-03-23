@extends('admin.layout.app')
@section('contenu')
<h1>Utilisateurs</h1>
<div class="card">
    
    <div class="card-header">

      <h3 class="card-title">Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nom</th>
          <th>Emaim</th>
          <th>Types</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach ($users as $item)
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    @if ($item->admin == 0)
                        <span class="badge badge-info">Client</span>
                    @else
                        <span class="badge badge-success">Admin</span>
                    @endif
                </td>
            @endforeach
          
        </tr>
        
        </tbody>
        <tfoot>
        <tr>
            <th>Nom</th>
            <th>Emaim</th>
            <th>Types</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
