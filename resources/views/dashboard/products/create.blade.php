@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h2">Add New Product</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Product Name Here" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    placeholder="Product Slug Here" value="{{ old('slug') }}" required>
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
                        @if (old('category_id') == $category->id)
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
                        @if (old('brand_id') == $brand->id)
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
                    name="price" placeholder="Product Price Here" value="{{ old('price') }}" required>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                    name="stock" placeholder="Product Stock Here" value="{{ old('stock') }}" required>
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input class="form-control @error('product_image') is-invalid @enderror" type="file" id="product_image"
                    name="product_image" onchange="previewImage()">
                <small class="ml-3 pt-2" style="color: red">**Maximum Image Size 2MB</small>
                @error('product_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="product_image" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-8">
                    <img class="img-preview img-fluid" alt="Product Related Photo" width="300" height="300">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="/dashboard/products" class="btn btn-info text-decoration-none">Back to Products</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/trixEditor.js') }}"></script>
    <script src="{{ asset('js/Product.js') }}"></script>
@endsection
