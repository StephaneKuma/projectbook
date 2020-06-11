@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.sectors.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Ajouter une filière") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12 card">
            <div class="card-header">
              <h3 class="card-title">Liste des filières</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="projectForms" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Libelé</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($sectors as $sector)
                        <tr>
                            <td>{{ $sector->name }}</td>
                            <td>{{ $sector->label }}</td>
                            <td>{{ $sector->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.sectors.show', $sector->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">view</i>
                                </a>
                                <a href="{{ route('admin.sectors.edit', $sector->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteRole({{$sector->id}})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{ route('admin.sectors.destroy', $sector->id) }}" method="POST" id="del-role-{{$sector->id}}" style="display:none;">
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
                    <th>Libelé</th>
                    <th>Description</th>
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
