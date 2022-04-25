@extends('admin.layout')


@section('title_page')
    Liste des produits
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des produits</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des produits</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{route('admin.produit.create')}}" class="btn btn-sm app-bg-secondary text-white" >
                        <i class="fa fa-plus"></i> Ajouter
                    </a>
                </div>
            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Liste des produits ({{sizeof($produits)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-light">
                    <tr class="fw-bold">
                        <th class="table-plus">Nom</th>
                        <th class="table-plus">prix</th>
                        <th class="table-plus">Categorie</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produits as $produit)

                    <tr>
                        <td class="table-plus">{{$produit->nom}}</td>
                        <td class="table-plus">{{$produit->prix}}</td>
                        <td class="table-plus"></td>
                        <td>
                            <a href="{{ route('admin.centre-interet.edit', ['produit' => $produit->id]) }}">
                                <i class="fa fa-pencil text-primary" title="Modifier"></i>
                            </a>

                            <a href="{{ route('admin.centre-interet.edit', ['produit' => $produit->id]) }}">
                                <i class="fa fa-pencil text-warning" title="Commander"></i>
                            </a>

                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>
@endsection

@section('moreJs')
    @include('admin.partials.data-table-settings', ['columnTognore' => 2])
@endsection
