@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-block btn-primary"><i class="fa fa-bars"></i> {{ _("Gérer les rôles") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="{{ route('admin.roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="role_name" class="col-sm-3 col-form-label">{{ _('Nom') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->name }}" required autofocus placeholder="{{ _('Nom du rôle') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                                        <button type="reset" class="btn btn-lg btn-warning">Annuler</button>
                                    </div>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
