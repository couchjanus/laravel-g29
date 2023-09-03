<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \DB::table('categories')->get();
        return view('admin.categories.index', ['title'=> "Categories Management", 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create', ['title'=> "New Category"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $request->status ? 1 : 0;

        if (isset($request->name)) {
            \DB::table('categories')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $status,
                'created_at' => now()
            ]);
            return redirect('admin/categories');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = \DB::table('categories')->find($id);

        return view('admin.categories.edit', ['title'=>"Edit Category", 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $errors = [];
        $status = $request->status ? 1 : 0;

        if(isset($request->name)){
            \DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $status,
                'updated_at' => now()
            ]);
            return redirect('admin/categories');
        }else{
            if(!isset($request->name)) {
                $errors['name'] = "Name is required!";
            }
            return back()->withInput()->withErrors($errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \DB::table('categories')->where('id', $id)->delete();
        return redirect('admin/categories');
    }
}
