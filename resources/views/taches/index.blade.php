@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs">
                <a name="" id="" class="btn btn-primary m-2" href="{{ route('taches.create') }}"
                    role="button">Ajouter une tache</a>
            </div>
            <div class="col-xs">
                <a name="" id="" class="btn btn-dark m-2" href="{{ route('taches.index') }}"
                    role="button">Voir toutes les taches </a>
            </div>


            {{-- @if (Route::currentRouteName() == 'taches.index')  --}}
            <div class="col-xs">
                <a name="" id="" class="btn btn-warning m-2" href="{{ route('taches.undone') }}"
                    role="button">Voir les taches ouvertes</a>
            </div>
            <div class="col-xs">
                <a name="" id="" class="btn btn-success m-2" href="{{ route('taches.done') }}"
                    role="button">Voir les taches terminées</a>
            </div>
            {{-- @elseif(Route::currentRouteName()=='taches.done') --}}
            {{-- <div class="col-xs">
        <a name="" id="" class="btn btn-dark m-2" href="{{ route('taches.index') }}" role="button">Voir toutes les taches </a>
    </div> --}}
            {{-- <div class="col-xs">
        <a name="" id="" class="btn btn-warning m-2" href="{{ route('taches.undone') }}" role="button">Voir les taches ouvertes</a>
    </div>  --}}
            {{-- @elseif(Route::currentRouteName()=='taches.undone') --}}
            {{-- <div class="col-xs">
        <a name="" id="" class="btn btn-dark m-2" href="{{ route('taches.index') }}" role="button">Voir toutes les taches </a>
    </div>
    <div class="col-xs">
        <a name="" id="" class="btn btn-success m-2" href="{{ route('taches.done') }}" role="button">Voir les taches terminées</a>
    </div> --}}
            {{-- @endif --}}
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p class="mb-0">Les Taches</p>
            <div class="d-flex">
                <form action="{{ route('filtrer-taches') }}" method="get" class="mb-0 mr-3">
                    <select name="periode" class="form-control d-inline-block w-auto" onchange="this.form.submit()">
                        <option value="">Toutes les périodes</option>
                        <option value="5" {{ request('periode') == '5' ? 'selected' : '' }}>Derniers 5 jours</option>
                        <option value="10" {{ request('periode') == '10' ? 'selected' : '' }}>Derniers 10 jours</option>
                        <option value="30" {{ request('periode') == '30' ? 'selected' : '' }}>Derniers 30 jours</option>
                    </select>
                </form>
                <a class="btn btn-info"
                    href="{{ route('telecharger-excel-tache', ['periode' => request('periode')]) }}">Exporter en Excel</a>
            </div>
        </div>
        <div class="card-body">
            @foreach ($tache as $data)
                @if (empty(request('periode')) || $data->created_at->gte(now()->subDays(request('periode'))))
                    <div class="alert alert-{{ $data->done ? 'success' : 'danger' }}" role="alert">
                        <div class="row">
                            <div class="col-sm">
                                <p class="my-0">
                                    <strong>
                                        <span class="badge badge-dark">
                                            #{{ $data->id }}
                                        </span>
                                    </strong>
                                    <small>
                                        Crée {{ $data->created_at->from() }} par
                                        {{ Auth::user()->id == $data->user->id ? 'moi' : $data->user->name }}
                                        @if ($data->tacheAffectedTo && $data->tacheAffectedTo->id == Auth::user()->id)
                                            affectée à moi
                                        @elseif($data->tacheAffectedTo)
                                            {{ $data->tacheAffectedTo ? ', affectée à ' . $data->tacheAffectedTo->name : '' }}
                                        @endif
                                        {{-- display affected by someone or by user himself --}}
                                        @if ($data->tacheAffectedTo && $data->tacheAffectedBy && $data->tacheAffectedBy->id == Auth::user()->id)
                                            par moi-même :D
                                        @elseif ($data->tacheAffectedTo && $data->tacheAffectedBy && $data->tacheAffectedBy->id != Auth::user()->id)
                                            par {{ $data->tacheAffectedBy->name }}
                                        @endif
                                    </small>
                                    @if ($data->done)
                                        <small>
                                            <p>
                                                Terminée
                                                {{ $data->updated_at->from() }} - Terminée en
                                                {{ $data->updated_at->diffForHumans($data->created_at, 1) }}
                                            </p>
                                        </small>
                                    @endif
                                </p>
                                <details>
                                    <summary>
                                        <strong>
                                            @if ($data->maintenance_id == 'Autres')
                                                {{ $data->maintenance_id }}
                                            @else
                                                {{ $data->maintenance->titre }}
                                            @endif

                                            @if ($data->done)
                                                <span class="badge badge-success">Terminé</span>
                                            @endif
                                        </strong>
                                    </summary>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mt-2">{{ $data->tache }}</p>
                                            @if ($data->tache_faire)
                                                <p class="mt-2"> Tache a faire {{ $data->tache_faire }}</p>
                                            @endif

                                            @if ($data->description)
                                                <p> <strong>Description :
                                                    </strong> {{ $data->description }} </p>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            @if ($data->nom_proprietaire)
                                                <p class="mt-2">Nom : {{ $data->nom_proprietaire }}</p>
                                                <p>Direction: {{ $data->direction->abr }}/{{ $data->service->abr }}</p>
                                                <p>Porte : {{ $data->porte }} Batiment : {{ $data->batiment }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    @if (Auth::user()->id == $data->tacheAffectedTo->id)
                                        <span>Collaborateur : {{ $data->collaborateur }}</span>
                                    @endif

                                </details>
                            </div>
                            <div class="col-sm form-inline justify-content-end my-1">

                                @if (Auth::user()->id == $data->user->id)
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Affecter à
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($users as $user)
                                                <a href="taches/{{ $data->id }}/affectedto/{{ $user->id }}"
                                                    class="dropdown-item">{{ $user->name }}</a>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                                <a href="{{route('taches.ajoutcollabo', $data->id)}}" class="btn btn-secondary mx-1 btn-sm">Collaborateurs</a>
                                @if ($data->done == 0)
                                    @if (Auth::user()->id == $data->tacheAffectedTo->id || Auth::user()->id == $data->user->id)
                                        <form action="{{ route('taches.makedone', $data->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success mx-1"
                                                style="min-width:110px">Terminé </button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('taches.makeundone', $data->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning mx-1" style="min-width:110px">Non
                                            terminé</button>
                                    </form>
                                @endif
                                @can('edit', $data)
                                    <a name="" id="" class="btn btn-info mx-1"
                                        href="{{ route('taches.edit', $data->id) }}" role="button">Editer</a>
                                @elsecannot('edit',$data)
                                    <a name="" id="" class="btn btn-info mx-1 disabled"
                                        href="{{ route('taches.edit', $data->id) }}" role="button">Editer</a>
                                @endcan
                                @can('delete', $data)
                                    <form action="{{ route('taches.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1">Effacer </button>
                                    </form>
                                @elsecannot('delete',$data)
                                    <form action="{{ route('taches.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1 " disabled>Effacer </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            {{ $tache->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>




@endsection
