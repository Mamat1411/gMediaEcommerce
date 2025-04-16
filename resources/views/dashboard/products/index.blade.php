@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h2">Products List</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard/products/create" class="btn btn-primary text-decoration-none my-3">Add New Product</a>
    <table class="table table-responsive table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->brand->name }}</td>
                    <td>Rp @convert($product->price),-</td>
                    <td>{{ $product->stock }}</td>
                    <td class="text-center">
                        @if ($product->product_image != null)
                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Related Photo" class="img-fluid" width="200" height="200" style="max-width: 200px; max-height: 200px">
                        @else
                            <img src="https://picsum.photos/200/200?{{ $product->category->name }}" alt="Product Related Photo" class="img-fluid" width="200" height="200">
                        @endif
                    </td>
                    <td>
                        <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-primary"><i
                                class="bi bi-eye"></i></a>
                        <a href="/dashboard/products/edit/{{ $product->slug }}" class="badge bg-success"><i class="bi bi-pencil-square"></i></a>
                        <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
