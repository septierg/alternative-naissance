@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                {!! Form::model($statutAccompagnantes, ['method' => 'PATCH','action' => ['App\Http\Controllers\StatutAccompagnantesController@update', $statutAccompagnantes->id],'files' =>true]) !!}
                @csrf
                <h2>Statut des Accompagnantes</h2>

                <form>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control"  name="nom" value="{{ $statutAccompagnantes->nom}}" >
                        <br>
                    </div>


                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>








            </div>
        </div>
    </div>
    @include('admin.includes.flash_message')
@endsection
