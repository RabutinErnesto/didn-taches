@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier <strong>{{$user->name}}</strong>
                </div>

                <div class="card-body">
                    <form action="{{route('users.update', $user)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label ">{{ __('Nom') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label ">{{ __('Addresse Email ') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email}}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="email" class="col-md-6 col-form-label">{{ __('Service') }}</label>

                        <div class="col-md-12">

                            <select name="service" id="" class="form-control @error('service') is-invalid @enderror" required>
                                <option value="{{$user->service}}">{{$user->service}}</option>
                                @foreach ($services as $item)
                                    <option value="{{$item->abr}}">{{$item->abr}}</option>
                                @endforeach
                            </select>

                            @error('service')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    @foreach ($roles as $role)
                        <div class=" form-check">
                                <input type="radio" class="form-check-input" name="roles[]" value="{{ $role->id }}"
                                 id="{{ $role->id }}" @if ($user->roles->pluck('id')) checked @endif  >
                                <label for="{{ $role->id }}" class="form-check-label">{{ $role->name}}</label>

                        </div>
                        @endforeach
                        <br>
                        <button class="submit btn btn-primary">Modifier les Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
