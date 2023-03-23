@extends('home.layout.app')
@section('content')
    <!-- Search Start -->
    <div class="container-fluid bg-white pt-3 px-lg-5">
        {{-- <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Gars de Location</option>
                    <option value="1">Cotonou</option>
                    <option value="2">Bohicon</option>
                    <option value="3">Parakou</option>
                    <option value="4">Dassa</option>
                    <option value="5">Porto-Novo</option>
                    <option value="6">Ouidah</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Gars de Depot</option>
                    <option value="1">Cotonou</option>
                    <option value="2">Bohicon</option>
                    <option value="3">Parakou</option>
                    <option value="4">Dassa</option>
                    <option value="5">Porto-Novo</option>
                    <option value="6">Ouidah</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="date mb-3" id="date" data-target-input="nearest">
                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Date de Location"
                        data-target="#date" data-toggle="datetimepicker" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="time mb-3" id="time" data-target-input="nearest">
                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Heure de Location"
                        data-target="#time" data-toggle="datetimepicker" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Selection de Voiture</option>
                    <option value="1">TOYOTA Avensis</option>
                    <option value="2">NISSAN Primera</option>
                    <option value="3">Peugeot 208</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Rechercher</button>
            </div>
        </div> --}}
    </div>
    <!-- Search End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('home/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Louer une Voiture</h4>
                            <h1 class="display-1 text-white mb-md-4">Meilleur Prix de Location de Voiture</h1>
                            <a href="{{URL::to('/voiture-dispo')}}" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserver maitenant</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('home/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Des voitures de qualité avec des miles illimités</h1>
                            <a href="{{URL::to('/voiture-dispo')}}" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserver maitenant</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">

            <h1 class="display-4 text-uppercase text-center mb-5">Voiture à la une</h1>
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
