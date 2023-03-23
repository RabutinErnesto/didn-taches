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
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Semaine</label>
                <input type="date" name="semaine" class="form-control"  aria-describedby="nameHelp" disabled>
                <small id="nameHelp" class="form-text text-muted">Entrez la semaine</small>
            </div>

            <div class="form-group col-6">
                <label for="name">Service</label>
                <select class="form-control" name="service" required>
                    <option value="{{$activite->service}}">{{$activite->service}}</option>
                    <option value=""></option>
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
                <input type="text" name="intitule_activite" class="form-control" value="{{$activite->intitule_activite}}"  aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Details</label>
                <input type="text" name="details" value="{{$activite->details}}" class="form-control"  aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted">Entrez  details</small>
            </div>
        </div>
        <div class="row">

          <div class="form-group col-6">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" value=""  aria-describedby="nameHelp" required>{{$activite->description}}</textarea>
        </div>
        <div class="form-group col-6">
          <label for="description">Observation</label>
          <textarea type="textarea" name="observation" class="form-control" value=""  aria-describedby="nameHelp">{{$activite->observation}}</textarea>
      </div>
        </div>  <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
</div>


@endsection
