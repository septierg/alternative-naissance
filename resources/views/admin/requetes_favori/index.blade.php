@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Liste de Requetes favorites</h2>


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
