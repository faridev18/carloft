@extends('home.layout.app')
@section('content')
    <br>
       <!-- Page Header Start -->
       <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Liste Voiture</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="{{URL::to('/')}}">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Liste Voiture Disponibles</h6>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">

            <h1 class="display-4 text-uppercase text-center mb-5">Voitures Disponibles</h1>
            <div class="row">
                
                @foreach ($voitures as $item)
               
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="{{asset("storage/imagevoiture/".$item->images)}}" alt="">
                        <h4 class="text-uppercase mb-4">{{$item->nomvoiture}}</h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>{{$item->annee}}</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>{{$item->types}}</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>{{$item->kilo}}K</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href="{{URL::to('/detail-voiture/'.$item->id_voiture)}}">{{$item->prix}}F/Day</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Rent A Car End -->
@endsection
