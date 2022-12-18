@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Liste de Requetes</h2>
                <a href="{{route('requetes.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Ajouter une requete</button></a>
                <br>

                @if(count($requetes) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Requete</th>
                        </tr>
                        <tr>
                            @foreach($requetes as $r)
                                <td>{{ $r->nom}}</td>
                                <td>{{ $r->requete}}</td>
                        </tr>
                        @endforeach
                        @endif

                    </table>

            </div>
        </div>
    </div>
@endsection
