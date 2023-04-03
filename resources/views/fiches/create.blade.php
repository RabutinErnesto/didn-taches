@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      Création d'une nouvelle fiche
    </div>
    <div class="card-body">
      <form action="{{ route('fiches.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <h5>ENTREES :</h5>
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Date d'entrée</label>
                <input type="date" name="date" class="form-control"  aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted">Entrez la date d'entrée</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Nom intervenant</label>
                <input type="text" name="nom_intervenant" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le nom d'intervenant</small>
            </div>
        </div>

        <hr>
        <h5>PROPRIETAIRE :</h5>
        <div class="row">

            <div class="form-group col-6">
                <label for="name">Nom </label>
                <input type="text" name="nom_proprietaire" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le nom du proprietaire</small>
            </div>
            <div class="form-group col-3">
                <label for="name">Direction</label>
                <select class="form-control" name="direction_proprietaire" required id="direction" onchange="giveSelection(this.value)">
                    <option value=""></option>
                    @foreach ($direction as $direction)
                    <option value="{{$direction->id}}">{{$direction->abr}}</option>
                    @endforeach
                </select>
                <small id="nameHelp" class="form-text text-muted">Entrez le direction du proprietaire</small>
            </div>
            <div class="form-group col-3">
                <label for="name">Service </label>
                <select class="form-control " name="service_proprietaire" required id="service" >
                    <option value=""></option>
                    @foreach ($service as $service)
                    <option value="{{$service->id}}" data-chained="{{$service->direction_id}}" >{{$service->abr}}</option>
                    @endforeach
                </select>
                <small id="nameHelp" class="form-text text-muted">Entrez le service de proprietaire</small>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label for="name">Fonction </label>
                <input type="text" name="fonction_proprietaire" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le fonction de proprietaire</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Contact </label>
                <input type="text" name="contact_proprietaire" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le contact de proprietaire</small>
            </div>
        </div>

        <hr>
        <h5>Description du materiels :</h5>
        <div class="row">
            <div class="form-group col-4">
                <label for="materiel">Materiels</label>
                <select class="form-control" name="materiel">
                    <option value="">----</option>
                    @foreach ($materiel as $materiel)
                    <option value="{{$materiel->materiel}}">{{$materiel->materiel}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-4">
                <label for="marque">Marque</label>
                <input type="text" name="marque" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="ram">RAM</label>
                <input type="text" name="ram" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Couleur</label>
                <input type="text" name="couleur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Disque dur</label>
                <input type="text" name="disque_dur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Encre</label>
                <input type="text" name="encre" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Carte mere</label>
                <input type="text" name="carte_mere" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Proccesseur</label>
                <input type="text" name="processeur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Type</label>
                <input type="text" name="type" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="marque">Autres</label>
                <input type="text" name="autres_materiel" class="form-control">
            </div>

        </div>


            <hr>
            <h5>Problèmes constate(s) :</h5>
            <div class="row">
                <div class="form-group col-6">
                    <label for="description">Choisir</label>
                    <select name="probleme_constate" id="" class="form-control">
                        <option value="">----</option>
                        @foreach ($probleme as $probleme)
                        <option value="{{$probleme->probleme}}">{{$probleme->probleme}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="marque">Problèmes</label>
                    <input type="text" name="probleme" class="form-control">
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="form-group col-6">
                    <label for="description">Solution envisagées</label>
                    <select name="solutions" id="" class="form-control">
                        <option value="">----</option>
                        @foreach ($solution as $solution)
                        <option value="{{$solution->solution}}">{{$solution->solution}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="marque">Intervention</label>
                    <input type="text" name="interventions" class="form-control">
                </div>
            </div>

        <hr>
        <h6>SORTIE</h6>


            <div class="form-group">
                <label for="resultat">Resultat</label>
                <select name="resultat" id="" class="form-control">
                    <option value="">----</option>
                    @foreach ($resultat as $resultat)
                    <option value="{{$resultat->resultat}}">{{$resultat->resultat}}</option>
                    @endforeach
                </select>
            </div>


        <div class="row">

          <div class="form-group col-6">
            <label for="description">Motif et remarque</label>
            <textarea type="text" name="motif" class="form-control"  aria-describedby="nameHelp"></textarea>
        </div>
        <div class="form-group col-6">
          <label for="description">Recommandation</label>
          <textarea type="textarea" name="recommandation" class="form-control"  aria-describedby="nameHelp"></textarea>
      </div>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
  </div>

  <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
  <script src="{{asset('js/jquery.chained.min.js')}}"></script>
<script>
$("#service").chained("#direction");</script>
@endsection
