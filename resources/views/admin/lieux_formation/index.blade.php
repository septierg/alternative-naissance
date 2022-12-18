@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('lieux_formation.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter un Lieu</button></a>
                <br>
                <h2>Les différents lieux de formation</h2>
                @if(count($lieuxformation) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            @foreach($lieuxformation as $l)
                                <td>{{ $l->nom}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('lieux_formation.edit', $l->id)}}">Modifier</a>

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','action' => ['App\Http\Controllers\LieuxFormationController@destroy', $l->id]]) !!}
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
