@extends('layouts.admin')

@section('content')

    <div class="container">



        <div class="row justify-content-center">

            <div class="col-md-12">
                {!! Form::open(['action' => 'App\Http\Controllers\TypeFormationController@store','method' => 'POST','files' =>true]) !!}

                @csrf
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h3>Ajouter un type de formation</h3>
                        <h4>Francais</h4>


                        <div class="group-form">
                            <label for="nom_fr">Titre: </label>
                            <input type="text" class="form-control" value=""  name="nom_fr" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="texte_fr">Description : </label>
                            <textarea type="text" class="form-control" name="texte_fr" id="mytextarea" ></textarea>

                        </div>
                        <br>



                        <hr>






                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">

                        <h3>Ajouter un type de formation</h3>
                        <h4>Anglais</h4>

                        <div class="group-form">
                            <label for="nom_en">Titre: </label>
                            <input type="text" class="form-control" value=""  name="nom_en" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="texte_fr">Description : </label>
                            <textarea type="text" class="form-control" name="texte_en" ></textarea>
                        </div>
                        <br>





                        <hr>

                    </div>
                    <div class="group-form"  style="margin-top: 30px;">
                        <div class="group-form">
                            <label for="prerequis">Prérequis de lecture : </label>
                            <select id="" name="prerequis" class="form-control">


                                @foreach ($prerequis as $value)





                                    <option id="{{ $value->id }}">{{ $value->nom_fr }}</option>
                                    <input name="prerequis_lecture_id" type="hidden" class="form-control" value="{{ $value->id }}"/>
                                @endforeach
                            </select>
                        </div>
                        <div class="group-form">
                            <label for="visuel">Visuel : </label>


                            <input name="visuel_last" type="file" class="form-control"/>

                        </div>
                        <div class="group-form">
                            <label for="visuel">Visuel : </label>
                            <select name="actif" class="form-control">
                                <option value="1">oui</option>
                                <option value="0">non</option>
                            </select>
                        </div>
                    </div>




                </div>
                <!--END SAME ROW OTHER SECTION -->



                <div class="group-form">
                    {!! Form::submit('Sauvegarder',['class'=> 'btn btn-info']) !!}
                    <button type="submit" class="btn btn-dark waves-effect waves-light">Annuler</button>
                    {!! Form::close() !!}

                </div>

            </div>



            </form>




        </div>
    </div>
    </div>
@endsection
