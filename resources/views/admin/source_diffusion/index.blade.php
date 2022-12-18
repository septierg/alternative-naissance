@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('source_diffusion.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter une source de diffusion</button></a>
                <br>
                <h2>Les différentes source de diffusion</h2>
                @if(count($sourceDiffusion) > 0)
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            @foreach($sourceDiffusion as $l)
                                <td>{{ $l->nom}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('source_diffusion.edit', $l->id)}}">Modifier</a>

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','action' => ['App\Http\Controllers\SourceDiffusionController@destroy', $l->id]]) !!}
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
