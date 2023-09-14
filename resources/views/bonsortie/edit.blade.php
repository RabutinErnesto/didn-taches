@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header bg-info">
        <h4 class="card-title">Modification Bon de Sorti <span class="badge badge-dark">#{{ $bonsortie->id }}</span></h4>
    </div>
    <div class="card-body">
      <form action="{{ route('bonsorties.update', $bonsortie->id) }}" method="post">
        @csrf
        @method('put')
        <h5>DATE SORTIE :</h5>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Date de sortie</label>
                        <input type="date" name="date" class="form-control" disabled>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Nom preteur</label>
                        <input type="text" name="nom_preteur" value="{{$bonsortie->nom_preteur}}" class="form-control" aria-describedby="nameHelp">
                    </div>
                </div>

                <hr>
                <h5>EMPRUNTEUR :</h5>
                <div class="row">

                    <div class="form-group col-6">
                        <label for="name">Nom emprunteur</label>
                        <input type="text" name="nom_emprunteur" value="{{$bonsortie->nom_emprunteur}}" class="form-control" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group col-3">
                        <label for="name">Direction</label>
                        <select class="form-control" name="direction_emprunteur" required id="direction"
                            onchange="giveSelection(this.value)">
                            <option value="{{$bonsortie->direction_id}}">{{$bonsortie->direction->abr}}</option>
                            <option value=""></option>
                            @foreach ($direction as $direction)
                                <option value="{{ $direction->id }}">{{ $direction->abr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="name">Service </label>
                        <select class="form-control " name="service_emprunteur" required id="service">
                            <option value="{{$bonsortie->service_id}}">{{$bonsortie->service->abr}}</option>
                            <option value=""></option>
                            @foreach ($service as $service)
                                <option value="{{ $service->id }}" data-chained="{{ $service->direction_id }}">
                                    {{ $service->abr }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Fonction </label>
                        <input type="text" name="fonction_emprunteur" value="{{$bonsortie->fonction_emprunteur}}" class="form-control" >
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Contact </label>
                        <input type="text" name="contact_emprunteur" value="{{$bonsortie->contact_emprunteur}}" class="form-control" >
                    </div>
                </div>

                <hr>
                <h5>Description du materiels :</h5>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="materiel">Materiels</label>
                        <select class="form-control" name="materiel">
                            <option value="{{$bonsortie->materiel}}">{{$bonsortie->materiel}}</option>
                            <option value="">----</option>
                            @foreach ($materiel as $materiel)
                                <option value="{{ $materiel->materiel }}">{{ $materiel->materiel }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-6">
                        <label for="materiel">Utilisation</label>
                        <textarea name="utilisation" class="form-control" id="" cols="30" rows="1">{{$bonsortie->utilisation}}</textarea>

                    </div>

                </div>


                <hr>


                <div class="row">

                    <div class="form-group col-12">
                        <label for="observation">Obsevation</label>
                        <textarea type="text" name="observation" class="form-control" >{{$bonsortie->observation}}</textarea>
                    </div>
                </div>
                <hr>
                <h5>DATE SORTIE :</h5>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="name">Date d'arrivee</label>
                        <input type="date" name="date_arrivee" class="form-control" >
                    </div>
                </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
</div>

<script src="{{asset('js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('js/jquery.chained.min.js')}}"></script>
<script>
$("#service").chained("#direction");</script>
@endsection
