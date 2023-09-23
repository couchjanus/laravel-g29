<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBrandRequest;

use Illuminate\Support\Facades\Validator;

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
        return view('admin.brands.create', ['title'=>'Create Brand']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:30|min:5',
            'description' => 'required|min:15'
        ]);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        return redirect()->route('brands.index')->with("success", "Brand created successfully!");
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
        return view('admin.brands.edit', ['title'=>'Edit Brand', 'brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(UpdateBrandRequest $request, Brand $brand)
     {
         Brand::where('id', $brand->id)
         ->update([
             'name' => $request->name,
             'description' => $request->description
         ]);
         return redirect()->route('brands.index')->with("success", "Brand updated successfully!");;
     }

    // public function update(Request $request, Brand $brand)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|unique:brands|max:30|min:5',
    //         'description' => 'required|min:15'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('brands.edit', $brand->id)
    //         ->withErrors($validator)
    //         ->withInput();
    //     }
    //     $validated = $validator->validated();

    //     Brand::where('id', $brand->id)
    //     ->update([
    //         'name' => $request->name,
    //         'description' => $request->description
    //     ]);
    //     return redirect()->route('brands.index')->with("success", "Brand updated successfully!");;
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with("success", "Brand deleted successfully!");;
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
