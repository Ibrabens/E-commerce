<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="navbar-brand mx-2"  style="color:#66EB9A" href="{{ url('/') }}">
            WE FASHION
         </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand mx-2" href="{{ route('solde.products') }}">
                SOLDES
             </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand mx-2" href="{{route('homme.products')}}">
                HOMME
             </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand mx-2" href="{{route('femme.products')}}">
                FEMME
             </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
