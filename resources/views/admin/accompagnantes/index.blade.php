@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Listes des Accompagnantes</h2>
                @if(count($accompagnantes) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            @foreach($accompagnantes as $a)
                                <td>{{ $a->nom}}</td>
                                <td>{{ $a->prenom}}</td>
                                <td>{{ $a->status}}</td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
            </div>
        </div>
    </div>
@endsection
