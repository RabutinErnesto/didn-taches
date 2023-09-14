@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Création d'une nouvelle Bon de sorie
        </div>
        <div class="card-body">
            <form action="{{ route('bonsorties.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <h5>DATE SORTIE :</h5>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Date de sortie</label>
                        <input type="date" name="date" class="form-control" aria-describedby="nameHelp" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Nom preteur</label>
                        <input type="text" name="nom_preteur" class="form-control" aria-describedby="nameHelp">
                    </div>
                </div>

                <hr>
                <h5>EMPRUNTEUR :</h5>
                <div class="row">

                    <div class="form-group col-6">
                        <label for="name">Nom emprunteur</label>
                        <input type="text" name="nom_emprunteur" class="form-control" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group col-3">
                        <label for="name">Direction</label>
                        <select class="form-control" name="direction_emprunteur" required id="direction"
                            onchange="giveSelection(this.value)">
                            <option value=""></option>
                            @foreach ($direction as $direction)
                                <option value="{{ $direction->id }}">{{ $direction->abr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="name">Service </label>
                        <select class="form-control " name="service_emprunteur" required id="service">
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
                        <input type="text" name="fonction_emprunteur" class="form-control" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Contact </label>
                        <input type="text" name="contact_emprunteur" class="form-control" aria-describedby="nameHelp">
                    </div>
                </div>

                <hr>
                <h5>Description du materiels :</h5>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="materiel">Materiels</label>
                        <select class="form-control" name="materiel">
                            <option value="">----</option>
                            @foreach ($materiel as $materiel)
                                <option value="{{ $materiel->materiel }}">{{ $materiel->materiel }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-6">
                        <label for="materiel">Utilisation</label>
                        <textarea name="utilisation" class="form-control" id="" cols="30" rows="1"></textarea>

                    </div>

                </div>


                <hr>


                <div class="row">

                    <div class="form-group col-12">
                        <label for="observation">Obsevation</label>
                        <textarea type="text" name="observation" class="form-control" aria-describedby="nameHelp"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <script>
        $("#service").chained("#direction");
    </script>
@endsection
