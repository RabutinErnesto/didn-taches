@extends('layouts.app')

@section('content')

    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header" >
                    <a href="{{route('users.create')}}">Nouveau utilisateur</a>
                </div>

                <div class="card-body">
                <table class="table table-striped" id="dataTable">
                <thead>
                <tr>
                <td scope="col">#</td>
                <td scope="col">Nom</td>
                <td scope="col">Email</td>
                <td scope="col">Roles</td>
                <td scope="col">Action</td>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $users)
                        <tr>
                        <th scope="row">{{ $users->id }}</th>
                        <td scope="col">{{ $users->name}}</td>
                        <td scope="col">{{$users->email}}</td>
                        <td scope="col">{{ implode(',', $users->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td scope="col">
                        <a href="{{route('users.edit' , $users->id)}}"> <button class="btn btn-success" >Editer</button> </a>
                            @can('delete-users')
                            <form action="{{route('users.destroy', $users->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('Delete')
                                    <button class="btn btn-danger" >Supprimer</button>
                            </form>
                            @endcan
                         </td>
                         </tr>
                @endforeach

                </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
@endsection
