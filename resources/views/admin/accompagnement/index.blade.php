@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Demandes d'accompagnements à la naissance</h2>
                @if(count($accompagnements) > 0)
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Année fiscale</th>
                            <th>Date demande</th>
                            <th>Langue parlée</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            @foreach($accompagnements as $a)
                                <td>{{ $a->id}}</td>
                                <td>{{ $a->annee_fiscale}}</td>
                                <td>{{ $a->date_demande}}</td>
                                <td>{{ $a->langue_parlee}}</td>
                                <td>{{ $a->nom??null}}</td>
                                <td>{{ $a->prenom??null}}</td>
                                <td><a href="{{Route('accompagnement.edit', $a->id)}}"  class="btn btn-primary"> Modifier</a></td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
            </div>
        </div>
    </div>
@endsection
