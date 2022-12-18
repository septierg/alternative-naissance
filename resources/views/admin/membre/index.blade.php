@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Listes des Membres</h2>
                @if(count($membres) > 0)
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        @foreach($membres as $m)
                        <td>{{ $m->nom}}</td>
                        <td>{{ $m->prenom}}</td>
                        <td>{{ $m->status}}</td>
                    </tr>
                        @endforeach
                    @endif

                </table>

            </div>
        </div>
    </div>
@endsection
