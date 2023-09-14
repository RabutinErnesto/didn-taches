@extends('layouts.app')

@section('content')
    <div class="card">


            <div class="justify-content-center  m-4">



                <p>No: {{$fiche->id}}/METFP/CGPP/DIDN/SMAR</p>

                <div class="row">
                    <div class="col-4"><ins><strong>ENTREES :</strong> </ins> </div>
                    <div class="col-4"> <strong>DATE :</strong> {{$fiche->date_arrivee}}</div>
                    <div class="col-4"></div>
                </div>
                <!-- -->
                <div class="row">
                    <div class="col-6"> <strong>PROPRIETAIRE :</strong>
                        <ul>
                            <li>Nom et prenoms : {{$fiche->nom_proprietaire}}</li>
                            <li>Direction : {{implode('', $fiche->direction()->get()->pluck('abr')->toArray())}}</li>
                            <li>Service : {{implode('', $fiche->service()->get()->pluck('abr')->toArray())}}</li>
                            <li>Fonction :{{$fiche->fonction_proprietaire}}</li>
                            <li>Contact : {{$fiche->contact_proprietaire}}</li>
                        </ul>
                    </div>
                    <div class="col-6"><strong>INTERVENANT : </strong>
                        <ul>
                          <li>Nom et prenoms : {{$fiche->nom_intervenant}}</li>
                        </ul>
                    </div>
                </div>
                <!-- -->
                <p>Description du materiel :</p>
                <div class="row">
                    <div class="col-3">
                        <ul class="list-unstyled">
                            <li><input type="checkbox" class="btn-check" id="btncheck1" {{$fiche->materiel ? 'checked' : 'disabled'}} autocomplete="off">
                                <label class=""for="btncheck1">{{$fiche->materiel}}</label></li>
                        </ul>


                    </div>
                    <div class="col-3">
                     @if ($fiche->marque)
                     <p>Marque : {{$fiche->marque}}</p>
                     @else
                     @endif
                        @if ($fiche->ram)
                        <p>RAM : {{$fiche->ram}}</p>
                        @else

                        @endif

                    </div>
                    <div class="col-3">
                        @if ($fiche->couleur)
                        <p>Couleur : {{$fiche->couleur}}</p>
                        @else

                        @endif

                        @if ($fiche->disque_dur)
                        <p>Disque dur: {{$fiche->disque_dur}}</p>
                        @else

                        @endif

                        @if ($fiche->encre)
                        <p>Encre: {{$fiche->encre}}</p>
                        @else

                        @endif

                    </div>
                    <div class="col-3">
                        @if ($fiche->carte_mere)
                        <p>Carte mere : {{$fiche->carte_mere}}</p>
                        @else

                        @endif

                        @if ($fiche->proc)
                        <p>Processeur {{$fiche->proc}}</p>
                        @else

                        @endif

                        @if ($fiche->type)
                        <p>Type: {{$fiche->type}}</p>
                        @else
                        @endif

                    </div>
                    <div class="col-12">
                        @if ($fiche->autres_materiel)
                        <p>Autres :  {{$fiche->autres_materiel}}
                        @else

                        @endif</p>
                    </div>
                </div>
                <!-- -->
                <strong> <ins><p>Probleme(s) constate(s) :</p></ins></strong>
                <div class="row">

                    <div class="btn-group col-3" role="group" aria-label="Basic checkbox toggle button group">

                        <ul  class="list-unstyled">
                            <li><input type="checkbox" class="btn-check" id="btncheck1" {{$fiche->probleme_constate ? 'checked' : 'disabled'}} autocomplete="off" >
                                <label class=""for="btncheck1">{{$fiche->probleme_constate}}</label></li>

                        </ul>

                    </div>

                    <div class="col-9">
                        <p>{{$fiche->problemes}}</p></div>

                </div>




                <strong><ins><p>Solution(s) envisagee(s) / intervention(s) :</p></ins></strong>

                <div>
                    <p>{{$fiche->interventions}}</p>

                </div>
                <div class="row">

                    <div class="col-3">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <ul  class="list-unstyled">
                                <li><input type="checkbox" class="btn-check" id="btncheck1" {{$fiche->solutions ? 'checked' : 'disabled'}} autocomplete="off">
                                    <label class=""for="btncheck1"> {{$fiche->solutions}} </label></li>
                            </ul>

                        </div>
                    </div>


                </div>


                @if ($fiche->resultat)
                <hr>

                <ins><strong>SORTIES :</strong> </ins>
                <div class="row">
                    <div class="col-4"> <strong>RESULTAT</strong></div>
                    <div class="col-4"> <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <ul  class="list-unstyled">
                            <li><input type="checkbox" class="btn-check" id="btncheck1"  {{ $fiche->resultat ? 'checked' : 'disabled'}} autocomplete="off">
                                <label class=""for="btncheck1">{{$fiche->resultat}}</label></li>
                        </ul>

                    </div></div>

                </div>
                @else

                @endif
                @if ($fiche->motifs_et_remarques)
                <p>MOTIFS ET REMARQUE : <small>{{$fiche->motifs_et_remarques}}</small> </p>
                @else

                @endif

                @if ($fiche->recommandation)
                <p>RECOMMANDATION : <small>{{$fiche->recommandation}}</small> </p>
                @else

                @endif


                <br>
                @if ($fiche->date_sortie)
                <p>Remis le : <small>{{$fiche->date_sortie}}</small> </p>
                @else

                @endif
                </div>



                <!-- -->


        </div>
    </div>
@endsection
