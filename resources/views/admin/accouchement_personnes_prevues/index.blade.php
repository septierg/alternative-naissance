@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('accouchement_personnes_prevues.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter une personne prévu</button></a>
                <br>
                <h2>Les différents personnes prévues</h2>
                @if(count($accouchementPersonnesPrevues) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            @foreach($accouchementPersonnesPrevues as $l)
                                <td>{{ $l->nom}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('accouchement_personnes_prevues.edit', $l->id)}}">Modifier</a>

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','action' => ['App\Http\Controllers\AccouchementPersonnesPrevuesController@destroy', $l->id]]) !!}
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
