@extends('admin.layout')


@section('title_page')
    Liste des stations radio
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des stations radio</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des stations radio</li>
                        </ol>
                    </nav>
                </div>
                @if (in_array(Auth::user()->role,['ADMIN']))
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{route('admin.radio.create')}}" class="btn text-white btn-sm app-bg-primary">
                        <i class="fa fa-plus"></i> Ajouter
                    </a>
                </div>
                @endif

            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="app-text-black h4">Liste des stations radio ({{sizeof($radios)}})</h4>
            </div>
            <div class="pb-20 table-responsive-sm table-responsive table-responsive-lg">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-light">
                    <tr class="fw-bold">
                        <th class="table-plus">Logo</th>
                        <th>Nom</th>
                        <th>Flux URL</th>
                        <th>Status</th>
                        <th>Centres d'intérêt</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($radios as $radio)
                    <tr>
                        <td class="table-plus">
                            <img class="img-radio img-fluid" src="{{asset('radios/img/'.$radio->logo)}}" alt="{{"image $radio->logo"}}">
                        </td>
                        <td class="table-plus">
                        {{$radio->nom}} <br>
                        {{$radio->pays ? 'Pays : '. $radio->pays->nom : ''}} <br>
                        {{$radio->description ? "Description ".$radio->description : ''}}
                        </td>
                        <td class="table-plus text-left">
                                <a class="fw-bold" href="{{$radio->url}}" target="_blank">
                                    <span class="btn-link"> {{$radio->url}} </span>
                                </a>
                            <br>
                            <figure class="mt-1">
                                <audio
                                    controls
                                    style="height: 25px;"
                                    src="{{$radio->url}}">
                                    <p>
                                        Votre navigateur ne prend pas charge l'audio HTML.
                                        Voici <a href="{{$radio->url}}">un lien de téléchargement</a> à la place.
                                    </p>
                                </audio>
                            </figure>
                        </td>
                        <td class="table-plus text-left">
                            TOP : {{$radio->top ? 'Oui' : 'Non'}}
                            <br>
                            ACTIVE : {{$radio->active ? 'Oui' : 'Non'}}
                        </td>
                        <td class="table-plus">
                        @foreach($radio->centres_interet() as $centre)
                                <span class="badge @if($centre->type == "GENRE") badge-primary @else badge-success @endif">
                                    {{$centre->nom}}
                                </span>
                        @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.radio.edit', ['radio' => $radio->id]) }}">
                                <i class="fa fa-pencil app-text-black" title="Modifier"></i>
                            </a> &nbsp;
                            <a href="{{ route('admin.radio.emission.index', ['radio' => $radio->id]) }}">
                                <i title="Emissions" class="app-text-black icon-copy fa fa-calendar" aria-hidden="true"></i>
                            </a> &nbsp;

                            @if (in_array(Auth::user()->role,['ADMIN']))
                          <a href="" title="{{$radio->top ? 'Retirer des' : 'Ajouter dans les'}} TOP" data-toggle="modal" data-target="{{"#actionModalAddOrRemoveTop".$radio->id}}">
                            <i class="fa fa-1x {{$radio->top ? 'fa-hand-o-down text-danger' :  'fa-hand-o-up text-success'}}"></i>
                        </a>&nbsp;&nbsp;
                        <a href="" title="{{$radio->active ? 'Désactiver' : 'Activer'}}" data-toggle="modal" data-target="{{"#actionModalChangeStatusActive".$radio->id}}">
                            <i class="fa fa-1x {{$radio->active ? 'fa-remove text-danger' :  'fa-check-circle text-success'}}"></i>
                        </a>&nbsp;&nbsp;

                          @endif
                        </td>
                    </tr>

                    <!-- modal change radio-top-status -->
                    @include('admin.stations-radio.modal-change-add-remove-top', ['radio' => $radio])

                    <!-- modal change status -->
                    @include('admin.stations-radio.modal-change-status', ['radio' => $radio])

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>
@endsection

@section('moreJs')
    @include('admin.partials.data-table-settings', ['columnTognore' => 3])
    <script type="application/javascript">
        $(document).ready(function (){
            $("audio").bind("play",function (){
                $("audio").not(this).each(function (index, audio) {
                    audio.pause();
                });
            });
        });
    </script>
@endsection
