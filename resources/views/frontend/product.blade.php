{{-- products page --}}
@extends('frontend.layouts.app')

@section('content')

  <div class="container">
    <div class="row mx-2 ">

        <div class="col-md-8">

            <div class="card" style="width: 100%;">
                <img src="{{asset('storage/'.$product->picture)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">{{$product->description}}</p>
                </div>
              </div>

        </div>
        <div class="col-md-4">

            <h3>{{$product->name}}</h3>
            <h4>{{$product->price}} €</h4>
            <select class="form-select mb-3" aria-label="Default select example" id="select">
                <option selected>La taille</option>
            </select>

              <button type="submit" class="btn btn-block btn-lg btn-success"> <i class="bi bi-basket"></i> acheter</button>


        </div>


      </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    var size ="{{$product->size}}";
    var tab = size.split(',');

    tab.forEach(myFunction);
    function myFunction(item) {
        $( "#select" ).append('<option value="'+item+'">'+item+'</option>');
    }

    </script>
@endsection

