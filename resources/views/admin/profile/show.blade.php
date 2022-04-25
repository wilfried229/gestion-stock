@extends('admin.layout')


@section('title_page')
    Mon profile
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Profil utilisateur</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil utilisateur</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


    @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Mon Profil</h4>
            </div>
            <div class="pb-20 container">
                <form enctype="multipart/form-data" method="post" action="{{route('users.update', $user->id)}}">
                    @csrf
                    @method('PUT')

                    @include('admin.profile.show-formulaire')

                    <div class="row mt-4 justify-content-center text-center">
                        <div class="form-group text-center">
                            <a href="{{route('profile.edit')}}" class="btn btn-sm btn-space btn-secondary">Modifier</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
