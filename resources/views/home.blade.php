@extends('backend.layouts.app')


@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    @if (session()->has('error'))
      <div class="alert alert-danger">
        {{ session()->get('error') }}
      </div>
    @endif
    <div class='container'>
        <div class="card">
            <div class=" card-header bg-white ">
                <ul class="nav justify-content-end">
                    <a  href="{{route('product.create')}}" class=" btn btn-circle btn-success ">
                        Nouveau
                    </a>
                </ul>


            </div>


            <div class="card-body">
                <table class="table aiz-table ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->state}}</td>
                            <td>
                                <a class="btn btn-warning btn-icon btn-circle btn-sm" href="{{route('product.edit',$product->id)}}" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a class="btn btn-danger btn-icon btn-circle btn-sm confirm-delete"  data-bs-toggle="modal" data-bs-target="#ModalDelete{{$product->id}}" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="ModalDelete{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> Supprimer Produit</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="close" >
                                            <span aria-hidden="true">&times;</span>

                                        </button>

                                    </div>
                                    <form action="{{route('product.destroy', $product->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                    <div class="modal-body" > Voulez vous confirmer la suppression ?</div>

                                    <div class="moda-footer">
                                        <button type="button" class="btn gray btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-outline-danger" >Confirmer</button>
                                    </div>
                                </form>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </tbody>
                </table>
                     <div class="aiz-pagination">
                        {{ $products->appends(request()->input())->links() }}
                    </div>
            </div>
        </div>
    </div>


@endsection
