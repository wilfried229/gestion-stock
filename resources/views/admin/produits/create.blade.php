@extends('admin.layout')

@section('title_page')
    Création d'un nouveau produit
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des produits </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des produits</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 col-sm-12 text-left">
                <a href="{{route('produit.index')}}" class="btn btn-sm bg-secondary text-white">
                    <i class="fa fa-backward"></i> Retour
                </a>
            </div>
        </div>

        @include('admin.partials.success-error-message')

    <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Ajout d'un nouveau produit </h4>
            </div>
            <div class="pb-20 container">
                <form method="post" action="{{route('produit.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('admin.produits.formulaire')

                    <div class="row mt-4 justify-content-center text-center">
                        <div class="form-group text-center">
                            <a href="{{route('produit.index')}}" class="btn btn-sm btn-space bg-secondary text-white">Annuler</a>
                            <button type="submit" class="btn btn-sm btn-space btn-primary text-white">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('moreJs')
    < @include('admin.produits.js')
@endsection
