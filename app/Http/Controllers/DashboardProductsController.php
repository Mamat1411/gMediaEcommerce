<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products.index', [
            'title' => 'Dashboard Products',
            'products' => Product::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'title' => 'Add New Product',
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'categoryId' => 'required',
            'brandId' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required'
        ]);

        Product::create($validatedData);
        return redirect('/dashboard/products')->with('status', 'New Product Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.products.detail', [
            'title' => $product->name,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'title' => 'Edit Existing Product',
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'categoryId' => 'required',
            'brandId' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required'
        ]);

        Product::where('id', $product->id)->update($validatedData);
        return redirect('/dashboard/products')->with('status', 'Product '. $product->name .' Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/dashboard/products') -> with('status', 'Product Deleted');
    }
}
