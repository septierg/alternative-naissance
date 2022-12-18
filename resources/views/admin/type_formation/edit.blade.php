@extends('layouts.admin')

@section('content')

    <div class="container">



        <div class="row justify-content-center">

            <div class="col-md-12">

                {!! Form::model($type_formations, ['method' => 'PATCH','action' => ['App\Http\Controllers\TypeFormationController@update', $type_formations->id],'files' =>true]) !!}
                @csrf
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Modification de l'inscription</h4>



                        <div class="group-form">
                            <h4>Informations sur la clientele</h4>
                            <label for="nom_fr">Titre: </label>
                            <input type="text" class="form-control" value="{{ $type_formations->nom_fr }}"  name="nom_fr" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="texte_fr">Description : </label>
                            <textarea type="text" class="form-control" name="texte_fr" id="mytextarea" >{{ $type_formations->texte_fr }}</textarea>

                        </div>
                        <br>

                        <div class="group-form">
                            <label>Plan de cours</label>

                            @if($type_formations->pdf_fr)
                                <a href="{{  URL::asset('/images/'.$type_formations->pdf_fr) }}"  target="_blank" class="form-control">Voir le plan de cours</a>

                            @endif

                            <input name="visuel_fr" type="file" class="form-control" />
                        </div>
                        <br>




                        <hr>






                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">

                        <h4>Modification de l'inscription</h4>

                        <div class="group-form">
                            <h4>Informations sur la clientele</h4>
                            <label for="nom_en">Titre: </label>
                            <input type="text" class="form-control" value="{{ $type_formations->nom_en }}"  name="nom_en" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="texte_fr">Description : </label>
                            <textarea type="text" class="form-control" name="texte_en" >{{ $type_formations->texte_en }}</textarea>
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Plan de cours</label>

                            @if($type_formations->pdf_en)
                                <a href="{{  URL::asset('/images/'.$type_formations->pdf_en) }}"  target="_blank" class="form-control">Voir le plan de cours</a>

                            @endif
                            <input name="visuel_en" type="file" class="form-control"/>
                        </div>
                        <br>




                        <hr>

                    </div>
                    <div class="group-form"  style="margin-top: 30px;">
                        <div class="group-form">
                            <label for="prerequis">Prérequis de lecture : </label>
                            <select id="" name="prerequis" class="form-control">


                                @foreach ($prerequis as $value)

                                            @if($type_formations->prerequis_lecture_id == 0)
                                                <option>Aucun</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 1)
                                                <option>Une naissance heureuse de Isabelle Brabant</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 2)
                                                <option>Le Petit Nourri-Source</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 3)
                                                <option>Une naissance heureuse d'Isabelle Brabant ainsi que le Petit Nourri-Source</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 4)
                                                <option>Le père d'aujourd'hui: qui est-il? Pour une paternité revisitée - Gérald Boutin et Marine de Fréminville (Éditions Nouvelles)</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 5)
                                                <option>Une naissance heureuse d'Isabelle Brabant et La mise au monde de Céline Lemay</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 6)
                                                <option>Le 4e trimestre d'Ingrid Bayot</option>
                                            @endif
                                            @if($type_formations->prerequis_lecture_id == 7)
                                                <option>Soyez l'expert de votre bébé de Mélanie Bilodeau</option>
                                            @endif



                                        <option>{{ $value->nom_fr }}</option>
                                                <input name="prerequis_lecture_id" type="hidden" class="form-control" value="{{ $value->id }}"/>
                                @endforeach
                            </select>
                        </div>
                        <div class="group-form">
                            <label for="visuel">Visuel : </label>


                            @if(isset($type_formations->visuel))
                                <a href="{{  URL::asset('/images/'.$type_formations->visuel) }}"  target="_blank" class="form-control">Voir le visuel</a>

                            @endif
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

                    <hr>



                </div>
                <!--END SAME ROW OTHER SECTION -->



                <div class="group-form">
                    <input type="submit" class=" btn btn-primary form-control" value="Modifier"  name="Update" >
                </div>

            </div>



            </form>




        </div>
    </div>
    </div>
@endsection
