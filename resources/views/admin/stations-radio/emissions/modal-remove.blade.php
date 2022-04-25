<!-- Modal -->
<div class="modal fade" id="actionModalremoveEmission{{$emission->id}}" tabindex="-1" role="dialog" aria-labelledby="actionModalAddOrRemoveTop" aria-hidden="true">
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
                Voulez-vous vraiment retirer {{$emission->nom}} des emission de la radio {{$radio->nom}}<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Non</button>
                <button type="button" class="btn btn-sm @if($emission->id) btn-danger @else btn-success @endif" data-dismiss="modal"
                onclick="document.getElementById('retirer-a-form-{{$emission->id}}').submit()">Oui</button>
            </div>
        </div>
    </div>
    <form id="retirer-a-form-{{$emission->id}}" action="{{route('admin.radio.emission.destroy',['radio'=>$radio->id,'emission'=>$emission->id]) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        @method('DELETE')
    </form>
</div>
