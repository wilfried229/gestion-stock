@extends('admin.layout')

@section('title_page') Accueil @endsection

@section('content')

    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-3">
                <img class="img-fluid" src="{{asset('img/Group407.png')}}" alt="{{env('APP_NAME')}}">
            </div>
            <div class="col-md-9">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <span class=fw-bold>Bienvenue</span> <div class="weight-600 font-30 app-text-primary">{{auth()->user()->name }}</div>
                </h4>
                <p class="font-18 max-width-600">
                    Plateforme web d'administration de l'application mobile {{env('APP_NAME')}}
                </p>
            </div>
        </div>
    </div>


   <div class="title pb-20">
       <h2 class="h3 mb-0">Statistiques</h2>
   </div>

   <div class="row pb-10">
       <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
           <div class="card-box height-100-p widget-style3">
               <div class="d-flex flex-wrap">
                   <div class="widget-data">
                       <div class="weight-700 font-24 text-dark"></div>
                       <div class="font-14">
                           <span class=fw-bold>Produits</span>
                       </div>
                   </div>
                   <div class="widget-icon">
                       <div class="icon" data-color="#00eccf"><i class="icon-copy fa fa-podcast"></i></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
           <div class="card-box height-100-p widget-style3">
               <div class="d-flex flex-wrap">
                   <div class="widget-data">
                       <div class="weight-700 font-24 text-dark"></div>
                       <div class="font-14">
                           <span class=fw-bold>Categorie</span>
                       </div>
                   </div>
                   <div class="widget-icon">
                       <div class="icon"><i class="icon-copy fa fa-headphones" aria-hidden="true"></i></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
           <div class="card-box height-100-p widget-style3">
               <div class="d-flex flex-wrap">
                   <div class="widget-data">
                       <div class="weight-700 font-24 text-dark"></div>
                       <div class="font-14">
                           <span class=fw-bold>Commandes</span>
                       </div>
                   </div>
                   <div class="widget-icon">
                       <div class="icon" data-color="#ff5b5b"><span class="icon-copy fa fa-joomla"></span></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
           <div class="card-box height-100-p widget-style3">
               <div class="d-flex flex-wrap">
                   <div class="widget-data">
                       <div class="weight-700 font-24 text-dark"></div>
                       <div class="font-14">
                           <span class=fw-bold>Payments</span>
                       </div>
                   </div>
                   <div class="widget-icon">
                       <div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-users" aria-hidden="true"></i></div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
           <div class="card-box height-100-p widget-style3">
               <div class="d-flex flex-wrap">
                   <div class="widget-data">
                       <div class="weight-700 font-24 text-dark"></div>
                       <div class="font-14">
                           <span class=fw-bold>Statistique</span>
                       </div>
                   </div>
                   <div class="widget-icon">
                       <div class="icon" data-color="#00eccf"><i class="icon-copy fa fa-shower" aria-hidden="true"></i></div>
                   </div>
               </div>
           </div>
       </div>

   </div>

@endsection
