@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Rencontre individuelle prénatale</h2>
                <a href="{{route('rencontre.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter une rencontre</button></a>
                <br>
                @if(count($rencontres) > 0)
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Année fiscale</th>
                            <th>Date demande</th>
                            <th>Langue parlée</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            @foreach($rencontres as $r)
                                <td>{{ $r->id}}</td>
                                <td>{{ $r->annee_fiscale}}</td>
                                <td>{{ $r->date_demande}}</td>
                                <td>{{ $r->langue_parlee}}</td>
                                <td>{{ $r->nom??null}}</td>
                                <td>{{ $r->prenom??null}}</td>
                                <td><a href="{{Route('rencontre.edit', $r->id)}}"  class="btn btn-primary"> Modifier</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','action' => ['App\Http\Controllers\RencontreController@destroy', $r->id]]) !!}
                                    {!! Form::submit('Supprimer' ,['class'=> 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
            </div>
        </div>
    </div>
@endsection
