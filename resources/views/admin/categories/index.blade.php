@extends('admin.layout')


@section('title_page')
    Liste des categories
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des categories</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des categories</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Liste des categories ({{sizeof($categories)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover data-table nowrap">
                    <thead class="app-bg-primary text-dark">
                    <tr class="fw-bold">
                        <th class="table-plus">nom</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $categorie)
                    <tr>
                        <td class="table-plus">
                            {{$categorie->nom }}
                        </td>
                        <td></td>

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
