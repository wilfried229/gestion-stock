@extends('admin.layout')


@section('title_page')
    {{displayTitleTypePost($type)}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>{{displayTitleTypePost($type)}}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{displayTitleTypePost($type)}}</li>
                        </ol>
                    </nav>
                </div>
                @if($type != "page")
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{route('admin.posts.create', ['type' => $type])}}" class="btn btn-sm btn-info">
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
                <h4 class="text-blue h4">{{displayTitleTypePost($type)}} ({{sizeof($posts)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table-export nowrap">
                    <thead class="bg-info text-light">
                    <tr>
                        <th>Date</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y à H:i')}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user()->first()->name}}</td>
                        <td>{{displayStatutPost($post->statut)}}</td>
                        <td class="datatable-nosort">
                            <a href="{{route('admin.posts.show', ['type' => $type, 'post' => $post->id])}}">
                                <i class="fa fa-eye text-primary" title="Visualiser"></i>
                            </a> &nbsp;
                            <a href="{{route('admin.posts.edit', ['type' => $type, 'post' => $post->id])}}">
                                <i class="fa fa-pencil text-primary" title="Modifier"></i>
                            </a> &nbsp;
                            @if($post->document()->first() != null)
                            <a target="_blank" href="{{route('admin.posts.document', ['type' => $type, 'post' => $post->id])}}">
                                <i class="fa fa-download text-secondary" title="Document"></i>
                            </a> &nbsp;
                            @endif
                            <a href="" data-toggle="modal" data-target="{{"#actionModalArticle".$post->id}}">
                                @if($post->statut == env('STATUT_PUBLIE'))
                                    <i title="Archiver" class="fa fa-1x fa-remove text-danger"></i>
                                @else
                                    <i title="Publier" class="fa fa-1x fa-check text-success"></i>
                                @endif
                            </a>
                        </td>
                    </tr>

                    <!-- modal change status -->
                    @include('admin.posts.partials.modal-change-posts-statut', ['post' => $post, 'type' => $type])

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
