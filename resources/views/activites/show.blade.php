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


                    <table class="table table-bordered" style="table-layout:fixed">
                        <thead class="text-center">
                            <tr>
                                <th  class="" colspan="4">  <h6><strong>ACTIVITES REALISEES et en COURS</strong></h6> </th>
                            </tr>


                        </thead>

                        <tbody class="text-center">
                            <tr class="border-top">
                                <th colspan="4" class="border-0"> <h5>Semaine du : {{$activite->semaine}} </h5> </th>
                            </tr>
                            <tr class="border-top">
                                <th colspan="4"  class="border-0"><p> <strong>SERVICE :{{$activite->service}}</strong></p></th>
                            </tr>
                            <tr class="">
                                <td scope="row"> <strong>Intitulé de l'activité</strong> </td>
                                <td><strong>Description</strong> </td>
                                <td><strong>Status</strong> </td>
                                <td><strong>Observations</strong></td>
                            </tr>

                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    @foreach ($array as $key => $k)
                                        @isset($k[$i])
                                            <td>{{$k[$i]}}</td>
                                        @endisset
                                    @endforeach
                                </tr>
                            @endfor
                        </tbody>

                    </table>


                    <table class="table table-bordered " style="table-layout:fixed">
                        <thead class="text-center">
                            <tr>

                                <th  colspan="4">  <h6><strong>ACTIVITES A REALISER</strong></h6> </th>

                            </tr>


                        </thead>

                        <tbody class="text-center">
                            <tr class="border-top">

                                <th colspan="4"  class="border-0"> <h5>Semaine du : {{$activite->semaine2}} </h5> </th>

                            </tr>
                            <tr class="border-top">

                                <th colspan="4"  class="border-0"><p> <strong>SERVICE :{{$activite->service2}}</strong> </p> </th>

                            </tr>
                            <tr class="">
                                <td scope="row"> <strong>Intitulé de l'activité</strong> </td>
                                <td><strong>Description</strong> </td>
                                <td><strong>Deadline</strong> </td>
                                <td><strong>Observations</strong></td>
                            </tr>
                            @for ($i = 0; $i < 10; $i++)
                            <tr>
                                @foreach ($array2 as $key => $k)
                                    @isset($k[$i])
                                        <td>{{$k[$i]}}</td>
                                    @endisset
                                @endforeach
                            </tr>
                        @endfor
                        </tbody>
                    </table>

            </div>
    </div>
@endsection
