@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {!! Form::open(['action' => 'App\Http\Controllers\FormationController@store','method' => 'POST','files' =>true]) !!}

                @csrf
                <h2>Ajouter une formation</h2>

                <div class="row">
                    <div class="group-form">
                        <label for="formation_id">Type de formation : </label>
                        <select id="" name="formation_id" class="form-control">

                            @foreach ($type_formations as $value)



                                <option value="{{ $value->id }}">{{ $value->nom_fr }}</option>

                            @endforeach
                        </select>

                        <br>
                    </div>

                    <div class="group-form">
                        <label for="annee_fiscale_id">Année fiscale: </label>
                        <select id="" name="annee_fiscale_id" class="form-control">
                            @foreach($annéefiscale as $value)

                                <option value="{{ $value->id }}">{{ $value->annee }}</option>

                            @endforeach
                        </select>
                    </div>
                    <br>


                    <div class="group-form">
                        <label for="">Formation offerte en : </label>
                        <select id="" name="langue_formation" class="form-control">
                            <option value="français" >français</option>
                            <option value="anglais" >anglais</option>
                        </select>
                    </div>
                    <br>

                    <div class="group-form">
                        Formatrice # 1

                        <select id="" name="id_formatrice_1" class="form-control">
                            <option value=0>---</option>
                            @foreach($accompagnantes as $value)

                                <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}">{{ $value->prenom.' '.$value->nom }}</option>

                            @endforeach
                        </select>


                    </div>
                    <br>

                    <div class="group-form">
                        Formatrice # 2

                        <select id="" name="id_formatrice_2" class="form-control">
                            <option value=0>---</option>
                            @foreach($accompagnantes as $value)

                                <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}">{{ $value->prenom.' '.$value->nom }}</option>

                            @endforeach
                        </select>


                    </div>
                    <br>

                    <div class="group-form">
                        Formatrice # 3

                        <select id="" name="id_formatrice_3" class="form-control">
                            <option value=0>---</option>
                            @foreach($accompagnantes as $value)

                                <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}">{{ $value->prenom.' '.$value->nom }}</option>

                            @endforeach
                        </select>


                    </div>
                    <br>
                </div>


                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Francais</h4>

                        <div class="group-form">
                            <label for="nom_fr">Nom : </label>
                            <input type="text" class="form-control" value=""  name="nom_fr" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="date_fr">Les dates : </label>
                            <textarea type="text" class="form-control" name="date_fr" id="mytextarea" ></textarea>

                        </div>
                        <br>

                        <div class="group-form">
                            <label>Formulaire pdf</label>

                            <input name="visuel_fr" type="file" class="form-control" />
                        </div>
                        <br>


                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">


                        <div class="group-form">
                            <h4>Anglais</h4>
                            <label for="nom_en">Nom : </label>
                            <input type="text" class="form-control" value=""  name="nom_en" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="date_en">Les dates : </label>
                            <textarea type="text" class="form-control" name="date_en" ></textarea>
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Formulaire pdf</label>

                            <input name="visuel_en" type="file" class="form-control"/>
                        </div>
                        <br>


                    </div>

                </div>

                <hr>



            </div>
            <!--END SAME ROW OTHER SECTION -->

            <div class="row">

                <div class="group-form" style="margin-left: -15px;">

                    <div style='width:100%; background-color:#fff; padding:5px'>
                        <div>
                            <label for="nom">Prix paiement complet <span style="color: red">numérique</span></label><br />
                            <input name="prix_total" type="number" class="form-control"  style="display: inline; width: 60%" value="" />

                        </div>
                        <br />


                        <div>
                            <label for="nom">Surplus Paypal pour le paiement complet <span style="color: red">numérique</span></label><br />
                            <input name="paypal_surplus_total" type="number" class="form-control"  style="display: inline; width: 60%" value="" />

                        </div>
                        <br />
                    </div>
                    <div style='width:100%; background-color:#fff; padding:5px'>
                        <div>
                            <label for="nom">Prix dépôt <span style="color: red">numérique</span></label><br />
                            <input name="prix_depot" type="number" class="form-control"  style="display: inline; width: 60%" value="" /> $

                        </div>
                        <br />
                        <div>
                            <label for="nom">Surplus Paypal pour le dépôt <span style="color: red">numérique</span></label><br />
                            <input name="paypal_surplus_depot" type="number" class="form-control"  style="display: inline; width: 60%" value="" /> $

                        </div>
                        <br />
                    </div>
                    <div style='width:100%; background-color:#fff; padding:5px'>
                        <div>
                            <label for="nom">Prix balance de paiement <span style="color: red">numérique</span></label><br />
                            <input name="prix_balance" type="number" class="form-control"  style="display: inline; width: 60%" value="" /> $

                        </div>
                        <br />
                        <div>
                            <label for="nom">Surplus Paypal pour la balance de paiement <span style="color: red">numérique</span></label><br />
                            <input name="paypal_surplus_balance" type="number" class="form-control"  style="display: inline; width: 60%" value="" /> $

                        </div>
                        <br />
                    </div>
                    <div>
                        <label for="nom">Nombre de places disponibles</label><br />
                        <input name="nbr_places" type="number" class="form-control"  style="display: inline; width: 60%" value="" />

                    </div>
                    <br />
                    <div>
                        <label for="nom">Date limite pour le paiement</label><br />
                        <input name="date_limite" type="date" class="form-control"  style="display: inline; width: 60%" value="" />

                    </div>
                    <br />

                    <div style="padding-bottom: 15px;">
                        <label for="recu_donne">Les reçus ont été donnés
                            <input name="recu_donne" type="checkbox"  style="width:20px;"  value="" /></label>
                    </div>

                    <div  style="padding-bottom: 15px;">
                        <label for="certificat_donne">Les certificats ont été donnés
                            <input name="certificat_donne" type="checkbox"   style="width:20px;"  value=""/></label>
                    </div>

                    <div  style="padding-bottom: 15px;">
                        <label for="nom_fr">Actif
                            <select name="actif"  style="padding: 5px;">
                                <option value="1" >oui</option>
                                <option value="0" >non</option>
                            </select></label>
                    </div>


                </div>

            </div>





            <div class="group-form">
                {!! Form::submit('Sauvegarder',['class'=> 'btn btn-info']) !!}
                <button type="submit" class="btn btn-dark waves-effect waves-light">Annuler</button>
                {!! Form::close() !!}

            </div>



            </div>
        </div>
    </div>
    @include('admin.includes.flash_message')
@endsection
