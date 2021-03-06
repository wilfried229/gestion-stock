@extends('admin.layout')


@section('title_page')
    Liste des Abonnés
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Liste des Abonnés</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                            <li class="breadcrumb-item" aria-current="page">Liste des Abonnés</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{route('users.create')}}" class="btn btn-sm app-bg-primary text-white">
                        <i class="fa fa-plus"></i> Ajouter
                    </a>
                </div>
            </div>
        </div>

        @include('admin.partials.success-error-message')

        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="fw-bold h4">Liste des Abonnés ({{sizeof($users)}})</h4>
            </div>
            <div class="pb-20">
                <table class="table hover  data-table-export nowrap">
                    <thead class="app-bg-primary text-light">
                    <tr class="fw-bold">
                        <th class="table-plus">Nom & prénom(s)</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td class="table-plus">{{$u->nom . ' '. $u->prenom}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{displayUserRole($u->role)}}</td>
                        <td>
                            <a href="{{ route('users.edit',$u->id) }}">
                                <i class="fa fa-pencil app-text-black" title="Modifier"></i>
                            </a>


                            <a href="" title="Retirer des abonnes" data-toggle="modal" data-target="{{"#actionModalremoveUsers".$u->id}}">
                                <i class="fa fa-1x fa-remove text-danger"></i>
                            </a>
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    @include('admin.users.modal-remove-user', ['user' => $u,'type'=>'abonne'])

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>
@endsection
