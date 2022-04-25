<div class="row">
    <div class="form-group col-md-6 col-lg-6 col-sm-12">
        <label for="nom" class="col-form-label text-sm-right">Nom </label>
        <input id="nom" type="text" value="{{old('nom', $user->nom)}}" name="nom" placeholder="Nom"
               class="form-control @if($errors->has('nom')) is-invalid @endif">
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{$errors->first('nom')}}
            </div>
        @endif
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-12">
        <label for="prenom" class="col-form-label text-sm-right">Prénom(s)</label>
        <input id="prenom" type="text" value="{{old('prenom', $user->prenom)}}" name="prenom" placeholder="Prénoms"
               class="form-control @if($errors->has('prenom')) is-invalid @endif">
        @if($errors->has('prenom'))
            <div class="invalid-feedback">
                {{$errors->first('prenom')}}
            </div>
        @endif
    </div>
    <div class="form-group col-lg-6 col-md-6 col-sm-6">
        <label for="role" class="col-form-label text-sm-right">Sexe</label>
        <select name="sexe" id="sexe" class="form-control custom-select2" required style="width: 100%; height: 38px;">
            <option selected disabled value="">Selectionnez</option>
            @foreach(array_keys(getUsersSexes()) as $sexe)
                <option @if (old('sexe',$user->sexe) == $sexe) selected @endif value="{{$sexe}}">{{getUsersSexes()[$sexe]}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-12">
        <label for="email" class="col-form-label text-sm-right">Email</label>
        <input id="email" type="email" value="{{old('email', $user->email)}}" name="email" placeholder="Email"
               class="form-control @if($errors->has('email')) is-invalid @endif">
        @if($errors->has('email'))
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
        @endif
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-12">
        <label for="telephone" class="col-form-label text-sm-right">Téléphone</label>
        <input id="telephone" type="tel" value="{{old('telephone', $user->telephone)}}" name="telephone" placeholder="Téléphone"
               class="form-control @if($errors->has('telephone')) is-invalid @endif">
        @if($errors->has('telephone'))
            <div class="invalid-feedback">
                {{$errors->first('telephone')}}
            </div>
        @endif
    </div>

    <div class="form-group col-md-6 col-lg-6 col-sm-12">
        <label for="old_password" class="col-form-label text-sm-right">Ancien mot de passe</label>
        <input type="password" name="old_password" id="old_password" class="form-control @if($errors->has('old_password')) is-invalid @endif">
        @if($errors->has('old_password'))
            <div class="invalid-feedback">
                {{$errors->first('old_password')}}
            </div>
        @endif
    </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-12">
        <label for="password" class="col-form-label text-sm-right">Nouveau mot de passe</label>
         <input type="password" name="password" id="password" class="form-control @if($errors->has('password')) is-invalid @endif">
         @if($errors->has('password'))
         <div class="invalid-feedback">
             {{$errors->first('password')}}
         </div>
          @endif
      </div>
    <div class="form-group col-md-6 col-lg-6 col-sm-12">
            <label for="password_confirm" class="col-form-label text-sm-right">Confirmer le nouveau mot de passe</label>
             <input type="password" name="password_confirm" id="password_confirm" class="form-control @if($errors->has('password-confirm')) is-invalid @endif">
             @if($errors->has('password-confirm'))
             <div class="invalid-feedback">
                 {{$errors->first('password-confirm')}}
             </div>
        @endif
    </div>
</div>
