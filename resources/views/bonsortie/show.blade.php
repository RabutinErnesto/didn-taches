@extends('layouts.app')

@section('content')
    <div class="card">


            <div class="justify-content-center  m-4">

                <p>No: {{$bonsortie->id}}/METFP/CGPP/DIDN/SMAR</p>

                <div class="row">
                    <div class="col-4"><ins><strong>SORTIE :</strong> </ins> </div>
                    <div class="col-4"> <strong>DATE :</strong> {{$bonsortie->date_sortie}}</div>
                    <div class="col-4"></div>
                </div>
                <!-- -->
                <div class="row">
                    <div class="col-6"> <strong>PROPRIETAIRE :</strong>
                        <ul>
                            <li>Nom et prenoms : {{$bonsortie->nom_emprunteur}}</li>
                            <li>Direction : {{implode('', $bonsortie->direction()->get()->pluck('abr')->toArray())}}</li>
                            <li>Service : {{implode('', $bonsortie->service()->get()->pluck('abr')->toArray())}}</li>
                            <li>Fonction :{{$bonsortie->fonction_emprunteur}}</li>
                            <li>Contact : {{$bonsortie->contact_emprunteur}}</li>
                        </ul>
                    </div>
                    <div class="col-6"><strong>PRETEUR : </strong>
                        <ul>
                          <li>Nom et prenoms : {{$bonsortie->nom_preteur}}</li>
                        </ul>
                    </div>
                </div>
                <!-- -->
                <p>Description du materiel :</p>
                <div class="row">
                    <div class="col-12">
                        <ul class="list-unstyled">
                            <li><input type="checkbox" class="btn-check" id="btncheck1" {{$bonsortie->materiel ? 'checked' : 'disabled'}} autocomplete="off">
                                <label class=""for="btncheck1">{{$bonsortie->materiel}}</label></li>
                        </ul>
                    </div>
                </div>
                <p>Utilisation du materiel :</p>
                <div class="row">
                    <div class="col-12">
                        <ul class="list-unstyled">
                            <p>{{$bonsortie->utilisation}}</p>
                        </ul>
                    </div>
                </div>



                @if ($bonsortie->observation)
                <p>OBSERVATION: <small>{{$bonsortie->observation}}</small> </p>
                @else

                @endif


                <br>
                @if ($bonsortie->date_arrivee)
                <p>Remis le : {{$bonsortie->date_arrivee}}</p>
                @else

                @endif
                </div>


        </div>
    </div>
@endsection
