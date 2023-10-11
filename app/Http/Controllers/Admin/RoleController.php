<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\{Permission, Role};

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name','id')->groupBy('name')->get();

       $custom_permission = array();

       foreach($role_permission as $per){
           $key = substr($per->name, 0, strpos($per->name, "."));
           if(str_starts_with($per->name, $key)){
               $custom_permission[$key][] = $per;
           }
       }
       return view('admin.roles.create')->with('permissions',$custom_permission);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        foreach($request->permissions as $permission)
        {
          if($p = Permission::where('id', '=', $permission)->first())
          {
            $role->givePermissionTo($p);
          }
        }

        session()->flash('success', 'role was added successfully!');

        return redirect()->route('roles.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
