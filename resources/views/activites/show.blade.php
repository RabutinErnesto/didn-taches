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

    <div class="card">

        <div class="m-4">

            <h3 class="text-center p-4"><ins>COMPTE RENDU DES ACTIVITES</ins> </h3>


                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th  class="border-0"></th>
                                <th  class="border-0">  <h4><strong>ACTIVITES REALISEES</strong></h4> </th>
                                <th  class="border-0"></th>
                            </tr>


                        </thead>

                        <tbody class="text-center">
                            <tr class="border-top">
                                <th class="border-0"></th>
                                <th  class="border-0"> <h5>Semaine du : {{$activite->semaine}} </h5> </th>
                                <th  class="border-0"></th>
                            </tr>
                            <tr class="border-top">
                                <th  class="border-0"></th>
                                <th  class="border-0"><p> <strong>SERVICE :{{$activite->service}}</strong> </p> </th>
                                <th  class="border-0"></th>
                            </tr>
                            <tr class="">
                                <td scope="row"> <strong>Intitulé de l'activité</strong> </td>
                                <td><strong>Description</strong> </td>
                                <td><strong>Observations</strong></td>
                            </tr>

                            <tr class="">
                                <td scope="row">{{$activite->intitule_activite}}</td>
                                <td class="col-4">{{$activite->description}}</td>
                                <td class="col-4">{{$activite->observation}}</td>
                            </tr>
                        </tbody>
                    </table>



            </div>
    </div>
@endsection
