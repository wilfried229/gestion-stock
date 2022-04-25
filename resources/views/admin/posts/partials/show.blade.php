<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">{{$post->title}}</h4>
        @if($post->designation != null)
        <small>{{$post->designation}}</small>
        @endif
    </div>
    <div class="pb-20 container">
        @if($post->category != null)
        <div class="row mb-2">
            <div class="col-lg-4 col-md-4 font-M-bold col-sm-4 text-left align-self-center">
                Catégorie :
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 text-left align-self-center">
                {{$post->category}}
            </div>
        </div>
        @endif
        @if($post->image != null)
        <div class="row">
            <div class="col-lg-4 col-md-4 font-M-bold col-sm-4 text-left align-self-center">
                Image :
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 text-left align-self-center">
                <img class="img-fluid" src="{{asset('img/posts/'. $post->image)}}" alt="{{$post->image}}">
            </div>
        </div>
        @endif
        @if($post->icone != null)
                <div class="row">
                    <div class="col-lg-4 col-md-4 font-M-bold col-sm-4 text-left align-self-center">
                        Icône :
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 text-left align-self-center">
                        <img class="img-fluid" src="{{asset('img/posts/'. $post->icone)}}" alt="{{$post->icone}}">
                    </div>
                </div>
            @endif
        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 col-sm-12 font-M-bold">
                {{getDataLibellesTypePost($type)["contenu"]}} :
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                {!! $post->content !!}
            </div>
        </div>

        @if($post->document()->first() != null)
        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                <div class="form-group">
                    <label for="" class="font-M-bold">Document attaché</label>
                    <div>
                        <a title="Visualiser" target="_blank" href="{{route('admin.posts.document', ['type' => $type, 'post' => $post->id])}}">
                            <i class="fa fa-2x fa-download text-success" title="Document"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
