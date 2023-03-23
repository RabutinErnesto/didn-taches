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
                <p style="font-size: 15px">FICHE D'INTERVENTION</p>
            </div>

    <div style="margin-top: 5%">
        <br>
            <p style="font-size: 12px " >No: ...../METFP/CGPP/DIDN/SMAR</p>

            <table style="font-size: 12px " >
                <tr>
                    <th ><ins><strong>ENTREES :</strong> </ins></th>
                    <th style="width: 200px;"></th>
                    <th></th>
                    <th><strong>DATE :</strong> </th>
                </tr>
            </table>
            <!-- -->
                <div style="font-size: 12px; margin-top: 2% " > <strong>PROPRIETAIRE :</strong>
                    <ul>
                        <li>Nom et prenoms : </li>
                        <li>Direction : </li>
                        <li>Service : </li>
                        <li>Fonction :</li>
                        <li>Contact : </li>
                    </ul>
                </div>
                <div style="margin-left: 50%; margin-top: -100%; font-size:12px"><strong>INTERVENANT : </strong>
                    <ul>
                      <li>Nom et prenoms : </li>
                    </ul>
                </div>
            <!-- -->
                <p style="margin-top: 10%; font-size:12px"> <strong><ins>Description du materiel :</ins></strong> </p>
                    <div style="font-size:12px">

                        @foreach ($materiel as $materiel)
                        <li style="list-style-type: none"><input type="checkbox" class="btn-check" id="btncheck1" style="height: 15px" >
                            <label class=""for="btncheck1">{{$materiel->materiel}}</label></li>
                        @endforeach

                    </div>
                    <div style="margin-left: 25%; margin-top: -60%; font-size:12px">
                        <p>Marque : </p>
                        <p>RAM : </p>
                    </div>
                    <div style="margin-left: 45%; margin-top: -120%; font-size:12px">
                        <p>Couleur : </p>
                        <p>Disque dur: </p>
                        <p>Encre: </p>
                    </div>
                    <div style="margin-left: 70%; margin-top: -180%; font-size:12px">
                        <p>Carte mere : </p>
                        <p>Processeur : </p>
                        <p>Type: </p>
                    </div>
                    <div style="margin-top: 0%; font-size:12px">
                        <p>Autres :


                            --------------------------------------------------------------------------------------------------------------------------------------------------------
                        </p>
                    </div>

            <!-- -->
            <strong> <ins><p style="font-size:12px">Probleme(s) constate(s) :</p></ins></strong>

                <div style="font-size:12px">

                    <ul style="list-style-type: none">
                        @foreach ($probleme as $probleme)
                        <li><input type="checkbox" class="btn-check" id="btncheck1"  style="height: 15px" >
                            <label class=""for="btncheck1">{{$probleme->probleme}}</label></li>
                            @endforeach
                    </ul>

                </div>





            <strong><ins><p style="font-size:12px">Solution(s) envisagee(s) / intervention(s) :</p></ins></strong>





                <table style="font-size:12px">
                    <tr>
                        @foreach ($solution as $solution)
                        <td style="width: 100px"><input type="checkbox"  style="height: 15px" >{{$solution->solution}}</td>
                        @endforeach
                    </tr>
                </table>


                <table style="margin-left: 20%; margin-top:3%; height:8%; font-size:12px">
                    <tr>
                        <td><p>Signature de l'intervenant</p></td>
                        <td style="width: 200px"></td>
                        <td> <p>Signature du proprietaire</p></td>
                    </tr>
                </table>

    <hr style="font-size:12px">
            <ins style="font-size:12px"><strong>SORTIES :</strong> </ins>

                <table style="font-size:12px">
                    <tr>
                        <td><strong> <p> RESULTAT :</p></strong></td>
                        <td style="width: 50px"></td>
                        @foreach ($resultat as $resultat)
                        <td style="width: 180px"><input type="checkbox"   style="height: 15px" >{{$resultat->resultat}}</td>
                        @endforeach
                    </tr>
                </table>


            <p style="font-size:12px">MOTIFS ET REMARQUE :</small> </p>
            <p style="font-size:12px">RECOMMANDATION :  </p>

            <table style="margin-left: 20%; text-align:center;font-size:12px">
                <tr>
                    <td><p>Signature de l'intervenant</p></td>
                    <td style="width: 200px"></td>
                    <td> <p>Signature du proprietaire</p>
                        <small>(recu et verifie)</small></td>
                </tr>
            </table>


            </div>

    <!-- -->

    </div>



</body>
</html>
