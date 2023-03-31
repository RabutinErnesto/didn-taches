@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      Création d'une nouvelle activites
    </div>
    <div class="card-body">
      <form  action="{{ route('activites.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <h5>Activite realisees et en cours</h5>
        <div id=autre>
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
                    <input type="text" name="intitule_activite[]" class="form-control"  aria-describedby="nameHelp" required>
                    <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
                </div>
                <div class="form-group col-6">
                    <label for="name">Status</label>
                    <input type="text" name="status[]" class="form-control"  aria-describedby="nameHelp" required>
                    <small id="nameHelp" class="form-text text-muted">Entrez  status</small>
                </div>



              <div class="form-group col-6">
                <label for="description">Description</label>
                <textarea type="text" name="description[]" class="form-control"  aria-describedby="nameHelp" required></textarea>
            </div>
            <div class="form-group col-6">
              <label for="description">Observation</label>
              <textarea type="textarea" name="observation[]" class="form-control"  aria-describedby="nameHelp"></textarea>
            </div>
            </div>
        </div>
            <div class="col-12 text-right p-2"> <a class="btn btn-success" id="mybutton">plus</a></div>

        <hr>
        <h5>Activite a realiser</h5>
        <div id="arealise">
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Semaine</label>
                    <input type="date" name="semaine2" class="form-control"  aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">Entrez la semaine</small>
                </div>
            </div>

                <hr>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">intitule activite</label>
                        <input type="text" name="intitule_activite2[]" class="form-control"  aria-describedby="nameHelp" >
                        <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Deadline</label>
                        <input type="text" name="deadline[]" class="form-control"  aria-describedby="nameHelp" >
                        <small id="nameHelp" class="form-text text-muted">Entrez  deadline</small>
                    </div>



                  <div class="form-group col-6">
                    <label for="description">Description</label>
                    <textarea type="text" name="description2[]" class="form-control"  aria-describedby="nameHelp"></textarea>
                </div>
                <div class="form-group col-6">
                  <label for="description">Observation</label>
                  <textarea type="textarea" name="observation2[]" class="form-control"  aria-describedby="nameHelp"></textarea>
                </div>
                </div>

        </div>
        <div class="col-12 text-right p-2"> <a class="btn btn-success" id="mybutton2">plus</a></div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </div>

  <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    var x = 0;
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#mybutton'); //Add button selector
    var autre = $('#autre'); //Input field wrapper
    var fieldHTML ='<div><hr><div class="row"><div class="form-group col-6"><label for="name">intitule activite</label><input type="text" name="intitule_activite[]" class="form-control"  aria-describedby="nameHelp"><small id="nameHelp" class="form-text text-muted">Entrez lintitule activite</small></div><div class="form-group col-6"><label for="name">Status</label> <input type="text" name="status[]" class="form-control"  aria-describedby="nameHelp"><small id="nameHelp" class="form-text text-muted">Entrez  tatus</small></div><div class="form-group col-6"><label for="description">Description</label><textarea type="text" name="description[]" class="form-control"  aria-describedby="nameHelp"></textarea></div><div class="form-group col-6"> <label for="description">Observation</label> <textarea type="textarea" name="observation[]" class="form-control"  aria-describedby="nameHelp"></textarea></div></div> </div>';

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(autre).append(fieldHTML); //Add field html
        }
    });
});

$(document).ready(function(){
    var i = 0;
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#mybutton2'); //Add button selector
    var autre = $('#arealise'); //Input field wrapper
    var fieldHTML ='<div><hr><div class="row"><div class="form-group col-6"><label for="name">intitule activite</label><input type="text" name="intitule_activite2[]" class="form-control"  aria-describedby="nameHelp"><small id="nameHelp" class="form-text text-muted">Entrez lintitule activite</small></div><div class="form-group col-6"><label for="name">Deadline</label> <input type="text" name=deadline[]" class="form-control"  aria-describedby="nameHelp"><small id="nameHelp" class="form-text text-muted">Entrez deadline</small></div><div class="form-group col-6"><label for="description">Description</label><textarea type="text" name="description2[]" class="form-control"  aria-describedby="nameHelp"></textarea></div><div class="form-group col-6"> <label for="description">Observation</label> <textarea type="textarea" name="observation2[]" class="form-control"  aria-describedby="nameHelp"></textarea></div></div> </div>';

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(i < maxField){
            i++; //Increment field counter
            $(autre).append(fieldHTML); //Add field html
        }
    });
});
    </script>
@endsection
