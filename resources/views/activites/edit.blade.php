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





            @isset($array[0])
            <hr>
            <div class="row">
            <div class="form-group col-6">
                <label for="name">intitule activite</label>

                <input type="text" name="intitule_activite" class="form-control"
                value="{{$array[0][0]}}"
                 aria-describedby="nameHelp" required>

                <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Status</label>
                <input type="text" name="status" value="{{$array[2][0]}}" class="form-control"  aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted">Entrez  status</small>
            </div>

        </div>

        <div class="row">

          <div class="form-group col-6">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" value=""  aria-describedby="nameHelp" required>{{$array[1][0]}}</textarea>
        </div>
        <div class="form-group col-6">
          <label for="description">Observation</label>
          <textarea type="textarea" name="observation" class="form-control" value=""  aria-describedby="nameHelp">{{$array[3][0]}}</textarea>
         </div>
        </div>
        @else
        @endisset

        @isset($array[1])
        <hr>
        <div class="row">
        <div class="form-group col-6">
            <label for="name">intitule activite</label>

            <input type="text" name="intitule_activite" class="form-control"
            value="{{$array[0][1]}}"
             aria-describedby="nameHelp" required>

            <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
        </div>
        <div class="form-group col-6">
            <label for="name">Status</label>
            <input type="text" name="status" value="{{$array[2][1]}}" class="form-control"  aria-describedby="nameHelp" required>
            <small id="nameHelp" class="form-text text-muted">Entrez  status</small>
        </div>

    </div>

    <div class="row">

      <div class="form-group col-6">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" value=""  aria-describedby="nameHelp" required>{{$array[1][1]}}</textarea>
    </div>
    <div class="form-group col-6">
      <label for="description">Observation</label>
      <textarea type="textarea" name="observation" class="form-control" value=""  aria-describedby="nameHelp">{{$array[3][1]}}</textarea>
     </div>
    </div>
    @else
    @endisset

    @isset($array[2])
    <hr>
    <div class="row">
    <div class="form-group col-6">
        <label for="name">intitule activite</label>

        <input type="text" name="intitule_activite" class="form-control"
        value="{{$array[0][2]}}"
         aria-describedby="nameHelp" required>

        <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
    </div>
    <div class="form-group col-6">
        <label for="name">Status</label>
        <input type="text" name="status" value="{{$array[2][2]}}" class="form-control"  aria-describedby="nameHelp" required>
        <small id="nameHelp" class="form-text text-muted">Entrez  status</small>
    </div>

</div>

<div class="row">

  <div class="form-group col-6">
    <label for="description">Description</label>
    <textarea type="text" name="description" class="form-control" value=""  aria-describedby="nameHelp" required>{{$array[1][2]}}</textarea>
</div>
<div class="form-group col-6">
  <label for="description">Observation</label>
  <textarea type="textarea" name="observation" class="form-control" value=""  aria-describedby="nameHelp">{{$array[3][2]}}</textarea>
 </div>
</div>
@else
@endisset




         <hr>

         <div class="row">
            <div class="form-group col-6">
                <label for="name">Semaine</label>
                <input type="date" name="semaine" class="form-control"  aria-describedby="nameHelp" disabled>
                <small id="nameHelp" class="form-text text-muted">Entrez la semaine</small>
            </div>

            <div class="form-group col-6">
                <label for="name">Service</label>
                <select class="form-control" name="service" required>
                    <option value="{{$activite->service2}}">{{$activite->service2}}</option>
                    <option value=""></option>
                    @foreach ($service2 as $service)
                    <option value="{{$service->abr}}">{{$service->abr}}</option>
                    @endforeach
                </select>
                <small id="nameHelp" class="form-text text-muted">Entrez la service</small>
            </div>
        </div>

         <div class="row">
            <div class="form-group col-6">
                <label for="name">intitule activite</label>
                <input type="text" name="intitule_activite2" value="{{$activite->intitule_activite2}}" class="form-control"  aria-describedby="nameHelp" >
                <small id="nameHelp" class="form-text text-muted">Entrez l'intitule activite</small>
            </div>
            <div class="form-group col-6">
                <label for="name">Deadline</label>
                <input type="text" name="deadline" class="form-control" value="{{$activite->deadline}}"  aria-describedby="nameHelp" >
                <small id="nameHelp" class="form-text text-muted">Entrez  deadline</small>
            </div>



          <div class="form-group col-6">
            <label for="description">Description</label>
            <textarea type="text" name="description2" class="form-control"  aria-describedby="nameHelp">{{$activite->description2}}</textarea>
        </div>
        <div class="form-group col-6">
          <label for="description">Observation</label>
          <textarea type="textarea" name="observation2" class="form-control"  aria-describedby="nameHelp">{{$activite->observation2}}</textarea>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
</div>
<script src="{{asset('js/jquery-3.2.1.js')}}"></script>
@endsection
