@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Ajouter un rôle") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12 card">
            <div class="card-header">
              <h3 class="card-title">Liste des rôles</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="projectForms" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteRole({{$role->id}})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" id="del-role-{{$role->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
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
