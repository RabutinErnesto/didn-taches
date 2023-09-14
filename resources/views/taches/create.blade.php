@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Création d'une nouvelle tache
        </div>
        <div class="card-body">
            <form action="{{ route('taches.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label for="name">Categorie</label>
                            <select name="nom" class="form-control" id="titre" aria-describedby="nameHelp" required>
                                <option value=""></option>
                                @foreach ($maintenance as $item)
                                    <option value="{{ $item->id }}">{{ $item->titre }}</option>
                                @endforeach
                                <option value="" class="autres-option">Autres</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Maintenance</label>
                            <select name="tache_select" class="form-control" id="tache" aria-describedby="nameHelp"
                                required>
                                <option value=""></option>
                                @foreach ($tache_maint as $item)
                                    <option value="{{ $item->tache }}" data-chained="{{ $item->maintenance_id }}">
                                        {{ $item->tache }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="tache_autre" class="form-control" id="titre-autres"
                                aria-describedby="nameHelp">
                        </div>

                        <div class="form-group">
                            <label for="name">Tache a faire</label>
                            <input type="text" name="tache_faire" class="form-control" id="titre-autres"
                                aria-describedby="nameHelp">

                        </div>

                        <div class="form-group">
                            <label for="description">Observation</label>
                            <textarea name="observation" class="form-control" id="description" cols="30" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6  mx-auto border-left">
                        <div class="form-group">
                            <label for="name">Nom et prenoms</label>
                            <input type="text" name="nom_proprietaire" class="form-control" aria-describedby="nameHelp">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Direction</label>
                                <select class="form-control" name="direction_proprietaire" required id="direction"
                                    onchange="giveSelection(this.value)">
                                    <option value=""></option>
                                    @foreach ($direction as $direction)
                                        <option value="{{ $direction->id }}">{{ $direction->abr }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="name">Service </label>
                                <select class="form-control " name="service_proprietaire" required id="service">
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
                                <input type="text" name="fonction_proprietaire" class="form-control"  aria-describedby="nameHelp">
                            </div>
                            <div class="form-group col-6">
                                <label for="name">Contact </label>
                                <input type="text" name="contact_proprietaire" class="form-control"  aria-describedby="nameHelp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Porte</label>
                                <input type="text" name="porte" class="form-control"  aria-describedby="nameHelp">
                            </div>
                            <div class="form-group col-6">
                                <label for="name">Batiment</label>
                                <input type="text" name="batiment" class="form-control"  aria-describedby="nameHelp">
                            </div>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mx-auto">Ajouter</button>
        </div>
    </div>


    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <script>
        $("#tache").chained("#titre");
        $("#service").chained("#direction");
    </script>

    <script>
        $(document).ready(function() {
            $("#titre-autres").hide();
            //   $("#tache").hide();

            $("#titre").change(function() {
                if ($(this).val() === "") {
                    $("#tache").hide();
                    $("#titre-autres").show();
                    $(".autres-option").val("Autres");
                } else {
                    $("#tache").show();
                    $("#titre-autres").hide();
                }
            });

        });
    </script>
@endsection
