@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                {!! Form::model($prerequis, ['method' => 'PATCH','action' => ['App\Http\Controllers\PrerequisController@update', $prerequis->id],'files' =>true]) !!}
                @csrf
                <h2>Prérequis</h2>

                <form>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control"  name="nom_fr" value="{{ $prerequis->nom_fr}}" >
                        <br>
                    </div>


                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>








            </div>
        </div>
    </div>
    @include('admin.includes.flash_message')
@endsection
