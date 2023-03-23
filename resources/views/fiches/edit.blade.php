@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header bg-info">
        <h4 class="card-title">Modification Fiche d'intervention <span class="badge badge-dark">#{{ $fiche->id }}</span></h4>
    </div>
    <div class="card-body">
      <form action="{{ route('fiches.update', $fiche->id) }}" method="post">
        @csrf
        @method('put')
        <h5>ENTREES :</h5>
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Date d'entrée</label>
                <input disabled type="date" name="date" class="form-control" value="{{ old('date', $fiche->date) }}"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez la date d'entrée</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Nom intervenant</label>
                <input type="text" name="nom_intervenant" value="{{ old('nom_intervenant', $fiche->nom_intervenant) }}" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le nom d'intervenant</small>
            </div>
        </div>

        <hr>
        <h5>PROPRIETAIRE :</h5>
        <div class="row">

            <div class="form-group col-6">
                <label for="name">Nom </label>
                <input type="text" name="nom_proprietaire" value="{{ old('nom_proprietaire', $fiche->nom_proprietaire) }}" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le nom du proprietaire</small>
            </div>
            <div class="form-group col-3">
                <label for="name">Direction</label>
                <input type="text" name="direction_proprietaire" value="{{ old('direction_proprietaire', $fiche->direction_proprietaire) }}" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le direction du proprietaire</small>
            </div>
            <div class="form-group col-3">
                <label for="name">Service </label>
                <input type="text" name="service_proprietaire" value="{{ old('service_proprietaire', $fiche->service_proprietaire) }}" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le service de proprietaire</small>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label for="name">Fonction </label>
                <input type="text" name="fonction_proprietaire" value="{{ old('fonction_proprietaire', $fiche->fonction_proprietaire) }}" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le fonction de proprietaire</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Contact </label>
                <input type="text" name="contact_proprietaire" value="{{ old('contact_proprietaire', $fiche->contact_proprietaire)}}" class="form-control"  aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Entrez le contact de proprietaire</small>
            </div>
        </div>

        <hr>
        <h5>Description du materiels :</h5>
        <div class="row">
            <div class="form-group col-4">
                <label for="materiel">Materiels</label>
                <select class="form-control" name="materiel">
                    <option value="{{old('materiel', $fiche->materiel)}}">{{old('materiel', $fiche->materiel)}}</option>
                    <option value=""></option>
                    @foreach ($materiel as $materiel)
                    <option value="{{$materiel->materiel}}">{{$materiel->materiel}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-4">
                <label for="marque">Marque</label>
                <input type="text" name="marque" value="{{$fiche->marque}}" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="ram">RAM</label>
                <input type="text" value="{{$fiche->ram}}" name="ram" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Couleur</label>
                <input type="text" value="{{$fiche->couleur}}" name="couleur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Disque dur</label>
                <input type="text" value="{{$fiche->disque_dur}}" name="disque_dur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Encre</label>
                <input type="text" value="{{$fiche->encre}}" name="encre" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Carte mere</label>
                <input type="text" value="{{$fiche->carte_mere}}" name="carte_mere" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Proccesseur</label>
                <input type="text" value="{{$fiche->proc}}" name="processeur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="">Type</label>
                <input type="text" value="{{$fiche->type}}" name="type" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="marque">Autres</label>
                <input type="text" value="{{$fiche->autres_materiel}}" name="autres_materiel" class="form-control">
            </div>

        </div>


            <hr>
            <h5>Problèmes constate(s) :</h5>
            <div class="row">
                <div class="form-group col-6">
                    <label for="description">Choisir</label>
                    <select name="probleme_constate" id="" class="form-control">
                        <option value="{{$fiche->probleme_constate}}">{{$fiche->probleme_constate}}</option>
                        <option value=""></option>
                        @foreach ($probleme as $probleme)
                        <option value="{{$probleme->probleme}}">{{$probleme->probleme}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="probleme">Problèmes</label>
                    <input type="text" value="{{$fiche->problemes}}" name="probleme" class="form-control">
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="form-group col-6">
                    <label for="description">Solution envisagées</label>
                    <select name="solutions" id="" class="form-control">
                        <option value="{{$fiche->solutions}}">{{$fiche->solutions}}</option>
                        <option value=""></option>
                        @foreach ($solution as $solution)
                        <option value="{{$solution->solution}}">{{$solution->solution}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="marque">Intervention</label>
                    <input type="text" value="{{$fiche->interventions}}"  name="interventions" class="form-control">
                </div>
            </div>

        <hr>
        <h6>SORTIE</h6>


            <div class="form-group">
                <label for="resultat">Resultat</label>
                <select name="resultat" id="" class="form-control">
                    <option value="{{old('resultat', $fiche->resultat)}}">{{old('resultat', $fiche->resultat)}}</option>
                    <option value="">----</option>
                    @foreach ($resultat as $resultat)
                    <option value="{{$resultat->resultat}}">{{$resultat->resultat}}</option>
                    @endforeach
                </select>
            </div>


        <div class="row">

          <div class="form-group col-6">
            <label for="description">Motif et remarque</label>
            <textarea type="text"  name="motif" class="form-control"  aria-describedby="nameHelp">{{ $fiche->motifs_et_remarques}}</textarea>
        </div>
        <div class="form-group col-6">
          <label for="description">Recommandation</label>
          <textarea type="textarea" name="recommandation" class="form-control"  aria-describedby="nameHelp">{{old('recommandation', $fiche->recommandation)}}</textarea>
      </div>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
</div>


@endsection
