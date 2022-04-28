<!-- Modal -->
<div class="modal fade" id="actionModalCommande" tabindex="-1" role="dialog" aria-labelledby="actionModalCommande" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    COMMANDE
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('commande.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label for="role" class="col-form-label text-sm-right">Produits</label>
                        <select name="type" id="type" class="form-control custom-select2" required style="width: 100%; height: 38px;">
                            <option selected disabled value="">Selectionnez</option>
                            @foreach($produits as $produit)
                                <option  value="{{$produit->id}}">{{$produit->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12 col-lg-12 col-sm-12">
                        <label for="quantity" class="col-form-label text-sm-right">Quantite </label>
                        <input id="quantity" type="number"  name="quantity" placeholder="quantity"
                               class="form-control @if($errors->has('quantity')) is-invalid @endif">
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">
                                {{$errors->first('quantity')}}
                            </div>
                        @endif
                    </div>


                    <div class="row mt-4 justify-content-center text-center">
                        <div class="form-group text-center">
                            <a href="{{route('commande.index')}}" class="btn btn-sm btn-space bg-secondary text-white">Annuler</a>
                            <button type="submit" class="btn btn-sm btn-space btn-primary text-white">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>

</div>
