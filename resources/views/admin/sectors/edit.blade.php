@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('admin.sectors.index') }}" class="btn btn-block btn-primary"><i class="fa fa-bars"></i> {{ _("Gérer les rôles") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="{{ route('admin.sectors.update', $sector->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="label" class="col-sm-3 col-form-label">{{ _('Libélé') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="label" name="label" value="{{ $sector->label }}" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="sector_name" class="col-sm-3 col-form-label">{{ _('Nom') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="first_name" name="sector_name" value="{{ $sector->name }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
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
