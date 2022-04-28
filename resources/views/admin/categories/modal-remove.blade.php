<!-- Modal -->
<div class="modal fade" id="actionModalremoveCommentaire{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="actionModalAddOrRemoveTop" aria-hidden="true">
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
                Voulez-vous vraiment supprimmer cet commentaire ? <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Non</button>
                <button type="button" class="btn btn-sm @if($comment->id) btn-danger @else btn-success @endif" data-dismiss="modal"
                onclick="document.getElementById('retirer-a-form-{{$comment->id}}').submit()">Oui</button>
            </div>
        </div>
    </div>
    <form id="retirer-a-form-{{$comment->id}}" action="{{route('commentaire.remove',['commentaire'=>$comment->id])}}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
