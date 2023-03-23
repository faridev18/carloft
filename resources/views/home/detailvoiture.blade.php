@extends('home.layout.app')
@section('content')
    <br>
     
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Voiture Detail</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Voiture Detail</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h1 class="display-4 text-uppercase mb-5">{{$voiture->nomvoiture}}</h1>
                    <span>@if ($voiture->location == 0)
                        <span class="badge badge-info">Diponible</span>
                    @else
                        <span class="badge badge-success">Loué</span>
                        
                    @endif</span>
                    <div class="row mx-n2 mb-3">
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="{{asset("storage/imagevoiture/".$voiture->images)}}" alt="">
                        </div>
                        
                    </div>
                    <p>{{$voiture->description}}</p>
                    <div class="row pt-2">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span>Model: {{$voiture->annee}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span>{{$voiture->types}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-road text-primary mr-2"></i>
                            <span>{{$voiture->kilo}}km/liter</span>
                        </div>
                       
                    </div>
               </div>

                <div class="col-lg-4 mb-5">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary text-center mb-4">Disponible</h3>
                        @if (auth()->user())
                        <div class="form-group mb-0">
                            <a href="{{URL::to('/louer/'.$voiture->id_voiture)}}" >
                                <button class="btn btn-primary btn-block" type="submit" style="height: 50px;">Louer</button>
                            </a>
                        </div>
                        @else
                        <a href="{{URL::to('/login')}}" ><button class="btn btn-primary btn-block" type="submit" style="height: 50px;">Se connecter</button></a>
                        @endif
                        <div class="form-group mb-0">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Car End -->
@endsection
