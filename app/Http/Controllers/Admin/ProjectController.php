<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item active'><a href=" . route('admin.projects.index') . ">Projets</a></li>";
        $links[] = $link_1;
        $title = "Liste des projets";
        $projects = Project::all();
        return view('admin.projects.index', compact('projects', 'links', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.projects.index') . ">Projets</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.projects.index') . ">Ajouté</a></li>";
        $links[] = $link_1;
        $title = "Ajouter un nouveau projet";
        $sectors = Sector::all();
        $users = User::all();
        return view('admin.projects.create', compact('sectors', 'users', 'links', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
