<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::all();
        $links = [];
        $link_1 = "<li class='breadcrumb-item active'><a href=" . route('admin.sectors.index') . ">Filières</a></li>";
        $links[] = $link_1;
        $title = "Filières";
        return view('admin.sectors.index', compact('sectors', 'links', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.sectors.index') . ">Filièesr</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.sectors.create') . ">Ajouté</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Ajouté une filière";
        return view('admin.sectors.create', compact('links', 'title'));
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
            'sector_name' => 'required|string',
            'label' => 'required|string',
            'description' => 'sometimes|max:255',
        ]);

        $sector = new Sector();
        $sector->name = $request->sector_name;
        $sector->label = $request->label;
        $sector->description = $request->description;
        $sector->save();

        Toastr::success('Succès', 'La filière a bien été ajouté.');
        return redirect()->route('admin.sectors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = Sector::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.sectors.index') . ">Filières</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.sectors.show', $id) . ">$sector->pseudo</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Détails de $sector->pseudo";
        return view('admin.sectors.show', compact('sector', 'links', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.sectors.index') . ">Filières</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.sectors.show', $id) . ">Modifier $sector->pseudo</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Modifier $sector->pseudo";
        return view('admin.sectors.edit', compact('sector', 'links', 'title'));
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
            'sector_name' => 'required|string',
            'label' => 'required|string',
            'description' => 'sometimes|max:255',
        ]);

        $sector = Sector::find($id);
        $sector->name = $request->sector_name;
        $sector->label = $request->label;
        $sector->description = $request->description;
        $sector->save();

        Toastr::success('Succès', 'La filière a bien été modifié.');
        return redirect()->route('admin.sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);

        $sector->delete();

        Toastr::success('Succès', 'La filière a bien été supprimé.');
        return redirect()->route('admin.sectors.index');
    }
}
