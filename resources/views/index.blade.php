@extends('layouts.main')
@section('container')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://source.unsplash.com/450x300?{{ $product->category->name }}" alt="Product Image" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a href="/detail/{{ $product->name }}" class="text-decoration-none">{{ $product->name }}</a></h5>
                                    <!-- Product price-->
                                    Rp @convert($product->price) ,-
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
                                <div class="text-center"><a class="btn btn-info mt-auto mx-2" href="/detail/{{ $product->name }}">Detail</a></div>
                                <div class="text-center"><a class="btn btn-warning mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $products->links() }}
    </section>
@endsection
