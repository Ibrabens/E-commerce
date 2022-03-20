@extends('backend.layouts.app')


@section('content')
    <div class='container'>


        <div class="card">
            <div class=" card-header bg-white ">
                <span class="h4"> Ajouter Categorie</span>
            </div>

            <div class="card-body">

                <form action="{{route('category.update',$category->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class=" @error('name') is-invalid @enderror form-control" id="name" name="name" value="{{$category->name}}">
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class=" @error('description') is-invalid @enderror form-control" id="description" rows="3" name="description" >{{$category->description}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>



            </div>
        </div>
    </div>
@endsection
