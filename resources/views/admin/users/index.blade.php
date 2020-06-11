@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Ajouter un utilisateur") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12 card">
            <div class="card-header">
              <h3 class="card-title">Liste des utilisateurs</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="projectForms" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom(s)</th>
                  <th>Pseudo</th>
                  <th>Rôle</th>
                  <th>email</th>
                  <th>image</th>
                  <th>description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->pseudo }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                @if(Storage::disk('public')->exists('user_thumbnails/'.$user->thumb))
                                    <img src="{{Storage::url('user_thumbnails/'.$user->thumb)}}" alt="{{$user->name}}" class="img-responsive img-rounded">
                                @endif
                            <td>{{ $user->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">view</i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteDF({{$user->id}})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" id="del-drugForm-{{$user->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prénom(s)</th>
                    <th>Pseudo</th>
                    <th>Rôle</th>
                    <th>email</th>
                    <th>image</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
@endsection
