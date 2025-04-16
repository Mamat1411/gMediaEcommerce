<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'slug' => 'required|unique:products',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'product_image' => 'image|file|max:2048',
            'description' => 'required'
        ]);
        // $validatedData = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'slug' => 'required|unique:products',
        //     'category_id' => 'required',
        //     'brand_id' => 'required',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'product_image' => 'image|file|max:2048',
        //     'description' => 'required'
        // ]);
        // if ($validatedData->fails()) {
        //     return $validatedData->errors();
        // }

        $product_image = null;
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Ymd", time()).'-'.$validatedData['slug'].'.'.$extension;
            $uploadedFile = $file->storeAs('product-images/', $filename);
            $product_image = $uploadedFile;
        }

        $validatedData['product_image'] = $product_image;

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
            'slug' => ['required', Rule::unique('products')->ignore($product)],
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'product_image' => 'image|file|max:2048',
            'description' => 'required'
        ]);

        $product_image = $product->product_image;
        if ($request->hasFile('product_image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Ymd", time()).'-'.$validatedData['slug'].'.'.$extension;
            $uploadedFile = $file->storeAs('product-images/', $filename);
            $product_image = $uploadedFile;
        }

        $validatedData['product_image'] = $product_image;

        Product::where('id', $product->id)->update($validatedData);
        return redirect('/dashboard/products')->with('status', 'Product '. $product->name .' Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }
        Product::destroy($product->id);
        return redirect('/dashboard/products') -> with('status', 'Product Deleted');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
