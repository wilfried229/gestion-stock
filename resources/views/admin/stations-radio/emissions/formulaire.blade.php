<div class="row">
    @if($emission->id != null)
        <input type="hidden" name="emission_id" value="{{$emission->id}}">
    @endif
    <div class="form-group col-md-6 col-lg-6 col-sm-6">
        <label for="nom" class="text-sm-right">Nom</label>
        <input id="nom" type="text" value="{{old('nom', $emission->nom)}}" name="nom" placeholder="Nom"
               class="form-control @if($errors->has('nom')) is-invalid @endif">
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{$errors->first('nom')}}
            </div>
        @endif
    </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="jour" class="text-sm-right">Jour</label>
            <select name="jour" id="jour" class="form-control custom-select2" style="width: 100%;">
                <option selected disabled value="">Selectionnez</option>
                @foreach(array_keys(getJoursSemaine()) as $jour)
                    <option @if(old('jour', $emission->jour) == $jour) selected @endif value="{{$jour}}">
                        {{getJoursSemaine()[$jour]}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="heure_debut" class="text-sm-right">Heure de début</label>
            <input id="heure_debut" type="time" value="{{old('heure_debut', $emission->heure_debut)}}" name="heure_debut" placeholder="Heure de début"
                   class="form-control @if($errors->has('heure_debut')) is-invalid @endif">
            @if($errors->has('heure_debut'))
                <div class="invalid-feedback">
                    {{$errors->first('heure_debut')}}
                </div>
            @endif
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="heure_fin" class="text-sm-right">Heure de fin</label>
            <input id="heure_fin" type="time" value="{{old('heure_fin', $emission->heure_fin)}}" name="heure_fin" placeholder="Heure de fin"
                   class="form-control @if($errors->has('heure_fin')) is-invalid @endif">
            @if($errors->has('heure_fin'))
                <div class="invalid-feedback">
                    {{$errors->first('heure_fin')}}
                </div>
            @endif
        </div>


    <div class="form-group col-md-12 col-lg-12 col-sm-12">
        <label for="description" class="text-sm-right">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"
                  class="form-control @if($errors->has('description')) is-invalid @endif"
        >{{old('description', $emission->description)}}</textarea>
        @if($errors->has('description'))
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
        @endif
    </div>

</div>
