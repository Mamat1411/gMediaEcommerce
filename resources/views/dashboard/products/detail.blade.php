@extends('dashboard.layouts.main')
@section('container')
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                @if ($product->product_image != null)
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" />
                @else
                    <img class="card-img-top mb-5 mb-md-0" src="https://picsum.photos/600/700?{{ $product->category->name }}" alt="Product Image" />
                @endif
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5">
                    <span>in <a href=""
                            class="text-decoration-none">{{ $product->category->name }}</a></span>
                    <span>By <a href=""
                            class="text-decoration-none">{{ $product->brand->name }}</a></span>
                </div>
                <div class="fs-5 mb-5">
                    <span>Rp @convert($product->price),-</span>
                </div>
                <p class="lead">{!! $product->description !!}</p>
                <div class="d-flex">
                    <button class="btn btn-dark disabled">Stock: {{ $product->stock }}</button>
                    <a href="/dashboard/products" class="btn btn-warning text-decoration-none ms-2">Back To Products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
