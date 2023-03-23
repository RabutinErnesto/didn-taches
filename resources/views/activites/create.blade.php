@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      Création d'une nouvelle activites
    </div>
    <div class="card-body">
      <form id=autre action="{{ route('activites.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <h5>Veuillez saisir</h5>
        <div >
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Semaine</label>
                <input type="date" name="semaine" class="form-control"  aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted">Entrez la semaine</small>
            </div>

            <div class="form-group col-6">
                <label for="service">Service</label>
                <select class="form-control" name="service" required>
                    <option value="">----</option>
                    @foreach ($service as $service)
                    <option value="{{$service->abr}}">{{$service->abr}}</option>
                    @endforeach
                </select>
                <small id="nameHelp" class="form-text text-muted">Entrez la service</small>
            </div>
        </div>

            <hr>
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">intitule activite</label>
                    <input type="text" name="intitule_activite" class="form-control"  aria-describedby="nameHelp" required>
                    <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
                </div>
                <div class="form-group col-6">
                    <label for="name">Details</label>
                    <input type="text" name="details" class="form-control"  aria-describedby="nameHelp" required>
                    <small id="nameHelp" class="form-text text-muted">Entrez  details</small>
                </div>



              <div class="form-group col-6">
                <label for="description">Description</label>
                <textarea type="text" name="description" class="form-control"  aria-describedby="nameHelp" required></textarea>
            </div>
            <div class="form-group col-6">
              <label for="description">Observation</label>
              <textarea type="textarea" name="observation" class="form-control"  aria-describedby="nameHelp"></textarea>
            </div>
            </div>
        </div>


        <div class="row">
            <div class="col-8"></div>
            <div class="col-2">
                <a class="btn btn-success" id="mybutton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>  ajouter</a>
            </div>
            <div class="col-2">

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
    var i = 0;
    $("#mybutton").click(function(){
    ++i;
    $("#autre").append('<hr> <div class="row"><div class="form-group col-6"><label for="name">Semaine</label><input type="date" name="moreFields['+i+'][semaine]" class="form-control"  aria-describedby="nameHelp" required><small id="nameHelp" class="form-text text-muted">Entrez la semaine</small></div><div class="form-group col-6"><label for="service">Service</label><select class="form-control" name="moreFields['+i+'][service]" required><option value="">----</option> @foreach ($service as $service)<option value="$service->service"></option>@endforeach</select><small id="nameHelp" class="form-text text-muted">Entrez la service</small></div> </div>  <div class="row"><div class="form-group col-6"><label for="name">intitule activite</label><input type="text" name="moreFields['+i+'][intitule_activite]" class="form-control"  aria-describedby="nameHelp" required><small id="nameHelp" class="form-text text-muted">Entrez lintitule activite</small></div><div class="form-group col-6"><label for="name">Details</label> <input type="text" name="moreFields['+i+'][details]" class="form-control"  aria-describedby="nameHelp" required><small id="nameHelp" class="form-text text-muted">Entrez  details</small></div><div class="form-group col-6"><label for="description">Description</label><textarea type="text" name="moreFields['+i+'][description]" class="form-control"  aria-describedby="nameHelp" required></textarea></div><div class="form-group col-6"> <label for="description">Observation</label> <textarea type="textarea" name="moreFields['+i+'][observation]" class="form-control"  aria-describedby="nameHelp"></textarea></div> </div> ');
    });
    </script> 
@endsection
