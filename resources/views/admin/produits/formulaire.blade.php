<div class="row">

    <div class="form-group col-md-12 col-lg-12 col-sm-12">
        <label for="nom" class="col-form-label text-sm-right">Nom </label>
        <input id="nom" type="text" value="{{old('nom', $centre->nom)}}" name="nom" placeholder="Nom"
               class="form-control @if($errors->has('nom')) is-invalid @endif">
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{$errors->first('nom')}}
            </div>
        @endif
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label for="role" class="col-form-label text-sm-right">Prix</label>
         <input type="number" name="prix" id="prix" class="form-control  @if($errors->has('pix')) is-invalid @endif"">

         @if($errors->has('prix'))
         <div class="invalid-feedback">
             {{$errors->first('prix')}}
         </div>
     @endif
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label for="categorie" class="col-form-label text-sm-right">Categorie</label>
        <select name="type" id="type" class="form-control custom-select2" required style="width: 100%; height: 38px;">
            <option selected disabled value="">Selectionnez</option>
            <option value="">Pay </option>
        </select>
    </div>

</div>
