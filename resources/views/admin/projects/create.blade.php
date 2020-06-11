@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-block btn-primary"><i class="fa fa-bars"></i> {{ _("Gérer les projets") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="user_id" class="col-sm-3 col-form-label">{{ _('Utilisateur') }}</label>
                                        <div class="col-sm-9">
                                            <select name="user_id" id="user_id" class="form-control select2bs4" style="width: 100%;">
                                                <option selected="selected">-- Chosir un utilisateur --</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->last_name . " " . $user->first_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="sector_id" class="col-sm-3 col-form-label">{{ _('Filière') }}</label>
                                        <div class="col-sm-9">
                                            <select name="sector_id" id="sector_id" class="form-control select2bs4" style="width: 100%;">
                                                <option selected="selected">-- Chosir une filière --</option>
                                                @foreach ($sectors as $sector)
                                                    <option value="{{ $sector->id }}">{{ $sector->label . " --- " . $sector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
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
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="title" class="col-sm-3 col-form-label">{{ _('Titre') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="{{ _('Titre du projet') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group col-12 pr-4">
                                        <div class="row">
                                            <label for="about" class="col-sm-3 col-form-label">{{ _('A propos') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="about" name="about" value="{{ old('about') }}" required placeholder="{{ _('A propos du projet') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pr-4">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ _('Document') }}</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input name="document" value="{{ old('document') }}" required type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pr-4">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ _('Code source (zip, rar)') }}</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input name="source_code" value="{{ old('source_code') }}" required type="file" class="custom-file-input" id="customFile">
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
