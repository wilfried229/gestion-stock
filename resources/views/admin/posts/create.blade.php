@extends('admin.layout')


@section('title_page')
    {{displayTitleSaveTypePost($type)}}
@endsection

@section('moreCss')
    <link href="{{asset('css/admin/summernote/summernote-bs4.css')}}" rel="stylesheet">
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
                            <li class="breadcrumb-item active" aria-current="page">{{displayTitleSaveTypePost($type)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 col-sm-12 text-left">
                <a href="{{route('admin.posts.index', ['type' => $type])}}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-backward"></i> Retour
                </a>
            </div>
        </div>

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">{{displayTitleSaveTypePost($type)}}</h4>
            </div>
            <div class="pb-20 container">
                <form method="post" action="{{route('admin.posts.store', ['type' => $type])}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('admin.posts.partials.champs-formulaire', ["post" => $post])

                    <div class="row mt-4 justify-content-center text-center">
                        <div class="form-group text-center">
                            <a href="{{route('admin.posts.index', ['type' => $type])}}" class="btn btn-sm btn-space btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-sm btn-space btn-success">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("moreJs")
    @include("admin.posts.partials.summernote-config")
@endsection
