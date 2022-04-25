@extends('admin.layout')


@section('title_page')
    Modification d'un centre d'intérêt
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des centres d'intérêt</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Modification d'un centre d'intérêt</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 col-sm-12 text-left">
                <a href="{{route('admin.centre-interet.index')}}" class="btn btn-sm app-bg-secondary text-white">
                    <i class="fa fa-backward"></i> Retour
                </a>
            </div>
        </div>

    @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Centre d'intérêt : {{ $centre->nom }}</h4>
            </div>
            <div class="pb-20 container">
                <form enctype="multipart/form-data" method="post" action="{{route('admin.centre-interet.update', $centre->id)}}">
                    @csrf
                    @method('PUT')

                    @include('admin.centres-interet.formulaire')

                    <div class="row mt-4 justify-content-center text-center">
                        <div class="form-group text-center">
                            <a href="{{route('admin.centre-interet.index')}}" class="btn btn-sm btn-space bg-secondary text-white">Annuler</a>
                            <button type="submit" class="btn btn-sm btn-space app-bg-primary text-white">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('moreJs')
    @include('admin.centres-interet.js')
@endsection
