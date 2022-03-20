{{-- products page --}}
@extends('frontend.layouts.app')

@section('content')

  <div class="container">
    <ul class="nav justify-content-end">
        <li class="nav-item">
          <span >{{$count}} résultats</span>
        </li>

      </ul>
    <div class="row row-cols-1 row-cols-md-3 g-4">
         @foreach ($products as $product)
        <div class="col">
          <div class="card h-100">
              <a  href="{{route('show.product',$product->id)}}">
                  <img src="{{asset('storage/'.$product->picture)}}" class="card-img-top" alt="...">
                </a>
                  <div class="card-body">
                    <h5 class="card-title">{{$product->price}} €</h5>
                    <p class="card-text">{{$product->name}}</p>
                  </div>
          </div>
        </div>
        @endforeach

      </div>






  </div>
  <div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>
@endsection
