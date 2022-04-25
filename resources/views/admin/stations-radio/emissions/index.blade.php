@extends('admin.layout')


@section('title_page')
    Grille des émissions de {{$radio->nom}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>{{$radio->nom}}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Grille des émissions</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-4 text-right">
                    <a href="{{route('admin.radio.index')}}" class="btn btn-sm app-bg-secondary text-white">
                        <i class="fa fa-backward"></i> Retour
                    </a>


                   <a href="{{route('admin.radio.emission.create', ['radio' => $radio->id])}}" class="btn btn-sm app-bg-primary text-white">
                    <i class="fa fa-plus"></i> Ajouter
                </a>
                </div>

            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Grille des émissions ({{sizeof($emissions)}})</h4>
            </div>
            <div class="pb-20 table-responsive-sm table-responsive table-responsive-lg">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-light">
                    <tr class="fw-bold">
                        <th class="table-plus">Nom</th>
                        <th>Jour</th>
                        <th>Durée</th>
                        <th>Description</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($emissions as $emission)
                    <tr>
                        <td class="table-plus">
                            {{$emission->nom}}
                        </td>
                        <td class="table-plus">
                        {{getJoursSemaine()[$emission->jour]}}
                        </td>
                        <td class="table-plus">
                            {{\Illuminate\Support\Carbon::parse($emission->heure_debut)->format('H:i') . " à ".
                              \Illuminate\Support\Carbon::parse($emission->heure_fin)->format('H:i')
                              }}
                        </td>
                        <td class="table-plus">
                            {{$emission->description ?? '-'}}
                        </td>
                        <td>
                            <a href="{{ route('admin.radio.emission.edit', ['radio' => $radio->id, 'emission' => $emission->id]) }}">
                                <i class="fa fa-pencil app-text-black" title="Modifier"></i>
                            </a>

                            <a href="" title="Retirer l'emission" data-toggle="modal" data-target="{{"#actionModalremoveEmission".$emission->id}}">
                                <i class="fa fa-1x fa-remove text-danger"></i>
                            </a>
                            &nbsp;&nbsp;



                        </td>
                    </tr>
                    @include('admin.stations-radio.emissions.modal-remove', ['radio' => $radio,'emission'=>$emission])

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>
@endsection

@section('moreJs')
    @include('admin.partials.data-table-settings', ['columnTognore' => 4])
@endsection
