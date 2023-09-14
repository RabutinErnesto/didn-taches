@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="card-title">Ajouter collaborateur de la tache <span class="badge badge-dark">#{{ $tache->id }}</span></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('taches.collabo', $tache->id) }}" method="post">
                @csrf
                @method('put')
                        <div class="form-group">
                            <label for="name">Collaborateurs</label>
                            <input type="text" name="collaborateur" value="{{$tache->collaborateur}}"  class="form-control" aria-describedby="nameHelp">
                            <small>Taper les collaborateurs</small>
                        </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>


@endsection
