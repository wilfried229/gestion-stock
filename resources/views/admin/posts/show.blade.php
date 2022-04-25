@extends('admin.layout')


@section('title_page')
    {{\Illuminate\Support\Str::title(\Illuminate\Support\Str::slug(getTypePost($type)))}}
    - {{$post->title}}
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
                            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
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
        @include("admin.posts.partials.show", ["post" => $post])

        <div class="row mt-4 justify-content-center text-center">
            <div class="form-group text-center">
                <a href="{{route('admin.posts.index', ['type' => $type])}}" class="btn btn-sm btn-space btn-secondary">Retour</a>
            </div>
        </div>

    </div>
@endsection
