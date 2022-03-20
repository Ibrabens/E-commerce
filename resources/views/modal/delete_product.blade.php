

    <div class="modal fade" id="ModalDelete{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Supprimer Produit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close" >
                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>
                <form action="{{route('product.destroy', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                <div class="modal-body" > Voulez vous confirmer la suppression ?</div>

                <div class="moda-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-danger" >Confirmer</button>
                </div>
            </form>
            </div>
        </div>

    </div>

