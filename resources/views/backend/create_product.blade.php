@extends('backend.layouts.app')
@section('content')

    <div class='container'>


        <div class="card">
            <div class=" card-header bg-white ">
                <span class="h4"> Ajouter Produit</span>
            </div>

            <div class="card-body">

                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text"  class="@error('name') is-invalid @enderror form-control" id="name" name="name">
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reference" class="form-label">Reference</label>
                        <input type="text" class="@error('reference') is-invalid @enderror form-control" id="reference" name="reference">
                        @error('reference')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <select class="@error('category_id') is-invalid @enderror form-select mb-3" aria-label="Default select example" name="category_id">
                        <option selected>Categorie</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="@error('description') is-invalid @enderror form-control" id="description" rows="2" name="description"></textarea>
                        @error('description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" class="@error('price') is-invalid @enderror form-control" id="price" name="price">
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                        <label class="form-label">Tailles disponibles </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="size[]" id="xs" value="XS">
                            <label class="form-check-label" for="xs">XS</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="size[]" id="s" value="S">
                        <label class="form-check-label" for="s">S</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="size[]" id="m" value="M">
                        <label class="form-check-label" for="m">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="size[]" id="l" value="L">
                        <label class="form-check-label" for="l">L</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="size[]" id="xl" value="XL">
                        <label class="form-check-label" for="xl">XL</label>
                        </div>
                        @error('size')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="@error('picture') is-invalid @enderror form-control" type="file" id="picture" name="picture">
                            @error('picture')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-check form-check-inline">
                        <input class="@error('visible') is-invalid @enderror form-check-input" type="radio" name="visible" id="publie" value="1">
                        <label class="form-check-label" for="publie">publié</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="@error('visible') is-invalid @enderror form-check-input" type="radio" name="visible" id="non_publie" value="0">
                        <label class="form-check-label" for="non_publie">non publié</label>
                        </div>
                        @error('visible')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <br>

                        <div class="form-check form-check-inline">
                        <input class="@error('state') is-invalid @enderror form-check-input" type="radio" name="state" id="standard" value="standard">
                        <label class="form-check-label" for="standard">standard</label>
                        </div>
                        <div class="form-check form-check-inline mb-4">
                        <input class="@error('state') is-invalid @enderror form-check-input" type="radio" name="state" id="en_solde" value="solde">
                        <label class="form-check-label" for="en_solde">en solde</label>
                        </div>
                        @error('state')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror


                    <button type="submit" class="btn btn-success form-control mb-3">Submit</button>
                  </form>



            </div>
        </div>
    </div>
@endsection
