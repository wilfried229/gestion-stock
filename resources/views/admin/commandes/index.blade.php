@extends('admin.layout')


@section('title_page')
    Liste des centres d'intérêts
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
                            <li class="breadcrumb-item" aria-current="page">Liste des centres d'intérêt</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{route('admin.centre-interet.create')}}" class="btn btn-sm app-bg-secondary text-white" >
                        <i class="fa fa-plus"></i> Ajouter
                    </a>
                </div>
            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Liste des centres d'intérêt ({{sizeof($centres)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-light">
                    <tr class="fw-bold">
                        <th class="table-plus">Image</th>
                        <th class="table-plus">Couleur</th>
                        <th class="table-plus">Nom</th>
                        <th>Type</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($centres as $centre)

                    <tr>
                        <td class="table-plus">
                            <img class="img-centre img-fluid" style="width: 50px;" src="{{asset('centreInteret/img/'.$centre->image)}}" alt="{{"image $centre->image"}}">
                        </td>
                        <td class="table-plus">

                            <input disabled type="color" value="{{$centre->color}}" class="form-control">

                        </td>
                        <td class="table-plus">{{$centre->nom}}</td>

                        <td>
                            <span>
                                {{getTypeCentreInteret()[$centre->type]}}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.centre-interet.edit', ['centre' => $centre->id]) }}">
                                <i class="fa fa-pencil text-primary" title="Modifier"></i>
                            </a>


                            <a href="" title="{{$centre->active ? 'Désactiver' : 'Activer'}}" data-toggle="modal" data-target="{{"#actionModalChangeStatusActive".$centre->id}}">
                                <i class="fa fa-1x {{$centre->active ? 'fa-remove text-danger' :  'fa-check-circle text-success'}}"></i>
                            </a>&nbsp;&nbsp;


                        </td>
                    </tr>

                    @include('admin.centres-interet.modal-activeDesactive', ['centre' => $centre])

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
