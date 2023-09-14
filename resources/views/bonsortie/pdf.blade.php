<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">

</head>
<body>

    <div style="margin-top: -3%">
        <div style="text-align: center">
            <img src="{{asset('img/Repoblika.jpg')}}" style="width: 20%; height:5%" alt="">
        </div>
            <div style="font-size: 10px; width:250px;text-align: center">
                <small >
                    <p>MINISTERE DE L'ENSEIGNEMENT TECHNIQUE ET DE LA FORMATION PROFESSIONNELLE</p>

                    <p>COORIDANTION GENERALE DES PROGRAMMES ET DES PROJETS</p>

                    <p>DIRECTION DE L'INNOVATION ET DU DEVELOPPEMENT NUMERIQUE</p></small>

            </div>

            <div style="margin-left: 60%; margin-top:-10%">
                <p style="font-size: 15px">BON DE SORTI</p>
            </div>

    <div style="margin-top: 5%">
        <br>
            <p style="font-size: 12px " >No: {{$fiche->id}} /METFP/CGPP/DIDN/SMAR</p>

            <table style="font-size: 12px " >
                <tr>
                    <th ><ins><strong>SORTIE :</strong> </ins></th>
                    <th style="width: 200px;"></th>
                    <th></th>
                    <th><strong>DATE :</strong> {{$fiche->date_sortie}}</th>
                </tr>
            </table>
            <!-- -->
                <div style="font-size: 12px; margin-top: 2% " > <strong>EMPRUNTEUR :</strong>
                    <ul>
                        <li>Nom et prenoms : {{$fiche->nom_emprunteur}}</li>
                        <li>Direction : {{implode('', $fiche->direction()->get()->pluck('abr')->toArray())}}</li>
                            <li>Service : {{implode('', $fiche->service()->get()->pluck('abr')->toArray())}}</li>
                        <li>Fonction :{{$fiche->fonction_emprunteur}}</li>
                        <li>Contact : {{$fiche->contact_emprunteur}}</li>
                    </ul>
                </div>
                <div style="margin-left: 50%; margin-top: -100%; font-size:12px"><strong>PRETEUR : </strong>
                    <ul>
                      <li>Nom et prenoms : {{$fiche->nom_preteur}}</li>
                    </ul>
                </div>
            <!-- -->
                <p style="margin-top: 10%; font-size:12px"> <strong><ins>Description du materiel :</ins></strong> </p>
                    <div style="font-size:12px">

                        @foreach ($materiel as $materiel)
                        <li style="list-style-type: none"><input type="checkbox" class="btn-check" id="btncheck1" {{$materiel->materiel == $fiche->materiel ? 'checked' : 'disabled'}} style="height: 15px" >
                            <label class=""for="btncheck1">{{$materiel->materiel}}</label></li>
                        @endforeach

            <!-- -->
            <strong> <ins><p style="font-size:12px; margin-top: 2%;">UTILISATION :</p></ins></strong>


                <div style="font-size:12px"> @if ($fiche->utilisation)
                    <p style="font-size:12px"> -> {{$fiche->utilisation}}
                @else

                @endif </p></div>


    <hr style="font-size:12px">
            <ins style="font-size:12px"><strong>ENTREES :</strong> </ins>


            <p style="font-size:12px">OBSERVATION :{{$fiche->observation}} </p>
            @if ($fiche->date_entree)
            <p  style="font-size:12px">Remis le : <small>{{$fiche->date_entree}}</small> </p>
            @else

            @endif
            <table style="margin-left: 20%; text-align:center;font-size:12px">
                <tr>
                    <td><p>Signature de preteur</p><small>(recu et verifie)</small></td>
                    <td style="width: 200px"></td>
                    <td> <p style="margin: -10%">Signature d'emprunteur</p>
                        </td>
                </tr>
            </table>


            </div>

    <!-- -->

    </div>



</body>
</html>
