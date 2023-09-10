<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $brands = Brand::all();
        $brands = Brand::paginate(10);
        return view('admin.brands.index', ['title'=>'Brand List', 'brands'=>$brands]);
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
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }


    public function trashed()
    {
        $brands = Brand::onlyTrashed()->get();
        return view('admin.brands.trashed', ['title' => 'All Trashed Brands', 'brands' => $brands]);
    }

    public function restore($id)
    {
        Brand::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect(route('brands.trashed'));
    }

    public function force($id)
    {
        $brand = Brand::withTrashed()->where('id', $id)->first();
        $brand->forceDelete();
        return redirect(route('brands.index'));
    }
}
