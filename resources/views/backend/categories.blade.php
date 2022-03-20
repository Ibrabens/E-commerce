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
                    <a href="{{route('category.create')}}" class=" btn btn-circle btn-success ">
                        Nouveau
                    </a>
                </ul>


            </div>


            <div class="card-body">
                <table class="table aiz-table ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a class="btn btn-warning btn-icon btn-circle btn-sm" href="{{route('category.edit',$category->id)}}" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{-- <form  action="{{route('category.destroy', $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form> --}}
                                <a class="btn btn-danger btn-icon btn-circle btn-sm confirm-delete" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$category->id}}" data-id="{{$category->id}}" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>


                            </td>
                        </tr>
                        <div class="modal fade" id="ModalDelete{{$category->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> Supprimer Categorie</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="close" >
                                            <span aria-hidden="true">&times;</span>

                                        </button>

                                    </div>
                                    <form action="{{route('category.destroy', $category->id)}}" method="POST" enctype="multipart/form-data">
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

            </div>
        </div>
    </div>


@endsection

