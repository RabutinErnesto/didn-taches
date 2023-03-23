@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xs">
       <a name="" id="" class="btn btn-primary m-2" href="{{ route('activites.create') }}" role="button">Ajouter une activite</a>
    </div>

    <div class="col-xs">
        <a name="" id="" class="btn btn-warning m-2" href="{{route('activites.index')}}" role="button">Voir tous les activites</a>
    </div>
  </div>
</div>
@if ($activite->isNotEmpty())
@foreach ($activite as $data)
<div class="alert alert-success" role="alert">
    <div class="row">
        <div class="col-sm">
            <p class="my-0">
                <strong>
                    <span class="badge badge-dark">
                        #{{$data->id}}
                    </span>
                </strong>
                <small>
                    Crée {{ $data->created_at->from() }} par
                    {{ Auth::user()->id ==$data->user->id ? 'moi' : $data->user->name  }}
                </small>
            </p>
            <details>
                <summary>
                    <strong>{{ $data->intitule_activite}}, semaine: {{$data->semaine}}</strong>
                </summary>
                <p>{{ $data->description}}</p>
            </details>
        </div>
        <div class="col-sm form-inline justify-content-end my-1">
            <a name="" id="" class="btn btn-success mx-1" href="{{route('pdf', $data)}}" role="button">Imprimer</a>
            <a name="" id="" class="btn btn-warning mx-1" href="{{route('activites.show', $data)}}" role="button">Voir</a>

            @can('edit', $data)
            <a name="" id="" class="btn btn-info mx-1" href="{{ route('activites.edit',$data->id) }}" role="button">Editer</a>
            @elsecannot('edit')
            <a name="" id="" class="btn btn-info mx-1 disabled" href="{{ route('activites.edit',$data->id) }}" role="button">Editer</a>
            @endcan
            @can('delete',$data)
            <form action="{{ route('activites.destroy',$data->id) }}" method ="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mx-1">Effacer </button>
            </form>
            @elsecannot('delete',$data)
            <form action="{{ route('activites.destroy',$data->id) }}" method ="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mx-1 " disabled>Effacer </button>
            </form>
            @endcan

            </form>
        </div>
    </div>
</div>
@endforeach
@else
<div class="alert alert-danger py-4">
    <h3>Pas d'activités</h3>
</div>
@endif




@endsection


