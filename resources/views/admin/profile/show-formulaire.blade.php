<div class="row">
    <div class="form-group col-md-6 col-sm-12 col-lg-6">
        <label for="name" class="col-form-label text-sm-right font-weight-bold">Nom</label>
        <div>{{$user->nom}}</div>
    </div>
    <div class="form-group col-md-6 col-sm-12 col-lg-6">
        <label for="name" class="col-form-label text-sm-right font-weight-bold">Prénom(s)</label>
        <div>{{$user->prenom}}</div>
    </div>
    <div class="form-group col-md-6 col-sm-12 col-lg-6">
        <label for="name" class="col-form-label text-sm-right font-weight-bold">Téléphone</label>
        <div>{{$user->telephone ?? '-'}}</div>
    </div>
    <div class="form-group col-md-6 col-sm-12 col-lg-6">
        <label for="name" class="col-form-label text-sm-right font-weight-bold">Sexe</label>
        <div>{{$user->sexe ? getUsersSexes()[$user->sexe] : ''}}</div>
    </div>
    <div class="form-group col-md-6 col-sm-12 col-lg-6">
        <label for="email" class="col-form-label text-sm-right font-weight-bold">Email</label>
        <div>{{$user->email}}</div>
    </div>
    <div class="form-group col-md-6 col-sm-12 col-lg-6">
        <label for="email" class="col-form-label text-sm-right font-weight-bold">Rôle</label>
        <div>{{displayUserRole($user->role)}}</div>
    </div>
</div>
