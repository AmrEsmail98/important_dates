<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all();

        return view('admin.roles.index')->with($data);
    }

    public function create()
    {

        $data['permissions'] = Permission::all();

        return view('admin.roles.create')->with($data);
    }

    public function store(Request $request)
    {
       $request->validate([
        'name'=>'required|unique:roles',
        'permissions' =>'required'
       ]);

        $role = Role::create($request->only('name'));

        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.index');
    }


    public function edit($id)
    {
        $role=Role::find($id);
        $data['permissions'] = Permission::all();
        return view('admin.roles.edit', compact('role'))->with($data);
    }

    public function update(Request $request , Role $role)

    {
        $request->validate([
          'name'=>'required|unique:roles,name,' . $role->id,
          'permissions' => 'required|array'
         ]);

        $role->update([
            'name' => request()->name

      ]);
      $role->permissions()->sync($request->permissions);


        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
               Role::where('id',$id)->delete();
               return back()->with('post_delete','Post has been deleted successfully!');

    }
}
