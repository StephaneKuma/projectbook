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
                    <form class="row" action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="last_name" class="col-sm-3 col-form-label">{{ _('Nom') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required autofocus placeholder="{{ _('Nom de famille') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="first_name" class="col-sm-3 col-form-label">{{ _('Prénom(s)') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required placeholder="{{ _('Votre/vos prénom(s)') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="pseudo" class="col-sm-3 col-form-label">{{ _('Pseudo') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pseudo" name="pseudo" value="{{ $user->pseudo }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="email" class="col-sm-3 col-form-label">{{ _('Email') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="password" class="col-sm-3 col-form-label">{{ _('Mot de passe') }}</label>
                                        <div class="col-sm-9">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="password-confirm" class="col-sm-3 col-form-label">{{ _('Confirmez le mot de passe') }}</label>
                                        <div class="col-sm-9">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group col-12 pr-4">
                                        <div class="row">
                                            <label for="role_id" class="col-sm-3 col-form-label">{{ _('Rôle') }}</label>
                                            <div class="col-sm-9">
                                                <select name="role_id" id="role_id" class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">-- Chosir un rôle --</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pr-4">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ _('Image') }}</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input name="image" value="{{ old('image') }}" required type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="form-group col-12 pr-4">
                                            <div class="row">
                                                <label for="description" class="col-sm-3 col-form-label">{{ _('Description') }}</label>
                                                <div class="col-sm-9">
                                                    <textarea id="description" name="description class="textarea" placeholder="Parlez nous de vous"
                                                              style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
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
