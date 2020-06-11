<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $links = [];
        $link_1 = "<li class='breadcrumb-item active'><a href=" . route('admin.users.index') . ">Utilisateurs</a></li>";
        $links[] = $link_1;
        $title = "Utilisateurs";
        return view('admin.users.index', compact('users', 'links', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.users.index') . ">Utilisateurs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.users.create') . ">Ajouté</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Utilisateurs";
        $roles = Role::all();
        return view('admin.users.create', compact('roles', 'links', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file('image'));
        $request->validate([
            'role_id' => 'required',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'pseudo' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
            'description' => 'sometimes|max:255'
        ]);

        $name = $request->last_name . " " . $request->first_name;
        $slug = Str::slug($name);
        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('users')) {
                Storage::disk('public')->makeDirectory('users');
            }

            $user_image = Image::make($image)->resize(150, 150);
            $user_image = $user_image->stream();
            Storage::disk('public')->put('users/'.$image_name, $user_image);

            if (!Storage::disk('public')->exists('user_thumbnails')) {
                Storage::disk('public')->makeDirectory('user_thumbnails');
            }

            $user_thumb = Image::make($image)->resize(25, 25);
            $user_thumb = $user_thumb->stream();
            Storage::disk('public')->put('user_thumbnails/'.$image_thumb, $user_thumb);
        }

        $user = new User();

        $user->role_id = $request->role_id;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->pseudo = $request->pseudo;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $image_name;
        $user->thumb = $image_thumb;
        $user->description = $request->description;
        $user->save();

        Toastr::success('Succès', 'L\'utilisateur a bien été ajouté.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.users.index') . ">Utilisateurs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.users.show', $id) . ">$user->pseudo</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Détails de $user->pseudo";
        return view('admin.users.show', compact('user', 'links', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('admin.users.index') . ">Utilisateurs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('admin.users.edit', $id) . ">Modifier $user->pseudo</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Modifier $user->pseudo";
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles', 'links', 'title'));
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
            'role_id' => 'required',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'pseudo' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'sometimes|string|min:8|confirmed',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
            'description' => 'sometimes|max:255'
        ]);

        $name = $request->last_name . " " . $request->first_name;
        $slug = Str::slug($name);
        $image = $request->file('image');

        $user = User::find($id);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('users')) {
                Storage::disk('public')->makeDirectory('users');
            }
            if(Storage::disk('public')->exists('users/'.$user->image)){
                Storage::disk('public')->delete('users/'.$user->image);
            }

            $user_image = Image::make($image)->resize(150, 150);
            $user_image = $user_image->stream();
            Storage::disk('public')->put('users/'.$image_name, $user_image);

            if (!Storage::disk('public')->exists('user_thumbnails')) {
                Storage::disk('public')->makeDirectory('user_thumbnails');
            }
            if(Storage::disk('public')->exists('user_thumbnails/'.$user->thumb)){
                Storage::disk('public')->delete('user_thumbnails/'.$user->thumb);
            }

            $user_thumb = Image::make($image)->resize(25, 25);
            $user_thumb = $user_thumb->stream();
            Storage::disk('public')->put('user_thumbnails/'.$image_thumb, $user_thumb);
        }

        $user->role_id = $request->role_id;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->pseudo = $request->pseudo;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $image_name;
        $user->thumb = $image_thumb;
        $user->description = $request->description;
        $user->save();

        Toastr::success('Succès', 'L\'utilisateur a bien été modifié.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(Storage::disk('public')->exists('users/'.$user->image)){
            Storage::disk('public')->delete('users/'.$user->image);
        }

        if(Storage::disk('public')->exists('user_tumbnails/'.$user->thumb)){
            Storage::disk('public')->delete('user_tumbnails/'.$user->thumb);
        }

        $user->delete();

        Toastr::success('Succès', 'L\'utilisateur a bien été supprimé.');
        return back();
    }
}
