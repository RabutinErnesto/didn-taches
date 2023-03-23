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
            <p style="font-size: 10px">MINISTERE DE L'ENSEIGNEMENT TECHNIQUE ET DE LA FORMATION PROFESSIONNELLE</p>

            <p style="font-size: 10px">COORIDANTIONGENERALE DES PROGRAMMES ET DES PROJETS</p>

            <p style="font-size: 10px">DIRECTION DE L'INNOVATION ET DU DEVELOPPEMENT NUMERIQUE</p></small>

    </div>
<div class="card-body">

    <div class="">

        <h5 class="text-center p-4"><ins>COMPTE RENDU DES ACTIVITES</ins> </h5>


                <table class="table table-bordered text-center" style="height: 100px">
                    <thead class="text-center">
                        <tr>
                            <th  class="border-0"></th>
                            <th  class="border-0">  <h6><strong>ACTIVITES REALISEES</strong></h6> </th>
                            <th  class="border-0"></th>
                        </tr>


                    </thead>
                    <tbody class="text-center">
                        <tr class="border-top small">
                            <th class="border-0"></th>
                            <th  class="border-0"> <p>Semaine du : {{$activite->semaine}} </p> </th>
                            <th  class="border-0"></th>
                        </tr>
                        <tr class="border-top small">
                            <th  class="border-0"></th>
                            <th  class="border-0"><p> <strong>SERVICE :{{$activite->service}}</strong> </p> </th>
                            <th  class="border-0"></th>
                        </tr>
                        <tr class="x-small">
                            <td scope="row"> <strong>Intitulé de l'activité</strong> </td>
                            <td><strong>Description</strong> </td>
                            <td><strong>Observations</strong></td>
                        </tr>

                        <tr class="small">
                            <td scope="row" class="col-4">{{$activite->intitule_activite}}</td>
                            <td class="col-4">{{$activite->description}}</td>
                            <td class="col-4">{{$activite->observation}}</td>
                        </tr>
                    </tbody>

                </table>



        </div>
</div>

</body>
</html>