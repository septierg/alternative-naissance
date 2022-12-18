@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Demandes d'accompagnements aux relevailles</h2>
                @if(count($relevailles) > 0)
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
                            @foreach($relevailles as $r)
                                <td>{{ $r->id}}</td>
                                <td>{{ $r->annee_fiscale}}</td>
                                <td>{{ $r->date_demande}}</td>
                                <td>{{ $r->langue_parlee}}</td>
                                <td>{{ $r->nom??null}}</td>
                                <td>{{ $r->prenom??null}}</td>
                                <td><a href="{{Route('relevaille.edit', $r->id)}}"  class="btn btn-primary"> Modifier</a></td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
            </div>
        </div>
    </div>
@endsection
