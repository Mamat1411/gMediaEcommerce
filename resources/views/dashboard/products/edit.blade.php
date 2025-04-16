@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h2">Edit Existing Product</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/products/{{ $product->slug }}" method="post"  enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Product Name Here" value="{{ old('name', $product->name) }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    placeholder="Product Slug Here" value="{{ old('slug', $product->slug) }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select mb-3 @error('category_id') is-invalid @enderror" id="category_id"
                    name="category_id">
                    <option>--Please Select Product Category--</option>
                    @foreach ($categories as $category)
                        @if (old('category_id', $product->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select mb-3 @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id">
                    <option>--Please Select Product Brand--</option>
                    @foreach ($brands as $brand)
                        @if (old('brand_id', $product->brand_id) == $brand->id)
                            <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                        @else
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" placeholder="Product Price Here" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                    name="stock" placeholder="Product Stock Here" value="{{ old('stock', $product->stock) }}" required>
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="hidden" name="oldImage" value="{{ $product->product_image }}">
                <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                <div class="col-sm-8">
                    <input class="form-control col-sm-8 mb-sm-2 @error('product_image') is-invalid @enderror" type="file" name="product_image" id="product_image"
                        onchange="previewImage()">
                    @error('product_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Related Photo" class="img-preview img-fluid" width="300" height="300">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="description" type="hidden" name="description" value="{{ old('description', $product->description) }}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="/dashboard/products" class="btn btn-info text-decoration-none">Back to Products</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/trixEditor.js') }}"></script>
    <script src="{{ asset('js/Product.js') }}"></script>
@endsection
