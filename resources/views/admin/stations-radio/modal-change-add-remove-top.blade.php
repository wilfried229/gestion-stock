<!-- Modal -->
<div class="modal fade" id="actionModalAddOrRemoveTop{{$radio->id}}" tabindex="-1" role="dialog" aria-labelledby="actionModalAddOrRemoveTop" aria-hidden="true">
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
                Voulez-vous vraiment {{$radio->top ? ' retirer cette radio de ': ' mettre cette radio dans'}} la liste des TOP ? <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Non</button>
                <button type="button" class="btn btn-sm @if($radio->top) btn-danger @else btn-success @endif" data-dismiss="modal"
                onclick="document.getElementById('form_add_or_remove_top_{{$radio->id}}').submit()">Oui</button>
            </div>
        </div>
    </div>
    <form action="{{route("admin.radio.change-top-status", ['radio' => $radio->id])}}" method="post" id="form_add_or_remove_top_{{$radio->id}}">
        @csrf
    </form>
</div>
