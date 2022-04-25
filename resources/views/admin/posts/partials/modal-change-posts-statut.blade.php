<!-- Modal -->
<div class="modal fade" id="actionModalArticle{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Confirmation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(in_array($post->statut, [env('STATUT_PUBLIE')]))
                    Voulez-vous vraiment supprimer : <br>
                @else
                    Voulez-vous vraiment publier : <br>
                @endif
                {{$post->title}} ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Non</button>
                <button type="button" class="btn btn-sm @if(in_array($post->statut, [env('STATUT_PUBLIE')])) btn-danger @else btn-success @endif" data-dismiss="modal"
                onclick="document.getElementById('form_change_statut_{{$post->id}}').submit()">Oui</button>
            </div>
        </div>
    </div>
    <form action="{{route("admin.posts.change-statut", ["type" => $type, 'post' => $post->id])}}" method="post" id="form_change_statut_{{$post->id}}">
        @csrf
    </form>
</div>
