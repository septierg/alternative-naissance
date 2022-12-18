@extends('layouts.admin')

@section('content')

    <div class="container">



        <div class="row justify-content-center">

            <div class="col-md-12">

                {!! Form::model($formations, ['method' => 'PATCH','action' => ['App\Http\Controllers\FormationController@update', $formations->id],'files' =>true]) !!}
                @csrf
                <h2>Formations et Services</h2>
                <div class="row">
                    <div class="col-md-12">
                    <h4>Modification de l'inscription</h4>
                        <div class="group-form">
                            <label for="formation_id">Type de formation : </label>
                            <select id="" name="formation_id" class="form-control">

                                @foreach ($type_formations as $value)

                                    @if($formations->formation_id == $value->id)
                                        <option value="{{ $value->id }}" selected>{{ $value->nom_fr }}</option>&nbsp;
                                        @continue
                                    @endif

                                    <option value="{{ $value->id }}">{{ $value->nom_fr }}</option>

                                @endforeach
                            </select>

                            <br>
                        </div>

                        <div class="group-form">
                            <label for="annee_fiscale_id">Année fiscale: </label>
                            <select id="" name="annee_fiscale_id" class="form-control">
                                @foreach($annéefiscale as $value)
                                    @if($formations->annee_fiscale_id == $value->id)
                                        <option value="{{ $value->id }}" selected>{{ $value->annee }}</option>&nbsp;
                                        @continue
                                    @endif
                                        <option value="{{ $value->id }}">{{ $value->annee }}</option>

                                @endforeach
                            </select>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="">Formation offerte en : </label>
                            <select id="" name="langue_formation" class="form-control">
                                <option value="français" <?php if($formations->langue_formation == "français") echo "selected"; ?>>français</option>
                                <option value="anglais" <?php if($formations->langue_formation == "anglais") echo "selected"; ?>>anglais</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            Formatrice # 1

                            <select id="" name="id_formatrice_1" class="form-control">
                                <option value=0>---</option>
                                @foreach($accompagnantes as $value)
                                    @if($formations->id_formatrice_1 == $value->id)
                                        <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}" selected>{{ $value->prenom.' '.$value->nom }}</option>&nbsp;
                                        @continue
                                    @endif
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
                                    @if($formations->id_formatrice_2 == $value->id)
                                        <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}" selected>{{ $value->prenom.' '.$value->nom }}</option>&nbsp;
                                        @continue
                                    @endif
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
                                    @if($formations->id_formatrice_3 == $value->id)
                                        <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}" selected>{{ $value->prenom.' '.$value->nom }}</option>&nbsp;
                                        @continue
                                    @endif
                                    <option value="{{ $value->id.'-'.$value->prenom.' '.$value->nom }}">{{ $value->prenom.' '.$value->nom }}</option>

                                @endforeach
                            </select>


                        </div>
                        <br>






                    </div>

                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Francais</h4>

                        <div class="group-form">
                            <label for="nom_fr">Nom : </label>
                            <input type="text" class="form-control" value="{{ $formations->nom_fr }}"  name="nom_fr" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="date_fr">Les dates : </label>
                            <textarea type="text" class="form-control" name="date_fr" id="mytextarea" >{{ $formations->date_fr }}</textarea>

                        </div>
                        <br>

                        <div class="group-form">
                            <label>Formulaire pdf</label>

                            @if($formations->pdf_fr)
                                <a href="{{  URL::asset('/images/'.$formations->pdf_fr) }}"  target="_blank" class="form-control">Voir le plan de cours</a>

                            @endif

                            <input name="visuel_fr" type="file" class="form-control" />
                        </div>
                        <br>


                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">


                        <div class="group-form">
                            <h4>Anglais</h4>
                            <label for="nom_en">Nom : </label>
                            <input type="text" class="form-control" value="{{ $formations->nom_en }}"  name="nom_en" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="date_en">Les dates : </label>
                            <textarea type="text" class="form-control" name="date_en" >{{ $formations->date_en }}</textarea>
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Formulaire pdf</label>

                            @if($formations->pdf_en)
                                <a href="{{  URL::asset('/images/'.$formations->pdf_en) }}"  target="_blank" class="form-control">Voir le plan de cours</a>

                            @endif
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
                                <input name="prix_total" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->prix_total; ?>" /> $

                            </div>
                            <br />


                            <div>
                                <label for="nom">Surplus Paypal pour le paiement complet <span style="color: red">numérique</span></label><br />
                                <input name="paypal_surplus_total" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->paypal_surplus_total; ?>" /> $

                            </div>
                            <br />
                        </div>
                        <div style='width:100%; background-color:#fff; padding:5px'>
                            <div>
                                <label for="nom">Prix dépôt <span style="color: red">numérique</span></label><br />
                                <input name="prix_depot" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->prix_depot; ?>" /> $

                            </div>
                            <br />
                            <div>
                                <label for="nom">Surplus Paypal pour le dépôt <span style="color: red">numérique</span></label><br />
                                <input name="paypal_surplus_depot" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->paypal_surplus_depot; ?>" /> $

                            </div>
                            <br />
                        </div>
                        <div style='width:100%; background-color:#fff; padding:5px'>
                            <div>
                                <label for="nom">Prix balance de paiement <span style="color: red">numérique</span></label><br />
                                <input name="prix_balance" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->prix_balance; ?>" /> $

                            </div>
                            <br />
                            <div>
                                <label for="nom">Surplus Paypal pour la balance de paiement <span style="color: red">numérique</span></label><br />
                                <input name="paypal_surplus_balance" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->paypal_surplus_balance; ?>" /> $

                            </div>
                            <br />
                        </div>
                        <div>
                            <label for="nom">Nombre de places disponibles</label><br />
                            <input name="nbr_places" type="number" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->nbr_places; ?>" />

                        </div>
                        <br />
                        <div>
                            <label for="nom">Date limite pour le paiement</label><br />
                            <input name="date_limite" type="date" class="form-control"  style="display: inline; width: 60%" value="<?php echo $formations->date_limite; ?>" />

                        </div>
                        <br />

                        <div style="padding-bottom: 15px;">
                            <label for="recu_donne">Les reçus ont été donnés
                                <input name="recu_donne" type="checkbox"  style="width:20px;" <?php if($formations->recu_donne === 1) echo "checked"; ?> value="{{ $formations->recu_donne }}" /></label>
                        </div>

                        <div  style="padding-bottom: 15px;">
                            <label for="certificat_donne">Les certificats ont été donnés
                                <input name="certificat_donne" type="checkbox"   style="width:20px;" <?php if($formations->certificat_donne === 1) echo "checked"; ?> value="{{ $formations->certificat_donne }}"/></label>
                        </div>

                        <div  style="padding-bottom: 15px;">
                            <label for="nom_fr">Actif
                                <select name="actif"  style="padding: 5px;">
                                    <option value="1" <?php if($formations->actif == 1) echo "selected"; ?>>oui</option>
                                    <option value="0" <?php if($formations->actif == 0) echo "selected"; ?>>non</option>
                                </select></label>
                        </div>


                </div>

            </div>





                <div class="group-form">
                    <input type="submit" class=" btn btn-primary form-control" value="Modifier"  name="Update" >
                </div>

            </div>



            </form>




        </div>
    </div>
    </div>
@endsection
