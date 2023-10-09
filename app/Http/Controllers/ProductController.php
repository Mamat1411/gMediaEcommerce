<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'title' => 'Shop Homepage',
            'products' => Product::latest()->filter(request(['search', 'category', 'brand']))->paginate(6)->withQueryString(),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $relatedProducts = Product::where('categoryId', $product->categoryId)->orWhere('brandId', $product->brandId)->limit(4)->get();
        return view('detail', [
            'title' => $product->name,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
