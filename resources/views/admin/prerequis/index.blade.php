@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('prerequis.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter un Prérequis</button></a>
                <br>

                <h2>Prérequis</h2>
                @if(count($prerequis) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            @foreach($prerequis as $p)
                                <td>{{ $p->nom_fr}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('prerequis.edit', $p->id)}}">Modifier</a>

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','action' => ['App\Http\Controllers\PrerequisController@destroy', $p->id]]) !!}
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
