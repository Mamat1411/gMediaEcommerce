<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/GMEDIA FIX.png') }}" alt="GMedia Logo" style="width: 75px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="/?category={{ $category->name }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Brands
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($brands as $brand)
                            <li><a class="dropdown-item" href="/?brand={{ $brand->name }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <form action="/" class="d-flex">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('brand'))
                    <input type="hidden" name="brand" value="{{ request('brand') }}">
                @endif
                <input class="form-control" type="search" placeholder="Search..." name="search" value="{{ request('search') }}"
                    style="width: 350px">
                <button class="btn btn-primary mx-2" type="submit">Search</button>
            </form>
            <button class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
            </button>
            <a href="/login" class="btn btn-warning text-decoration-none ms-2"><i class="bi bi-box-arrow-in-right"></i>
                Login
            </a>
        </div>
    </div>
</nav>
