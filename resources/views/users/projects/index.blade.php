@extends('layouts.users.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('users.projects.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Ajouter un projet") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12 card">
            <div class="card-header">
              <h3 class="card-title">Liste des projets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="projectForms" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>About</th>
                        <th>Description</th>
                        <th>Document</th>
                        <th>Source Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="text-center">
                                @if(Storage::disk('public')->exists('project_thumbnails/' . $project->thumb))
                                    <img src="{{Storage::url('project_thumbnails/' . $project->thumb)}}" alt="{{ $project->thumb }}" class="img-responsive img-rounded">
                                @endif
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->about }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->document }}</td>
                            <td>{{ $project->source_code }}</td>

                            <td class="text-center">
                                <a href="{{ route('users.projects.show', $project->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">view</i>
                                </a>
                                <a href="{{ route('users.projects.edit', $project->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteDF({{ $project->id }})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{ route('users.projects.destroy', $project->id) }}" method="POST" id="del-drug-{{ $project->id }}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>About</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Source Code</th>
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
