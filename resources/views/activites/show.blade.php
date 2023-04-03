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

                                <th  colspan="4" class="border-0"> <h5>Semaine du : {{$activite->semaine}} </h5> </th>

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

                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[0] )
                                    <td>{{$k[0]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[1] )
                                    <td>{{$k[1]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset($k[2])
                                    <td>{{$k[2]}}</td>


                                    @else

                                    @endisset
                                    @endforeach
                                </tr>

                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[3] )
                                    <td>{{$k[3]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[4] )
                                    <td>{{$k[4]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[5] )
                                    <td>{{$k[5]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[6] )
                                    <td>{{$k[6]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[7] )
                                    <td>{{$k[7]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[8] )
                                    <td>{{$k[8]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($array as $key=>$k)
                                    @isset ($k[9] )
                                    <td>{{$k[9]}}</td>
                                    @else

                                    @endisset

                                    @endforeach
                                </tr>
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
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset ($k2[0] )
                                <td>{{$k2[0]}}</td>
                                @else

                                @endisset

                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset ($k2[1] )
                                <td>{{$k2[1]}}</td>
                                @else

                                @endisset

                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset($k2[2])
                                <td>{{$k2[2]}}</td>


                                @else

                                    @endisset
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset ($k2[3] )
                                <td>{{$k2[3]}}</td>
                                @else

                                @endisset

                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset ($k2[4] )
                                <td>{{$k2[4]}}</td>
                                @else

                                @endisset

                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset($k2[5])
                                <td>{{$k2[5]}}</td>


                                @else

                                    @endisset
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset($k2[6])
                                <td>{{$k2[6]}}</td>


                                @else

                                    @endisset
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset($k2[7])
                                <td>{{$k2[7]}}</td>


                                @else

                                    @endisset
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset($k2[8])
                                <td>{{$k2[8]}}</td>


                                @else

                                    @endisset
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($array2 as $key=>$k2)
                                @isset($k2[9])
                                <td>{{$k2[9]}}</td>


                                @else

                                    @endisset
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

            </div>
    </div>
@endsection
