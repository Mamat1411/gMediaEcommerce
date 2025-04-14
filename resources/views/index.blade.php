@extends('layouts.main')
@section('container')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <!-- Header-->
    <header class="bg-dark py-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/carousel1.jpg') }}" class="d-block w-100" alt="Carousel 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel2.jpg') }}" class="d-block w-100" alt="Carousel 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel3.jpg') }}" class="d-block w-100" alt="Carousel 3">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <!-- Section-->
    @if ($products->count())
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row justify-content-center">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="position-absolute px-3 py-2 text-white"
                                    style="background-color: rgba(0, 0, 0, 0.7)">
                                    <a href="/?category={{ $product->category->name }}"
                                        class="text-decoration-none text-white">{{ $product->category->name }}</a>
                                </div>
                                <!-- Product image-->
                                <img class="card-img-top" src="https://picsum.photos/450/300?{{ $product->category->name }}"
                                    alt="Product Image" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><a href="/detail/{{ $product->slug }}"
                                                class="text-decoration-none">{{ $product->name }}</a></h5>
                                        <!-- Product price-->
                                        Rp @convert($product->price),-
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
                                    <div class="text-center"><a class="btn btn-info mt-auto mx-2"
                                            href="/detail/{{ $product->slug }}">Detail</a></div>
                                    <div class="text-center"><a class="btn btn-warning mt-auto" href="#">Add to
                                            cart</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $products->links() }}
        </section>
    @else
        <div class="container-my-3">
            <h2 class="text-center">No Products Found</h2>
        </div>
    @endif
@endsection
