<div class="row">
    @if($radio->id != null)
        <input type="hidden" name="radio_id" value="{{$radio->id}}">
    @endif
    <div class="form-group col-md-12 col-lg-12 col-sm-12">
        <label for="nom" class="text-sm-right">Nom complète</label>
        <input id="nom" type="text" value="{{old('nom', $radio->nom)}}" name="nom" placeholder="Nom"
               class="form-control @if($errors->has('nom')) is-invalid @endif">
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{$errors->first('nom')}}
            </div>
        @endif
    </div>
    <div class="form-group col-md-12 col-lg-12 col-sm-12">
        <label for="url" class="text-sm-right">Flux URL</label>
        <input id="url" type="text" value="{{old('url', $radio->url)}}" name="url" placeholder="URL, ex: https://www.url-radio.com"
               class="form-control @if($errors->has('url')) is-invalid @endif">
        @if($errors->has('url'))
            <div class="invalid-feedback">
                {{$errors->first('url')}}
            </div>
        @endif
    </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="logo" class="text-sm-right">
            {{$radio->id != null && $radio->logo != null ? "Changer le logo" : "Logo"}}
            </label>
            <input type="file" name="logo" class="form-control-file form-control">
            @if($errors->has('logo'))
                <div class="invalid-feedback">
                    {{$errors->first('logo')}}
                </div>
            @endif
        </div>

        @if($radio->id != null && $radio->logo != null)
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="logo" class="text-sm-right">Ancien logo</label>
                <div>
                    <img class="img-radio-update img-fluid" src="{{asset('radios/img/'.$radio->logo)}}" alt="{{"image $radio->logo"}}">
                </div>
            </div>
        @endif

    <div class="form-group col-lg-6 col-md-6 col-sm-12">
        <label for="pays" class="text-sm-right">Pays</label>
        <select name="pays_id" id="pays" class="form-control custom-select2" style="width: 100%;">
            <option selected disabled value="">Selectionnez</option>
            @foreach($pays as $p)
                <option @if(old('pays_id', $radio->pays_id) == $p->id) selected @endif value="{{$p->id}}">{{$p->nom}}</option>
            @endforeach
        </select>
    </div>



        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <label for="centres" class="text-sm-right">Centre d'intérêts (sélection multiple)</label>
            <select name="centres[]" id="centres" multiple class="form-control custom-select2" required style="width: 100%;">
                <option disabled value="">Selectionnez</option>
                @foreach($centres as $centre)
                    <option @if(radioHasCentre($radio, $centre->id)) selected @endif
                    value="{{$centre->id}}">{{$centre->nom}}</option>
                @endforeach
            </select>
        </div>

</div>
