@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-info">
        <h4 class="card-title">Modification de l'activité <span class="badge badge-dark">#{{ $activite->id }}</span></h4>
    </div>
    <div class="card-body">
      <form action="{{ route('activites.update', $activite->id) }}" method="post">
        @csrf
        @method('put')
        <h5>Activite realisees et en cours</h5>
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Semaine</label>
                <input type="date" name="semaine" class="form-control" aria-describedby="nameHelp" disabled>
                <small id="nameHelp" class="form-text text-muted">Entrez la semaine</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Service</label>
                <select class="form-control" name="service">
                    <option value="{{$activite->service}}">{{$activite->service}}</option>
                    <option value=""></option>
                    @foreach ($service as $serv)
                        <option value="{{$serv->abr}}">{{$serv->abr}}</option>
                    @endforeach
                </select>
                <small id="nameHelp" class="form-text text-muted">Entrez la service</small>
            </div>
        </div>

        @foreach ($array[0] as $index => $intitule)
            @if (!empty($intitule))
                <hr>
                <div id="autre">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">intitule activite</label>
                            <input type="text" name="intitule_activite[]" class="form-control" value="{{$intitule}}" aria-describedby="nameHelp">
                            <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">Status</label>
                            <input type="text" name="status[]" value="{{$array[2][$index]}}" class="form-control" aria-describedby="nameHelp">
                            <small id="nameHelp" class="form-text text-muted">Entrez le statut</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="description">Description</label>
                            <textarea type="text" name="description[]" class="form-control">{{$array[1][$index]}}</textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="description">Observation</label>
                            <textarea type="textarea" name="observation[]" class="form-control">{{$array[3][$index]}}</textarea>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

<div class="col-12 text-right p-2"> <a class="btn btn-success" id="mybutton">plus</a></div>
<h5>Activite a realiser</h5>
         <div id="arealise">
            @foreach ($array2[0] as $index => $intitule)
            @if (!empty($intitule))
                <hr>
                <div id="autre">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">intitule activite</label>
                            <input type="text" name="intitule_activite[]" class="form-control" value="{{$intitule}}" aria-describedby="nameHelp">
                            <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">Status</label>
                            <input type="text" name="status[]" value="{{$array2[2][$index]}}" class="form-control" aria-describedby="nameHelp">
                            <small id="nameHelp" class="form-text text-muted">Entrez le statut</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="description">Description</label>
                            <textarea type="text" name="description[]" class="form-control">{{$array2[1][$index]}}</textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="description">Observation</label>
                            <textarea type="textarea" name="observation[]" class="form-control">{{$array2[3][$index]}}</textarea>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
         </div>
        <div class="col-12 text-right p-2"> <a class="btn btn-success" id="mybutton2">plus</a></div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
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
