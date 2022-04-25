<div class="row">
    @php $document = $post->document()->first(); @endphp
    <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label for="title" class="col-form-label font-M-bold text-sm-right">
            {{getDataLibellesTypePost($type)["title"]}}
        </label>
        <input id="title" type="text" value="{{old('title', $post->title)}}" name="title" placeholder="{{getDataLibellesTypePost($type)["titlePlaceHolder"]}}"
               class="form-control @if($errors->has('title')) is-invalid @endif">
        @if($errors->has('title'))
            <div class="invalid-feedback">
                {{$errors->first('title')}}
            </div>
        @endif
    </div>
    @if(getDataLibellesTypePost($type)["canSaveCategory"])
    <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label for="category" class="col-form-label font-M-bold text-sm-right">
            Catégorie
        </label>
        <input id="title" type="text" value="{{old('category', $post->category)}}" name="category" placeholder="Catégorie"
               class="form-control @if($errors->has('category')) is-invalid @endif">
        @if($errors->has('category'))
            <div class="invalid-feedback">
                {{$errors->first('category')}}
            </div>
        @endif
    </div>
    @endif
    @if(getDataLibellesTypePost($type)["canSaveDesignation"])
    <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label for="designation" class="col-form-label font-M-bold text-sm-right">
            Désignation
        </label>
        <input id="designation" type="text" value="{{old('designation', $post->designation)}}" name="designation" placeholder="Désignation"
               class="form-control @if($errors->has('title')) is-invalid @endif">
        @if($errors->has('designation'))
            <div class="invalid-feedback">
                {{$errors->first('designation')}}
            </div>
        @endif
    </div>
    @endif
    <div class="form-group col-lg-6 col-md-6 col-sm-12">
        <label for="image" class="col-form-label font-M-bold text-sm-right">
            {{$post->image != null ? " Changer l'image" : " Image"}}
        </label>
        <input id="image" type="file" name="image" class="form-control-file @if($errors->has('image')) is-invalid @endif">
        @if($errors->has('image'))
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
        @endif
    </div>
    @if($post->image != null)
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="" class="col-form-label font-M-bold text-sm-right">Ancienne image</label>
            <img src="{{asset('img/posts/'.$post->image)}}" alt="{{$post->image}}">
        </div>
    @endif

    <!-- icone -->
    @if(getDataLibellesTypePost($type)["canSaveIcone"])
    <div class="form-group col-lg-6 col-md-6 col-sm-12">
        <label for="image" class="col-form-label font-M-bold text-sm-right">
            {{$post->icone != null ? " Changer l'icône" : " Icône"}}
        </label>
        <input id="icone" type="file" name="icone" class="form-control-file @if($errors->has('icone')) is-invalid @endif">
        @if($errors->has('icone'))
            <div class="invalid-feedback">
                {{$errors->first('icone')}}
            </div>
        @endif
    </div>
        @if($post->icone != null)
        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label for="" class="col-form-label font-M-bold text-sm-right">Ancienne icône</label>
            <img src="{{asset('img/posts/'.$post->icone)}}" alt="{{$post->icone}}">
        </div>
        @endif
    @endif

    <!-- document -->
    @if(getDataLibellesTypePost($type)["canSaveDocument"])
    <div class="form-group col-lg-6 col-md-6 col-sm-12">
        <label for="document" class="col-form-label font-M-bold text-sm-right">
            {{$document != null ? "Changer le document" : " Document"}}
        </label>
        <input id="document" type="file" name="document" class="form-control-file @if($errors->has('document')) is-invalid @endif">
        @if($errors->has('document'))
            <div class="invalid-feedback">
                {{$errors->first('document')}}
            </div>
        @endif
    </div>
        @if($post->id != null && $document != null)
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="document" class="col-form-label font-M-bold text-sm-right">Ancien document</label>
                <div class="text-left">
                    <a title="Visualiser" target="_blank" href="{{route('admin.posts.document', ['type' => $type, 'post' => $post->id])}}">
                        <i class="fa fa-2x fa-eye text-success" title="Document"></i>
                    </a>
                </div>
            </div>
        @endif
    @endif
    <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label for="content" class="col-form-label font-M-bold text-sm-right">
            {{getDataLibellesTypePost($type)["contenu"]}}
        </label>
        <textarea name="content" id="content" cols="30" rows="10"
        class="summernote form-control @if($errors->has('content')) is-invalid @endif">{{old('content', $post->content)}}</textarea>
        @if($errors->has('content'))
            <div class="invalid-feedback">
                {{$errors->first('content')}}
            </div>
        @endif
    </div>
</div>
