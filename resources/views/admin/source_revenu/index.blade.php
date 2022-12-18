@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('source_revenu.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter une source </button></a>
                <br>
                <h2>Source de Revenus</h2>
                @if(count($source_revenu) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            @foreach($source_revenu as $l)
                                <td>{{ $l->nom}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('source_revenu.edit', $l->id)}}">Modifier</a>

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','action' => ['App\Http\Controllers\SourceRevenuController@destroy', $l->id]]) !!}
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
