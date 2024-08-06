<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.brand.index', [
            'title' => "Brand Dashboard",
            'brands' => Brand::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brand.create', [
            'title' => "Add New Brand"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands'
        ]);

        Brand::create($validatedData);
        return redirect('/dashboard/brand')->with('status', 'New Brand Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.brand.edit', [
            'title' => "Edit Brand",
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories')->ignore($brand)]
        ]);

        Brand::where('slug', $brand->slug)->update($validatedData);
        return redirect('/dashboard/brand')->with('status', 'Brand ' . $brand->name . ' Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);
        return redirect('/dashboard/brand')->with('status', 'Brand Deleted');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Brand::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
