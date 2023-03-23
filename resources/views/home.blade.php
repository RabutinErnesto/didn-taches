@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center mt-4">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }},
                    {{ __('You are logged in!') }}
                    <div class="text-center"><img src="{{asset('img/logo.png')}}" alt="..." class=" w-5 p-2"></div>
            <div class="h3 text-center">
                    Olo-mahay raha, tsy very mandeha
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
