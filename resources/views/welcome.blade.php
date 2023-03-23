@extends('layouts.welcome')

@section('content')
<div class="flex-center position-ref full-height">


    <div class="content">
        <div><img src="{{asset('img/logo.png')}}" alt=""></div>
        <div class="title m-b-md">
            TACHES JOURNALIER
        </div>

        <div class="links m-b-md">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</div>
</body>
@endsection


