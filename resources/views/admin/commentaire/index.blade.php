@extends('admin.layout')


@section('title_page')
    Liste des commentaires
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des commentaires</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des commentaires</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Liste des commentaires ({{sizeof($commentaires)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-light">
                    <tr class="fw-bold">
                        <th class="table-plus">Radio</th>

                        <th class="table-plus">Abonnés</th>
                        <th>Commentaires</th>
                        <th>Nombre Etoile  </th>

                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commentaires as $comment)
                    <tr>
                        <td class="table-plus">
                            {{$comment->radios()->first()->nom }}
                        </td>
                        <td class="table-plus">
                            {{$comment->users()->first()->nom ." ".  $comment->users()->first()->prenom}}
                        </td>
                        <td class="table-plus">{{$comment->contenu}}</td>
                        <td class="table-plus">

                            @if ($comment->contenu =0)
                            0
                            @else
                            @for ($i =0 ; $i < $comment->nombre_etoiles; $i++)
                            <i class="fa fa-star text-warning"></i>
                            @endfor
                            @endif

                        </td>
                        <td>
                            <a href="" title="Supprimer" data-toggle="modal" data-target="{{"#actionModalremoveCommentaire".$comment->id}}">
                                <i class="fa fa-1x fa-remove text-danger"></i>
                            </a>&nbsp;&nbsp;

                        </td>
                    </tr>

                    @include('admin.commentaire.modal-remove', ['comment' => $comment])

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
