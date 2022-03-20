<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <h3 style="color:#66EB9A">WE FASHION</h3>
        <a class="navbar-brand mx-2" href="{{ route('product.index') }}">
           Produits
        </a>
        <a class="navbar-brand" href="{{ route('category.index') }}">
            Catégories
         </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @if(Auth::guard('web')->check())
                <li class="nav-item dropdown" style="display:inline-block;margin-top: -7px;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endif
                        <li class="nav-item ">
                            <a style="color:#66EB9A" class="nav-link" href="{{ url('/') }}"><i class="bi bi-house-door-fill bi-lg"></i></a>
                        </li>

            </ul>
        </div>
    </div>
</nav>
