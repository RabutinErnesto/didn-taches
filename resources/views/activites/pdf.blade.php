<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @notify_css
</head>
<body style="background-color: #fff">
    <div class="text-center">
        <img src="{{asset('img/Repoblika.jpg')}}" style="width: 20%; height:5%" alt="">
    </div>
    <div class="col-4 text-center pt-4">

        <small >
            <img src="{{asset('img/logo.png')}}" style="width: 20%; height:5%" alt="">
            <p style="font-size: 9px;">MINISTERE DE L'ENSEIGNEMENT TECHNIQUE ET DE LA FORMATION PROFESSIONNELLE</p>
            <p style="margin-top: -13%">--------------</p>
            <p style="font-size: 9px;margin-top: -13%">COORIDANTIONGENERALE DES PROGRAMMES ET DES PROJETS</p>
            <p style="margin-top: -13%">--------------</p>
            <p style="font-size: 9px;margin-top: -13%">DIRECTION DE L'INNOVATION ET DU DEVELOPPEMENT NUMERIQUE</p></small>

    </div>
<div class="card-body">

    <div class="">
        <h5 class="text-center" style="float:right; margin-top:-10%"><ins>COMPTE RENDU DES ACTIVITES</ins> </h5>


                <table class="table table-bordered text-center" style="page-break-after: always;" >
                    <thead class="text-center">
                        <tr>
                            <th  class="" colspan="4">  <h6><strong>ACTIVITES REALISEES et en COURS</strong></h6> </th>
                        </tr>


                    </thead>
                    <tbody class="text-center">
                        <tr class="border-top small">

                            <th colspan="4"  class="border-0"> <p>Semaine du : {{$activite->semaine}} </p> </th>

                        </tr>
                        <tr class="border-top small">

                            <th colspan="4"  class="border-0"><p> <strong>SERVICE :{{$activite->service}}</strong> </p> </th>

                        </tr>
                        <tr class="x-small">
                            <td scope="row"> <strong>Intitulé de l'activité</strong> </td>
                            <td><strong>Description</strong> </td>
                            <td><strong>Status</strong> </td>
                            <td><strong>Observations</strong></td>
                        </tr>
                        <tr>
                            @foreach ($array as $key=>$k)
                            @isset ($k[0] )
                            <td>{{$k[0]}}</td>
                            @else
                                <td></td>
                            @endisset

                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($array as $key=>$k)
                            @isset ($k[1] )
                            <td>{{$k[1]}}</td>
                            @else
                                <td></td>
                            @endisset

                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($array as $key=>$k)
                            @isset($k[2])
                            <td>{{$k[2]}}</td>


                            @else
                                <td></td>
                                @endisset
                            @endforeach
                        </tr>

                    </tbody>

                </table>

                <table class="table table-bordered text-center" >
                    <thead class="text-center">
                        <tr>
                            <th  class="" colspan="4">  <h6><strong>ACTIVITES A REALISER</strong></h6> </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr class="border-top small">

                            <th colspan="4"  class="border-0"> <p>Semaine du : {{$activite->semaine2}} </p> </th>

                        </tr>
                        <tr class="border-top small">

                            <th colspan="4"  class="border-0"><p> <strong>SERVICE :{{$activite->service2}}</strong> </p> </th>

                        </tr>
                        <tr class="x-small">
                            <td scope="row"> <strong>Intitulé de l'activité</strong> </td>
                            <td><strong>Description</strong> </td>
                            <td><strong>Deadline</strong> </td>
                            <td><strong>Observations</strong></td>
                        </tr>

                        <tr>
                            @foreach ($array2 as $key=>$k)
                            @isset ($k[0] )
                            <td>{{$k[0]}}</td>
                            @else
                                <td></td>
                            @endisset

                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($array2 as $key=>$k)
                            @isset ($k[1] )
                            <td>{{$k[1]}}</td>
                            @else
                                <td></td>
                            @endisset

                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($array2 as $key=>$k)
                            @isset($k[2])
                            <td>{{$k[2]}}</td>


                            @else
                                <td></td>
                                @endisset
                            @endforeach
                        </tr>
                    </tbody>

                </table>


        </div>
</div>

</body>
</html>
