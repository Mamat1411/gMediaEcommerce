@extends('layouts.main')
@section('container')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://source.unsplash.com/600x700?{{ $product->category->name }}" alt="Product Image" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5">
                        <span>in <a href="/?category={{ $product->category->name }}" class="text-decoration-none">{{ $product->category->name }}</a></span>
                        <span>By <a href="/?brand={{ $product->brand->name }}" class="text-decoration-none">{{ $product->brand->name }}</a></span>
                    </div>
                    <div class="fs-5 mb-5">
                        <span>Rp @convert($product->price),-</span>
                    </div>
                    <p class="lead">{!! $product->description !!}</p>
                    <div class="d-flex">
                        <button class="btn btn-dark disabled">Stock: {{ $product->stock }}</button>
                        <button class="btn btn-outline-dark flex-shrink-0 mx-2" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($relatedProducts as $related)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://source.unsplash.com/450x300?{{ $related->category->name }}" alt="Product Image" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a href="/detail/{{ $related->name }}" class="text-decoration-none">{{ $related->name }}</a></h5>
                                    <!-- Product price-->
                                    Rp @convert($related->price),-
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
