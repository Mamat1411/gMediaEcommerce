@extends('layouts.main')
@section('container')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
            </div>
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
                                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                                    <a href="/?category={{ $product->category->name }}" class="text-decoration-none text-white">{{ $product->category->name }}</a>
                                </div>
                                <!-- Product image-->
                                <img class="card-img-top" src="https://picsum.photos/450/300?{{ $product->category->name }}" alt="Product Image" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><a href="/detail/{{ $product->slug }}" class="text-decoration-none">{{ $product->name }}</a></h5>
                                        <!-- Product price-->
                                        Rp @convert($product->price),-
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
                                    <div class="text-center"><a class="btn btn-info mt-auto mx-2" href="/detail/{{ $product->slug }}">Detail</a></div>
                                    <div class="text-center"><a class="btn btn-warning mt-auto" href="#">Add to cart</a></div>
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
            <p class="text-center fs-4">No Products Found</p>
        </div>
    @endif
@endsection
