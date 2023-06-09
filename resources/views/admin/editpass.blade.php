@extends('layouts.app')

@section('content')
<div class="container flex-center  full-height">
    <div class="row justify-content-center col-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Modifier le mot de passe') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.change') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 col-form-label text-md-right">Mot de passe actuel</label>
                            <div class="col-6">
                                <input id="current_password" class="form-control"  type="password" name="current_password" required>
                                @error('current_password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>
                            <div class="col-6">
                            <input id="new_password" type="password" class="form-control"  name="new_password" required>
                            @error('new_password')
                                <span>{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmer le nouveau mot de passe</label>
                            <div class="col-6">
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
