<div class="row">
    @if($centre->id != null)
        <input type="hidden" name="centre_interet_id" value="{{$centre->id}}">
    @endif
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
        <label for="role" class="col-form-label text-sm-right">Type</label>
        <select name="type" id="type" class="form-control custom-select2" required style="width: 100%; height: 38px;">
            <option selected disabled value="">Selectionnez</option>
            @foreach(array_keys(getTypeCentreInteret()) as $typeCentre)
                <option @if (old('type',$centre->type) == $typeCentre) selected @endif value="{{$typeCentre}}">{{getTypeCentreInteret()[$typeCentre]}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-sm-12">
        <label for="logo" class="text-sm-right">
        {{$centre->id != null && $centre->image != null ? "Changer l'image" : "Image"}}
        </label>
        <input id="inputFileLogoCentreInteret" type="file" name="image" class="form-control-file form-control">
        @if($errors->has('image'))
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
        @endif
    </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-12 text-center">
            <label for="logo" class="text-sm-right">Prévisualisation</label>
            <div id="bgImgLogoCentreInteret" style="background-color: {{$centre->color}}">
                <img id="imgLogoCentreInteret" class="img-radio-update img-fluid {{$centre->id == null ? "d-none" : ""}}"
                     src="{{$centre->id ? asset('centreInteret/img/'.$centre->image) : ""}}" alt="{{"image $centre->image"}}">
            </div>
            <div style="opacity: .8; background-color: {{$centre->color}}" id="nomCentreInteretDisplay" class="pt-2 text-center app-text-black">
                {{$centre->nom}}
            </div>
        </div>

    <div class="form-group col-md-12 col-lg-12 col-sm-12">
        <label for="color" class="col-form-label text-sm-right">Couleur </label>
        <input id="color" type="color" value="{{old('color', $centre->color) ?? "#000000"}}" name="color" placeholder="color"
               class="form-control @if($errors->has('color')) is-invalid @endif">
        @if($errors->has('color'))
            <div class="invalid-feedback">
                {{$errors->first('color')}}
            </div>
        @endif
    </div>
</div>
