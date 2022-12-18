@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                {!! Form::model($preoccupationsAccouchement, ['method' => 'PATCH','action' => ['App\Http\Controllers\PreoccupationsAccouchementController@update', $preoccupationsAccouchement->id],'files' =>true]) !!}
                @csrf
                <h2>Préoccupations Accouchement</h2>

                <form>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control"  name="nom" value="{{ $preoccupationsAccouchement->nom}}" >
                        <br>
                    </div>


                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>








            </div>
        </div>
    </div>
    @include('admin.includes.flash_message')
@endsection
