@extends('admin.layout')


@section('title_page')
    Liste des Commandes
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des commandes</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des commandes</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">

                    <a  title="ajouter" data-toggle="modal" data-target="#actionModalCommande" class="btn btn-sm btn-secondary text-white" >
                        <i class="fa fa-plus"></i> Ajouter
                    </a>

                    @include('admin.commandes.modal-activeDesactive')

                </div>
            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Liste des commamdes ({{sizeof($commandes)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-dark">
                    <tr class="fw-bold">
                        <th class="table-plus">Numero Commande</th>
                        <th class="table-plus">Produits</th>
                        <th class="table-plus">Quantite</th>
                        <th class="table-plus">Statut</th>

                        <th class="table-plus">Date</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commandes as $commande)

                    <tr>
                        <td class="table-plus">
                            {{ $commande->numero_commande }}
                        </td>

                        <td class="table-plus">{{$commande->produit()->first()->nom}}</td>
                        <td class="table-plus">
                            {{ $commande->quantity }}
                        </td>

                        <td>
                            <span>
                                {{ $commande->statut }}
                            </span>
                        </td>
                        <td>
                            <a href="">
                                <i class="fa fa-pencil text-primary" title="Modifier"></i>
                            </a>


                            <a href="" title="{{$commande->statut ? 'Désactiver' : 'Activer'}}" data-toggle="modal" data-target="{{"#actionModalChangestatutActive".$commande->id}}">
                                <i class="fa fa-1x {{$commande->statut ? 'fa-remove text-danger' :  'fa-check-circle text-success'}}"></i>
                            </a>&nbsp;&nbsp;


                        </td>
                    </tr>
{{--
                    @include('admin.centres-interet.modal-activeDesactive', ['commande' => $commande])
 --}}
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
