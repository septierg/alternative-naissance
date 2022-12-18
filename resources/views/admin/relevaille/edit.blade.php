@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                {!! Form::model($relevailles, ['method' => 'PATCH','action' => ['App\Http\Controllers\RelevailleController@update', $relevailles->id],'files' =>true]) !!}
                @csrf
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Modification de l'inscription</h4>
                        <div class="group-form">
                            <label for="date_demande">Date de demande : </label>
                            <input type="date" class="form-control" value="{{ $relevailles->date_demande}}"  name="date_demande" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="annee_fiscale">Année fiscale: </label>
                            <select id="" name="annee_fiscale" class="form-control">
                                <option value="2005-2006" <?php if($relevailles->annee_fiscale == '2005-2006') echo"selected"; use Illuminate\Support\Facades\DB;?>>2005-2006</option>
                                <option value="2006-2007" <?php if($relevailles->annee_fiscale == '2006-2007') echo"selected"; ?>>2006-2007</option>
                                <option value="2007-2008" <?php if($relevailles->annee_fiscale == '2007-2008') echo"selected"; ?>>2007-2008</option>
                                <option value="2008-2009" <?php if($relevailles->annee_fiscale == '2008-2009') echo"selected"; ?>>2008-2009</option>
                                <option value="2009-2010" <?php if($relevailles->annee_fiscale == '2009-2010') echo"selected"; ?>>2009-2010</option>

                                <option value="2010-2011" <?php if($relevailles->annee_fiscale == '2010-2011') echo"selected"; ?>>2010-2011</option>
                                <option value="2011-2012" <?php if($relevailles->annee_fiscale == '2011-2012') echo"selected"; ?>>2011-2012</option>
                                <option value="2012-2013" <?php if($relevailles->annee_fiscale == '2012-2013') echo"selected"; ?>>2012-2013</option>
                                <option value="2013-2014" <?php if($relevailles->annee_fiscale == '2013-2014') echo"selected"; ?>>2013-2014</option>

                                <option value="2014-2015" <?php if($relevailles->annee_fiscale == '2014-2015') echo"selected"; ?>>2014-2015</option>
                                <option value="2015-2016" <?php if($relevailles->annee_fiscale == '2015-2016') echo"selected"; ?>>2015-2016</option>
                                <option value="2016-2017" <?php if($relevailles->annee_fiscale == '2016-2017') echo"selected"; ?>>2016-2017</option>
                                <option value="2017-2018" <?php if($relevailles->annee_fiscale == '2017-2018') echo"selected"; ?>>2017-2018</option>

                                <option value="2018-2019" <?php if($relevailles->annee_fiscale == '2018-2019') echo"selected"; ?>>2018-2019</option>
                                <option value="2019-2020" <?php if($relevailles->annee_fiscale == '2019-2020') echo"selected"; ?>>2019-2020</option>
                                <option value="2020-2021" <?php if($relevailles->annee_fiscale == '2020-2021') echo"selected"; ?>>2020-2021</option>
                                <option value="2021-2022" <?php if($relevailles->annee_fiscale == '2021-2022') echo"selected"; ?>>2021-2022</option>

                                <option value="2022-2023" <?php if($relevailles->annee_fiscale == '2022-2023') echo"selected"; ?>>2022-2023</option>
                                <option value="2023-2024" <?php if($relevailles->annee_fiscale == '2023-2024') echo"selected"; ?>>2023-2024</option>
                                <option value="2024-2025" <?php if($relevailles->annee_fiscale == '2024-2025') echo"selected"; ?>>2024-2025</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <h4>Informations sur la clientele</h4>
                            <label for="nom">Inscrits: </label>
                            <input type="text" class="form-control" value="{{ $relevailles->prenom .' ' . $relevailles->nom}}"  name="nom" disabled>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="langue_parlee">Langues parlées: </label>
                            <input type="text" class="form-control" value="{{ $relevailles->langue_parlee}}"  name="langue_parlee" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="statut_citoyen">Statut de citoyenneté : </label>
                            <select id="" name="statut_citoyen" class="form-control">
                                <option value="Citoyen canadien" <?php if($relevailles->statut_citoyen == 'Citoyen canadien') echo"selected"; ;?>>Citoyen canadien</option>
                                <option value="Résident permanent" <?php if($relevailles->statut_citoyen == 'Résident permanent') echo"selected"; ?>>Résident permanent</option>
                                <option value="Réfugié" <?php if($relevailles->statut_citoyen == 'Réfugié') echo"selected"; ?>>Réfugié</option>
                                <option value="Visa" <?php if($relevailles->statut_citoyen == 'Visa') echo"selected"; ?>>Visa</option>
                                <option value="Immigrant reçu" <?php if($relevailles->statut_citoyen == 'Immigrant reçu') echo"selected"; ?>>Immigrant reçu</option>

                                <option value="Demandeur d'asile" <?php if($relevailles->statut_citoyen == 'Demandeur d\'asile') echo"selected"; ?>>Demandeur d'asile</option>
                                <option value="Visa d'études" <?php if($relevailles->statut_citoyen == 'Visa d\'études') echo"selected"; ?>>Visa d'études</option>
                                <option value="sans statut" <?php if($relevailles->statut_citoyen == 'sans statut') echo"selected"; ?>>sans statut</option>
                                <option value="Conjoint Canadien" <?php if($relevailles->statut_citoyen == 'Conjoint Canadien') echo"selected"; ?>>Conjoint Canadien</option>

                                <option value="Visa de travail" <?php if($relevailles->statut_citoyen == 'Visa de travail') echo"selected"; ?>>Visa de travail</option>
                                <option value="Visteur" <?php if($relevailles->statut_citoyen == 'Visteur') echo"selected"; ?>>Visteur</option>
                                <option value="parrainé par mari" <?php if($relevailles->statut_citoyen == 'parrainé par mari') echo"selected"; ?>>parrainé par mari</option>
                                <option value="Résidente temporaire" <?php if($relevailles->statut_citoyen == 'Résidente temporaire') echo"selected"; ?>>Résidente temporaire</option>

                                <option value="en attente statut résidence" <?php if($relevailles->statut_citoyen == 'en attente statut résidence') echo"selected"; ?>>en attente statut résidence</option>
                                <option value="Congo" <?php if($relevailles->statut_citoyen == 'Congo') echo"selected"; ?>>Congo</option>
                                <option value="visa de tourisme" <?php if($relevailles->statut_citoyen == 'visa de tourisme') echo"selected"; ?>>visa de tourisme</option>
                                <option value="Permis de travail" <?php if($relevailles->statut_citoyen == 'Permis de travail') echo"selected"; ?>>Permis de travail</option>

                                <option value="Parrainage en cours" <?php if($relevailles->statut_citoyen == 'Parrainage en cours') echo"selected"; ?>>Parrainage en cours</option>
                                <option value="Citoyenne reçue" <?php if($relevailles->statut_citoyen == 'Citoyenne reçue') echo"selected"; ?>>Citoyenne reçue</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="pays_origine">Pays d'origine : </label>
                            <input type="text" class="form-control"  name="pays_origine"  value="{{ $relevailles->pays_origine}}" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="age">Age : </label>
                            <input type="number" min="0" class="form-control"  name="age"  value="{{ $relevailles->age}}" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="occupation">Occupation : </label>
                            <input type="text"  class="form-control"  name="occupation"  value="{{ $relevailles->occupation}}" >
                        </div>
                        <br>

                        <div class="group-form">
                            <h4>Informations sur le conjoint et la famille</h4>
                            <label for="conjoint_prenom">Prénom du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $relevailles->conjoint_prenom }}"  name="conjoint_prenom" >
                        </div>
                        <br>
                        <div class="group-form">
                            <label for="conjoint_nom">Nom du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $relevailles->conjoint_nom }}"  name="conjoint_nom" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="conjoint_occupation">Occupation du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $relevailles->conjoint_occupation }}"  name="conjoint_occupation" >
                        </div>
                        <br>
                        <div class="group-form">
                            <label for="courriel_conjoint">Email du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $relevailles->courriel_conjoint }}"  name="courriel_conjoint" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="monoparentale">Monoparentale : </label>
                            <input type="checkbox" name="monoparentale"  <?php if($relevailles->monoparentale === 1 ) echo"checked"; ?> value="{{ $relevailles->monoparentale }}" />
                        </div>
                        <div class="group-form">
                            <label for="coopere">CooPère Rosemont : </label>
                            <input type="checkbox" name="coopere" <?php if($relevailles->coopere === 1 ) echo"checked"; ?>  value="{{ $relevailles->coopere }}"/>
                        </div>


                        <div class="group-form">
                            <label for="nbr_enfants">Nombre d'enfants : </label>
                            <input type="number" min="0" class="form-control" value="{{ $relevailles->nbr_enfants }}"  name="nbr_enfants" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="age_respectif">Âge des enfants : </label>
                            <textarea type="text" class="form-control" name="age_respectif" >{{ $relevailles->age_respectif }}</textarea>
                        </div>
                        <br>

                        <hr>




                        <div class="group-form">
                            <h4>Informations sur l'accouchement</h4>
                            <label for="date_naissance_bebe">Date de naissance du bébé : </label>

                            <input name="date_naissance_bebe" class="form-control" type="date" value="{{ $relevailles->date_naissance_bebe}}"  />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conditions_particulieres">Conditions particulières reliées au postnatal </label>

                            <textarea id="" name="conditions_particulieres" class="form-control">
                                            {{ $relevailles->conditions_particulieres}}
                            </textarea>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="attentes">Attentes reliées au service de relevailles : </label>
                            <textarea id="" name="attentes" class="form-control">
                                            {{ $relevailles->attentes}}
                            </textarea>
                            <br>
                        </div>
                        <br>

                        <hr>


                        <div class="group-form">
                            <h4>Informations sur les programmes de nos partenaires</h4>
                            <label for="pae">Programme Avenir Enfants (PAE) : </label>

                            <input name="pae" type="checkbox" value="1" <?php if($relevailles->pae == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="pae_clsc_id">CLSS associé à ce PAE </label>

                            <select id="" name="pae_clsc_id" class="form-control">
                                <option value="0" <?php if($relevailles->pae_clsc_id == 0) echo"selected"; ;?>>__</option>
                                <option value="1" <?php if($relevailles->pae_clsc_id == 1) echo"selected"; ;?>>Villeray</option>
                                <option value="2" <?php if($relevailles->pae_clsc_id == 2) echo"selected"; ?>>Petite-Patrie</option>
                                <option value="3" <?php if($relevailles->pae_clsc_id == 3) echo"selected"; ?>>Rosemont</option>
                                <option value="4" <?php if($relevailles->pae_clsc_id == 4) echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="5" <?php if($relevailles->pae_clsc_id == 5) echo"selected"; ?>>Lasalle</option>

                                <option value="6" <?php if($relevailles->pae_clsc_id == 6) echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="7" <?php if($relevailles->pae_clsc_id == 7) echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="8" <?php if($relevailles->pae_clsc_id == 8) echo"selected"; ?>>Des Faubourgs</option>
                                <option value="9" <?php if($relevailles->pae_clsc_id == 9) echo"selected"; ?>>Saint-Léonard</option>

                                <option value="10" <?php if($relevailles->pae_clsc_id == 10) echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="11" <?php if($relevailles->pae_clsc_id == 11) echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="13" <?php if($relevailles->pae_clsc_id == 13) echo"selected"; ?>>Pierrefonds</option>
                                <option value="15" <?php if($relevailles->pae_clsc_id == 15) echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="16" <?php if($relevailles->pae_clsc_id == 16) echo"selected"; ?>>Ahuntsic</option>
                                <option value="17" <?php if($relevailles->pae_clsc_id == 17) echo"selected"; ?>>Saint-Michel</option>
                                <option value="18" <?php if($relevailles->pae_clsc_id == 18) echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="19" <?php if($relevailles->pae_clsc_id == 19) echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="20" <?php if($relevailles->pae_clsc_id == 20) echo"selected"; ?>>IG - Régulier</option>
                                <option value="21" <?php if($relevailles->pae_clsc_id == 21) echo"selected"; ?>>du Parc</option>
                                <option value="22" <?php if($relevailles->pae_clsc_id == 22) echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="sippe">Programme SIPPE : </label>
                            <input name="sippe" type="checkbox" value="1" <?php if($relevailles->sippe == 1) echo "checked"; ?> />
                            <br>
                        </div>
                        <br>


                        <div class="group-form">
                            <label>Si OUI à SIPPE, CLSC associé</label>
                            <select id="" name="sippe_oui_clsc" class="form-control">

                                <option value="" <?php if($relevailles->sippe_oui_clsc == '') echo"selected"; ;?>>__</option>
                                <option value="Villeray" <?php if($relevailles->sippe_oui_clsc == "Villeray") echo"selected"; ;?>>Villeray</option>
                                <option value="Petite-Patrie" <?php if($relevailles->sippe_oui_clsc == "Petite-Patrie") echo"selected"; ?>>Petite-Patrie</option>
                                <option value="Rosemont" <?php if($relevailles->sippe_oui_clsc == "Rosemont") echo"selected"; ?>>Rosemont</option>
                                <option value="Hochelega-Maisonneuve" <?php if($relevailles->sippe_oui_clsc == "Hochelega-Maisonneuve") echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="Lasalle" <?php if($relevailles->sippe_oui_clsc == "Lasalle") echo"selected"; ?>>Lasalle</option>

                                <option value="Plateau Mont-Royal" <?php if($relevailles->sippe_oui_clsc == "Plateau Mont-Royal") echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="Olivier-Guimond" <?php if($relevailles->sippe_oui_clsc == "Olivier-Guimond") echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="Des Faubourgs" <?php if($relevailles->sippe_oui_clsc == "Des Faubourgs") echo"selected"; ?>>Des Faubourgs</option>
                                <option value="Saint-Léonard" <?php if($relevailles->sippe_oui_clsc == "Saint-Léonard") echo"selected"; ?>>Saint-Léonard</option>

                                <option value="Côte-des-neiges" <?php if($relevailles->sippe_oui_clsc == "Côte-des-neiges") echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="Ville Saint-Laurent" <?php if($relevailles->sippe_oui_clsc == "Ville Saint-Laurent") echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="Pierrefonds" <?php if($relevailles->sippe_oui_clsc == "Pierrefonds") echo"selected"; ?>>Pierrefonds</option>
                                <option value="Stage de Edith Joseph Alizi" <?php if($relevailles->sippe_oui_clsc == "Stage de Edith Joseph Alizi") echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="Ahuntsic" <?php if($relevailles->sippe_oui_clsc == "Ahuntsic") echo"selected"; ?>>Ahuntsic</option>
                                <option value="Saint-Michel" <?php if($relevailles->sippe_oui_clsc == "Saint-Michel") echo"selected"; ?>>Saint-Michel</option>
                                <option value="Deuil - Bell Cause pour la Cause" <?php if($relevailles->sippe_oui_clsc == "Deuil - Bell Cause pour la Cause") echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="Deuil - Régulier" <?php if($relevailles->sippe_oui_clsc == "Deuil - Régulier") echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="IG - Régulier" <?php if($relevailles->sippe_oui_clsc == "IG - Régulier") echo"selected"; ?>>IG - Régulier</option>
                                <option value="du Parc" <?php if($relevailles->sippe_oui_clsc == "du Parc") echo"selected"; ?>>du Parc</option>
                                <option value="Saint-Louis-du-Parc" <?php if($relevailles->sippe_oui_clsc == "Saint-Louis-du-Parc") echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="sippe_non_clsc_id">SIPPE d'un autre CLSS </label>
                            <input name="sippe_non_clsc_id" type="checkbox" value="1" <?php if($relevailles->sippe_non_clsc_id == 1) echo "checked"; ?> />


                            <select id="" name="sippe_non_clsc" class="form-control">

                                <option value="" <?php if($relevailles->sippe_non_clsc == '') echo"selected"; ;?>>__</option>
                                <option value="Villeray" <?php if($relevailles->sippe_non_clsc == "Villeray") echo"selected"; ;?>>Villeray</option>
                                <option value="Petite-Patrie" <?php if($relevailles->sippe_non_clsc == "Petite-Patrie") echo"selected"; ?>>Petite-Patrie</option>
                                <option value="Rosemont" <?php if($relevailles->sippe_non_clsc == "Rosemont") echo"selected"; ?>>Rosemont</option>
                                <option value="Hochelega-Maisonneuve" <?php if($relevailles->sippe_non_clsc == "Hochelega-Maisonneuve") echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="Lasalle" <?php if($relevailles->sippe_non_clsc == "Lasalle") echo"selected"; ?>>Lasalle</option>

                                <option value="Plateau Mont-Royal" <?php if($relevailles->sippe_non_clsc == "Plateau Mont-Royal") echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="Olivier-Guimond" <?php if($relevailles->sippe_non_clsc == "Olivier-Guimond") echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="Des Faubourgs" <?php if($relevailles->sippe_non_clsc == "Des Faubourgs") echo"selected"; ?>>Des Faubourgs</option>
                                <option value="Saint-Léonard" <?php if($relevailles->sippe_non_clsc == "Saint-Léonard") echo"selected"; ?>>Saint-Léonard</option>

                                <option value="Côte-des-neiges" <?php if($relevailles->sippe_non_clsc == "Côte-des-neiges") echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="Ville Saint-Laurent" <?php if($relevailles->sippe_non_clsc == "Ville Saint-Laurent") echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="Pierrefonds" <?php if($relevailles->sippe_non_clsc == "Pierrefonds") echo"selected"; ?>>Pierrefonds</option>
                                <option value="Stage de Edith Joseph Alizi" <?php if($relevailles->sippe_non_clsc == "Stage de Edith Joseph Alizi") echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="Ahuntsic" <?php if($relevailles->sippe_non_clsc == "Ahuntsic") echo"selected"; ?>>Ahuntsic</option>
                                <option value="Saint-Michel" <?php if($relevailles->sippe_non_clsc == "Saint-Michel") echo"selected"; ?>>Saint-Michel</option>
                                <option value="Deuil - Bell Cause pour la Cause" <?php if($relevailles->sippe_non_clsc == "Deuil - Bell Cause pour la Cause") echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="Deuil - Régulier" <?php if($relevailles->sippe_non_clsc == "Deuil - Régulier") echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="IG - Régulier" <?php if($relevailles->sippe_non_clsc == "IG - Régulier") echo"selected"; ?>>IG - Régulier</option>
                                <option value="du Parc" <?php if($relevailles->sippe_non_clsc == "du Parc") echo"selected"; ?>>du Parc</option>
                                <option value="Saint-Louis-du-Parc" <?php if($relevailles->sippe_non_clsc == "Saint-Louis-du-Parc") echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                            <br>
                        </div>

                        <div class="group-form">
                            <label>Porte-bébé donné ?</label>
                            <input name="porte_bebe_donne" type="checkbox" value="1" <?php if($relevailles->porte_bebe_donne == 1) echo "checked"; ?> />
                        </div>

                        <div class="group-form">
                            <label>Formation massage bébé donnée ?</label>
                            <input name="massage_bebe_donne" type="checkbox" value="1"  <?php if($relevailles->massage_bebe_donne == 1) echo "checked"; ?> />
                        </div>






                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">

                        <div class="group-form">
                            <h4>Informations pour Alternative-Naissance</h4>
                            <label for="refere">Référée par un organisme : </label>

                            <input name="refere" type="checkbox" value="1" <?php if($relevailles->refere == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="refere_organisme">Si oui, lequel? </label>

                            <input name="refere_organisme"  class="form-control" type="text" value="{{$relevailles->refere_organisme }}" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="service_connu_id">Où avez-vous entendu parlé de AN ?  </label>

                            <input name="service_connu_old" class="form-control"  type="text" value="{{$relevailles->service_connu }}" disabled />
                            <input name="service_connu_old" class="form-control"  type="hidden" value="{{$relevailles->service_connu }}"  />
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="service_connu_id">Choisir une autre source (BD) </label>

                            <select id="" name="service_connu" class="form-control">
                                <option>__</option>

                                @foreach ($source_diffusion as $value)
                                    <option>{{ $value->nom }}</option>



                                @endforeach
                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <h4>Informations sur les accompagnantes à la naissance</h4>
                            <label for="accompagnante_id_1">Accompagnante principale </label>
                            <input name="accompagnante_1_old" type="text" class="form-control" value="{{$relevailles->accompagnante_1 }}" disabled />
                            <input name="accompagnante_1_old" type="hidden" class="form-control" value="{{$relevailles->accompagnante_1 }}"  />
                        </div>


                        <div class="group-form">
                            <label for="accompagnante_1">Choisir une autre accompagnante (BD) </label>

                            <select id="" name="accompagnante_1" class="form-control">
                                <option>__</option>

                                @foreach ($accompagnantes as $value)
                                    <option>{{ $value->prenom .' '. $value->nom}}</option>



                                @endforeach
                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="accompagnante_id_2">Accompagnante secondaire </label>
                            <input name="accompagnante_2_old" type="text" class="form-control" value="{{$relevailles->accompagnante_2 }}" disabled />
                            <input name="accompagnante_2_old" type="hidden" class="form-control" value="{{$relevailles->accompagnante_2 }}" />
                        </div>


                        <div class="group-form">
                            <label for="accompagnante_2">Choisir une autre accompagnante (BD) </label>

                            <select id="" name="accompagnante_2" class="form-control">
                                <option>__</option>

                                @foreach ($accompagnantes as $value)
                                    <option>{{ $value->prenom .' '. $value->nom}}</option>



                                @endforeach
                            </select>
                        </div>
                        <br>



                        <div class="group-form">
                            <h4>Don et Évaluation</h4>
                            <label>Sollicité pour un don et évaluation</label>
                            <input name="sollicite_don" type="checkbox" value="1"  <?php if($relevailles->sollicite_don == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Date de la sollicitation</label>
                            <input name="date_sollicitation_don" type="date"  class="form-control" value="{{$relevailles->date_sollicitation_don }}" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Date du don</label>
                            <input name="don_date" type="date"  class="form-control" value="{{$relevailles->don_date }}" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Montant du don</label>
                            <input name="don_montant" type="text"  class="form-control" value="{{$relevailles->don_montant }}" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Numéro de reçu pour le don</label>
                            <input name="don_numero_recu" type="text"  class="form-control" value="{{$relevailles->don_numero_recu }}" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Mode de paiment du don</label>

                            <select name="don_type_paiement" class="form-control">
                                <option value="" <?php if($relevailles->don_type_paiement == "") echo "selected"; ?>>---</option>
                                <option value="Cheque" <?php if($relevailles->don_type_paiement == "Cheque") echo "selected"; ?>>Chèque</option>
                                <option value="Paypal" <?php if($relevailles->don_type_paiement == "Paypal") echo "selected"; ?>>Paypal</option>
                                <option value="Comptant" <?php if($relevailles->don_type_paiement == "Comptant") echo "selected"; ?>>Comptant</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <label>Pièce électronique de l'évalution</label>

                            <input name="document_sollicite_evaluation" type="file" class="form-control"/>
                        </div>
                        <br>

                        <div class="group-form">
                            <label name="notes_accompagnement" >Notes sur l'accompagnement</label>
                            <textarea name="notes_accompagnement" type="text" class="form-control">
                                    {{$relevailles->notes_accompagnement }}
                                </textarea>

                        </div>
                        <br>

                        <hr>



                        <div class="group-form">
                            <strong>Dossier de marrainage</strong>
                            <input  name="dossier_marrainage" type="checkbox" value="1"  <?php if($relevailles->dossier_marrainage == 1) echo "checked"; ?> />

                        </div>
                        <br>



                        <hr>


                        <div class="group-form">
                            <h4>Administration</h4>
                            <label name="notes_generales" >Notes générales du dossier</label>
                            <textarea name="notes_generales" type="text" class="form-control">
                                    {{$relevailles->notes_generales }}
                                </textarea>

                        </div>
                        <br>



                        <div class="group-form">
                            <label name="accepter_contact_an" >Acceptez-vous d'être contacté par un intervenant d'Alternative Naissance pour des informations d'activités de votre secteur?</label>



                            <select name="accepter_contact_an" class="form-control">
                                <option value='0' <?php if($relevailles->accepter_contact_an == '0') echo "selected"; ?>>---</option>
                                <option value='oui' <?php if($relevailles->accepter_contact_an == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($relevailles->accepter_contact_an == 'non') echo "selected"; ?>>non</option>
                            </select>

                        </div>
                        <br>

                        <div class="group-form">
                            <label name="accepter_contact_organisme">Acceptez-vous d'être contacté par un intervenant d'un autre organisme pour des informations d'activités de votre secteur?</label>
                            <select name="accepter_contact_organisme" class="form-control">
                                <option value='0' <?php if($relevailles->accepter_contact_organisme == '0') echo "selected"; ?>>---</option>
                                <option value='oui' <?php if($relevailles->accepter_contact_organisme == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($relevailles->accepter_contact_organisme == 'non') echo "selected"; ?>>non</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">

                            <label name="accepter_statistiques">Acceptez-vous qu'Alternative Naissance compile certaines données relativement à votre suivi et à votre accouchement, de manière anonyme et confidentielle, pour des fins statistiques.  Ces données pourraient ensuite être utilisées pour évaluer les effets de notre pratique et avoir un portrait de certaines pratiques obstétricales et de leurs effets.</label>
                            <select name="accepter_statistiques" class="form-control">
                                <option value='0' <?php if($relevailles->accepter_statistiques == '0') echo "selected"; ?>>---</option>
                                <option value='oui' <?php if($relevailles->accepter_statistiques == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($relevailles->accepter_statistiques == 'non') echo "selected"; ?>>non</option>
                            </select>

                        </div>

                        <div class="group-form">

                            <label name="statut_dossier">Statut de ce dossier</label>
                            <select name="statut_dossier" class="form-control">
                                <option value=1 <?php if($relevailles->statut_dossier == 1) echo "selected"; ?>>Dossier complet</option>
                                <option value=2 <?php if($relevailles->statut_dossier == 2) echo "selected"; ?>>Dossier incomplet</option>
                                <option value=3 <?php if($relevailles->statut_dossier == 3) echo "selected"; ?>>Dossier problématique</option>
                                <option value=4 <?php if($relevailles->statut_dossier == 4) echo "selected"; ?>>Dossier terminé</option>
                                <option value=5 <?php if($relevailles->statut_dossier == 5) echo "selected"; ?>>Dossier annulé</option>
                            </select>

                        </div>

                    </div>
                    <div class="group-form"  style="margin-top: 30px;">

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
