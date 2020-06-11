<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $links = [];
        $link_1 = "<li class='breadcrumb-item active'><a href=" . route('admin.roles.index') . ">Rôles</a></li>";
        $links[] = $link_1;
        $title = "Rôles";
        return view('admin.roles.index', compact('roles', 'links', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.roles.index') . ">Rôles</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.roles.create') . ">Ajotuter</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Ajouter un rôle";
        return view('admin.roles.create', compact('links', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string'
        ]);

        $role = new Role();
        $role->name = $request->role_name;
        $role->save();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.roles.index') . ">Rôles</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.roles.show', $id) . ">$role->name</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = $role->name;
        return view('admin.roles.show', compact('links', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.roles.index') . ">Rôles</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.roles.edit', $id) . ">$role->name</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Modifier $role->name";
        return view('admin.roles.show', compact('links', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|string'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->role_name;
        $role->save();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return back();
    }
}
