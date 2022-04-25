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
                <form method="post" action="{{route('profile.update')}}">
                    @csrf
                    @method('POST')

                    @include('admin.profile.formulaire')

                    <div class="row mt-4 justify-content-center text-center">
                        <div class="form-group text-center">
                            <a href="{{route('users.index')}}" class="btn btn-sm btn-space btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-sm btn-space btn-success">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('moreJs')
l
<script>


var role = document.getElementById('role');
var usager = document.getElementsByClassName('usager');

/*role.onchange = function () {
var index;
     if(role.value == "USAGER") {
    for (index = 0; index < usager.length; index++) {
       usager[index].style.display ='inline'
    }
    } else {
        for (index = 0; index < usager.length; index++) {
       usager[index].style.display ='none'
    }

    }
  } */
</script>
	<!-- switchery js -->
	<script src="{{ asset('admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
	<script src="{{ asset('admin/vendors/scripts/advanced-components.js') }}"></script>
@endsection
