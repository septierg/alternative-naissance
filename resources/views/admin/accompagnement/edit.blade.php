@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                    {!! Form::model($accompagnements, ['method' => 'PATCH','action' => ['App\Http\Controllers\AccompagnementController@update', $accompagnements->id],'files' =>true]) !!}
                    @csrf
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <h4>Modification de l'inscription</h4>
                            <div class="group-form">
                                <label for="date_demande">Date de demande : </label>
                                <input type="date" class="form-control" value="{{ $accompagnements->date_demande}}"  name="date_demande" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="annee_fiscale">Année fiscale: </label>
                                <select id="" name="annee_fiscale" class="form-control">
                                    <option value="2005-2006" <?php if($accompagnements->annee_fiscale == '2005-2006') echo"selected"; use Illuminate\Support\Facades\DB;?>>2005-2006</option>
                                    <option value="2006-2007" <?php if($accompagnements->annee_fiscale == '2006-2007') echo"selected"; ?>>2006-2007</option>
                                    <option value="2007-2008" <?php if($accompagnements->annee_fiscale == '2007-2008') echo"selected"; ?>>2007-2008</option>
                                    <option value="2008-2009" <?php if($accompagnements->annee_fiscale == '2008-2009') echo"selected"; ?>>2008-2009</option>
                                    <option value="2009-2010" <?php if($accompagnements->annee_fiscale == '2009-2010') echo"selected"; ?>>2009-2010</option>

                                    <option value="2010-2011" <?php if($accompagnements->annee_fiscale == '2010-2011') echo"selected"; ?>>2010-2011</option>
                                    <option value="2011-2012" <?php if($accompagnements->annee_fiscale == '2011-2012') echo"selected"; ?>>2011-2012</option>
                                    <option value="2012-2013" <?php if($accompagnements->annee_fiscale == '2012-2013') echo"selected"; ?>>2012-2013</option>
                                    <option value="2013-2014" <?php if($accompagnements->annee_fiscale == '2013-2014') echo"selected"; ?>>2013-2014</option>

                                    <option value="2014-2015" <?php if($accompagnements->annee_fiscale == '2014-2015') echo"selected"; ?>>2014-2015</option>
                                    <option value="2015-2016" <?php if($accompagnements->annee_fiscale == '2015-2016') echo"selected"; ?>>2015-2016</option>
                                    <option value="2016-2017" <?php if($accompagnements->annee_fiscale == '2016-2017') echo"selected"; ?>>2016-2017</option>
                                    <option value="2017-2018" <?php if($accompagnements->annee_fiscale == '2017-2018') echo"selected"; ?>>2017-2018</option>

                                    <option value="2018-2019" <?php if($accompagnements->annee_fiscale == '2018-2019') echo"selected"; ?>>2018-2019</option>
                                    <option value="2019-2020" <?php if($accompagnements->annee_fiscale == '2019-2020') echo"selected"; ?>>2019-2020</option>
                                    <option value="2020-2021" <?php if($accompagnements->annee_fiscale == '2020-2021') echo"selected"; ?>>2020-2021</option>
                                    <option value="2021-2022" <?php if($accompagnements->annee_fiscale == '2021-2022') echo"selected"; ?>>2021-2022</option>

                                    <option value="2022-2023" <?php if($accompagnements->annee_fiscale == '2022-2023') echo"selected"; ?>>2022-2023</option>
                                    <option value="2023-2024" <?php if($accompagnements->annee_fiscale == '2023-2024') echo"selected"; ?>>2023-2024</option>
                                    <option value="2024-2025" <?php if($accompagnements->annee_fiscale == '2024-2025') echo"selected"; ?>>2024-2025</option>
                                </select>
                            </div>
                            <br>

                            <div class="group-form">
                                <h4>Informations sur la clientele</h4>
                                <label for="nom">Inscrits: </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->prenom .' ' . $accompagnements->nom}}"  name="nom" disabled>
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="langue_parlee">Langues parlées: </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->langue_parlee}}"  name="langue_parlee" >
                            </div>
                            <br>


                            <div class="group-form">
                                <label for="statut_citoyen">Statut de citoyenneté : </label>
                                <select id="" name="statut_citoyen" class="form-control">
                                    <option value="Citoyen canadien" <?php if($accompagnements->statut_citoyen == 'Citoyen canadien') echo"selected"; ;?>>Citoyen canadien</option>
                                    <option value="Résident permanent" <?php if($accompagnements->statut_citoyen == 'Résident permanent') echo"selected"; ?>>Résident permanent</option>
                                    <option value="Réfugié" <?php if($accompagnements->statut_citoyen == 'Réfugié') echo"selected"; ?>>Réfugié</option>
                                    <option value="Visa" <?php if($accompagnements->statut_citoyen == 'Visa') echo"selected"; ?>>Visa</option>
                                    <option value="Immigrant reçu" <?php if($accompagnements->statut_citoyen == 'Immigrant reçu') echo"selected"; ?>>Immigrant reçu</option>

                                    <option value="Demandeur d'asile" <?php if($accompagnements->statut_citoyen == 'Demandeur d\'asile') echo"selected"; ?>>Demandeur d'asile</option>
                                    <option value="Visa d'études" <?php if($accompagnements->statut_citoyen == 'Visa d\'études') echo"selected"; ?>>Visa d'études</option>
                                    <option value="sans statut" <?php if($accompagnements->statut_citoyen == 'sans statut') echo"selected"; ?>>sans statut</option>
                                    <option value="Conjoint Canadien" <?php if($accompagnements->statut_citoyen == 'Conjoint Canadien') echo"selected"; ?>>Conjoint Canadien</option>

                                    <option value="Visa de travail" <?php if($accompagnements->statut_citoyen == 'Visa de travail') echo"selected"; ?>>Visa de travail</option>
                                    <option value="Visteur" <?php if($accompagnements->statut_citoyen == 'Visteur') echo"selected"; ?>>Visteur</option>
                                    <option value="parrainé par mari" <?php if($accompagnements->statut_citoyen == 'parrainé par mari') echo"selected"; ?>>parrainé par mari</option>
                                    <option value="Résidente temporaire" <?php if($accompagnements->statut_citoyen == 'Résidente temporaire') echo"selected"; ?>>Résidente temporaire</option>

                                    <option value="en attente statut résidence" <?php if($accompagnements->statut_citoyen == 'en attente statut résidence') echo"selected"; ?>>en attente statut résidence</option>
                                    <option value="Congo" <?php if($accompagnements->statut_citoyen == 'Congo') echo"selected"; ?>>Congo</option>
                                    <option value="visa de tourisme" <?php if($accompagnements->statut_citoyen == 'visa de tourisme') echo"selected"; ?>>visa de tourisme</option>
                                    <option value="Permis de travail" <?php if($accompagnements->statut_citoyen == 'Permis de travail') echo"selected"; ?>>Permis de travail</option>

                                    <option value="Parrainage en cours" <?php if($accompagnements->statut_citoyen == 'Parrainage en cours') echo"selected"; ?>>Parrainage en cours</option>
                                    <option value="Citoyenne reçue" <?php if($accompagnements->statut_citoyen == 'Citoyenne reçue') echo"selected"; ?>>Citoyenne reçue</option>
                                </select>
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="pays_origine">Pays d'origine : </label>
                                <input type="text" class="form-control"  name="pays_origine"  value="{{ $accompagnements->pays_origine}}" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="age">Age : </label>
                                <input type="number" min="0" class="form-control"  name="age"  value="{{ $accompagnements->age}}" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="occupation">Occupation : </label>
                                <input type="text"  class="form-control"  name="occupation"  value="{{ $accompagnements->occupation}}" >
                            </div>
                            <br>

                            <div class="group-form">
                                <h4>Informations sur le conjoint et la famille</h4>
                                <label for="conjoint_prenom">Prénom du Conjoint : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->conjoint_prenom }}"  name="conjoint_prenom" >
                            </div>
                            <br>
                            <div class="group-form">
                                <label for="conjoint_nom">Nom du Conjoint : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->conjoint_nom }}"  name="conjoint_nom" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="conjoint_occupation">Occupation du Conjoint : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->conjoint_occupation }}"  name="conjoint_occupation" >
                            </div>
                            <br>
                            <div class="group-form">
                                <label for="courriel_conjoint">Email du Conjoint : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->courriel_conjoint }}"  name="courriel_conjoint" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="monoparentale">Monoparentale : </label>
                                <input type="checkbox" name="monoparentale"  <?php if($accompagnements->monoparentale === 1 ) echo"checked"; ?> value="{{ $accompagnements->monoparentale }}" />
                            </div>
                            <div class="group-form">
                                <label for="coopere">CooPère Rosemont : </label>
                                <input type="checkbox" name="coopere" <?php if($accompagnements->coopere === 1 ) echo"checked"; ?>  value="{{ $accompagnements->coopere }}"/>
                            </div>
                            <div class="group-form">
                                <label for="conjoint_absent_pays">Conjoint absent du pays : </label>
                                <input type="checkbox" name="conjoint_absent_pays" <?php if($accompagnements->conjoint_absent_pays === 1 ) echo"checked"; ?>  value="{{ $accompagnements->conjoint_absent_pays }}" />
                            </div>
                            <div class="group-form">
                                <label for="conjoint_absent_accouchement">Conjoint absent lors de l'accouchement : </label>
                                <input type="checkbox" name="conjoint_absent_accouchement" <?php if($accompagnements->conjoint_absent_accouchement === 1 ) echo"checked"; ?>  value="{{ $accompagnements->conjoint_absent_accouchement }}"/>
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="nbr_grossesse">Nombre de grossesse incluant celle-ci : </label>
                                <input type="number" min="0" class="form-control" value="{{ $accompagnements->nbr_grossesse }}"  name="nbr_grossesse" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="nbr_enfants">Nombre d'enfants : </label>
                                <input type="number" min="0" class="form-control" value="{{ $accompagnements->nbr_enfants }}"  name="nbr_enfants" >
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="age_respectif">Âge des enfants : </label>
                                <textarea type="text" class="form-control" name="age_respectif" >{{ $accompagnements->age_respectif }}</textarea>
                            </div>
                            <br>

                            <div class="group-form">
                                <h4>Informations sur les programmes de nos partenaires</h4>
                                <label for="pae">Programme Avenir Enfants (PAE) : </label>

                                <input name="pae" type="checkbox" value="1" <?php if($accompagnements->pae == 1) echo "checked"; ?> />
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="pae_clsc_id">CLSS associé à ce PAE </label>

                                <select id="" name="pae_clsc_id" class="form-control">
                                    <option value="0" <?php if($accompagnements->pae_clsc_id == 0) echo"selected"; ;?>>__</option>
                                    <option value="1" <?php if($accompagnements->pae_clsc_id == 1) echo"selected"; ;?>>Villeray</option>
                                    <option value="2" <?php if($accompagnements->pae_clsc_id == 2) echo"selected"; ?>>Petite-Patrie</option>
                                    <option value="3" <?php if($accompagnements->pae_clsc_id == 3) echo"selected"; ?>>Rosemont</option>
                                    <option value="4" <?php if($accompagnements->pae_clsc_id == 4) echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                    <option value="5" <?php if($accompagnements->pae_clsc_id == 5) echo"selected"; ?>>Lasalle</option>

                                    <option value="6" <?php if($accompagnements->pae_clsc_id == 6) echo"selected"; ?>>Plateau Mont-Royal</option>
                                    <option value="7" <?php if($accompagnements->pae_clsc_id == 7) echo"selected"; ?>>Olivier-Guimond</option>
                                    <option value="8" <?php if($accompagnements->pae_clsc_id == 8) echo"selected"; ?>>Des Faubourgs</option>
                                    <option value="9" <?php if($accompagnements->pae_clsc_id == 9) echo"selected"; ?>>Saint-Léonard</option>

                                    <option value="10" <?php if($accompagnements->pae_clsc_id == 10) echo"selected"; ?>>Côte-des-neiges</option>
                                    <option value="11" <?php if($accompagnements->pae_clsc_id == 11) echo"selected"; ?>>Ville Saint-Laurent</option>
                                    <option value="13" <?php if($accompagnements->pae_clsc_id == 13) echo"selected"; ?>>Pierrefonds</option>
                                    <option value="15" <?php if($accompagnements->pae_clsc_id == 15) echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                    <option value="16" <?php if($accompagnements->pae_clsc_id == 16) echo"selected"; ?>>Ahuntsic</option>
                                    <option value="17" <?php if($accompagnements->pae_clsc_id == 17) echo"selected"; ?>>Saint-Michel</option>
                                    <option value="18" <?php if($accompagnements->pae_clsc_id == 18) echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                    <option value="19" <?php if($accompagnements->pae_clsc_id == 19) echo"selected"; ?>>Deuil - Régulier</option>

                                    <option value="20" <?php if($accompagnements->pae_clsc_id == 20) echo"selected"; ?>>IG - Régulier</option>
                                    <option value="21" <?php if($accompagnements->pae_clsc_id == 21) echo"selected"; ?>>du Parc</option>
                                    <option value="22" <?php if($accompagnements->pae_clsc_id == 22) echo"selected"; ?>>Saint-Louis-du-Parc</option>
                                </select>
                            </div>
                            <br>


                            <div class="group-form">
                                <label for="sippe">Programme SIPPE : </label>
                                <input name="sippe" type="checkbox" value="1" <?php if($accompagnements->sippe == 1) echo "checked"; ?> />
                                <br>
                            </div>
                            <br>


                            <div class="group-form">
                                <label>Si OUI à SIPPE, CLSC associé</label>
                                <select id="" name="sippe_oui_clsc" class="form-control">

                                    <option value="" <?php if($accompagnements->sippe_oui_clsc == '') echo"selected"; ;?>>__</option>
                                    <option value="Villeray" <?php if($accompagnements->sippe_oui_clsc == "Villeray") echo"selected"; ;?>>Villeray</option>
                                    <option value="Petite-Patrie" <?php if($accompagnements->sippe_oui_clsc == "Petite-Patrie") echo"selected"; ?>>Petite-Patrie</option>
                                    <option value="Rosemont" <?php if($accompagnements->sippe_oui_clsc == "Rosemont") echo"selected"; ?>>Rosemont</option>
                                    <option value="Hochelega-Maisonneuve" <?php if($accompagnements->sippe_oui_clsc == "Hochelega-Maisonneuve") echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                    <option value="Lasalle" <?php if($accompagnements->sippe_oui_clsc == "Lasalle") echo"selected"; ?>>Lasalle</option>

                                    <option value="Plateau Mont-Royal" <?php if($accompagnements->sippe_oui_clsc == "Plateau Mont-Royal") echo"selected"; ?>>Plateau Mont-Royal</option>
                                    <option value="Olivier-Guimond" <?php if($accompagnements->sippe_oui_clsc == "Olivier-Guimond") echo"selected"; ?>>Olivier-Guimond</option>
                                    <option value="Des Faubourgs" <?php if($accompagnements->sippe_oui_clsc == "Des Faubourgs") echo"selected"; ?>>Des Faubourgs</option>
                                    <option value="Saint-Léonard" <?php if($accompagnements->sippe_oui_clsc == "Saint-Léonard") echo"selected"; ?>>Saint-Léonard</option>

                                    <option value="Côte-des-neiges" <?php if($accompagnements->sippe_oui_clsc == "Côte-des-neiges") echo"selected"; ?>>Côte-des-neiges</option>
                                    <option value="Ville Saint-Laurent" <?php if($accompagnements->sippe_oui_clsc == "Ville Saint-Laurent") echo"selected"; ?>>Ville Saint-Laurent</option>
                                    <option value="Pierrefonds" <?php if($accompagnements->sippe_oui_clsc == "Pierrefonds") echo"selected"; ?>>Pierrefonds</option>
                                    <option value="Stage de Edith Joseph Alizi" <?php if($accompagnements->sippe_oui_clsc == "Stage de Edith Joseph Alizi") echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                    <option value="Ahuntsic" <?php if($accompagnements->sippe_oui_clsc == "Ahuntsic") echo"selected"; ?>>Ahuntsic</option>
                                    <option value="Saint-Michel" <?php if($accompagnements->sippe_oui_clsc == "Saint-Michel") echo"selected"; ?>>Saint-Michel</option>
                                    <option value="Deuil - Bell Cause pour la Cause" <?php if($accompagnements->sippe_oui_clsc == "Deuil - Bell Cause pour la Cause") echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                    <option value="Deuil - Régulier" <?php if($accompagnements->sippe_oui_clsc == "Deuil - Régulier") echo"selected"; ?>>Deuil - Régulier</option>

                                    <option value="IG - Régulier" <?php if($accompagnements->sippe_oui_clsc == "IG - Régulier") echo"selected"; ?>>IG - Régulier</option>
                                    <option value="du Parc" <?php if($accompagnements->sippe_oui_clsc == "du Parc") echo"selected"; ?>>du Parc</option>
                                    <option value="Saint-Louis-du-Parc" <?php if($accompagnements->sippe_oui_clsc == "Saint-Louis-du-Parc") echo"selected"; ?>>Saint-Louis-du-Parc</option>
                                </select>
                            </div>
                            <br>

                            <div class="group-form">
                            <label for="sippe_non_clsc_id">SIPPE d'un autre CLSS </label>
                                <input name="sippe_non_clsc_id" type="checkbox" value="1" <?php if($accompagnements->sippe_non_clsc_id == 1) echo "checked";
                                    ?> />

                                <select id="" name="sippe_non_clsc" class="form-control">

                                    <option value="" <?php if($accompagnements->sippe_non_clsc == '') echo"selected"; ;?>>__</option>
                                    <option value="Villeray" <?php if($accompagnements->sippe_non_clsc == "Villeray") echo"selected"; ;?>>Villeray</option>
                                    <option value="Petite-Patrie" <?php if($accompagnements->sippe_non_clsc == "Petite-Patrie") echo"selected"; ?>>Petite-Patrie</option>
                                    <option value="Rosemont" <?php if($accompagnements->sippe_non_clsc == "Rosemont") echo"selected"; ?>>Rosemont</option>
                                    <option value="Hochelega-Maisonneuve" <?php if($accompagnements->sippe_non_clsc == "Hochelega-Maisonneuve") echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                    <option value="Lasalle" <?php if($accompagnements->sippe_non_clsc == "Lasalle") echo"selected"; ?>>Lasalle</option>

                                    <option value="Plateau Mont-Royal" <?php if($accompagnements->sippe_non_clsc == "Plateau Mont-Royal") echo"selected"; ?>>Plateau Mont-Royal</option>
                                    <option value="Olivier-Guimond" <?php if($accompagnements->sippe_non_clsc == "Olivier-Guimond") echo"selected"; ?>>Olivier-Guimond</option>
                                    <option value="Des Faubourgs" <?php if($accompagnements->sippe_non_clsc == "Des Faubourgs") echo"selected"; ?>>Des Faubourgs</option>
                                    <option value="Saint-Léonard" <?php if($accompagnements->sippe_non_clsc == "Saint-Léonard") echo"selected"; ?>>Saint-Léonard</option>

                                    <option value="Côte-des-neiges" <?php if($accompagnements->sippe_non_clsc == "Côte-des-neiges") echo"selected"; ?>>Côte-des-neiges</option>
                                    <option value="Ville Saint-Laurent" <?php if($accompagnements->sippe_non_clsc == "Ville Saint-Laurent") echo"selected"; ?>>Ville Saint-Laurent</option>
                                    <option value="Pierrefonds" <?php if($accompagnements->sippe_non_clsc == "Pierrefonds") echo"selected"; ?>>Pierrefonds</option>
                                    <option value="Stage de Edith Joseph Alizi" <?php if($accompagnements->sippe_non_clsc == "Stage de Edith Joseph Alizi") echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                    <option value="Ahuntsic" <?php if($accompagnements->sippe_non_clsc == "Ahuntsic") echo"selected"; ?>>Ahuntsic</option>
                                    <option value="Saint-Michel" <?php if($accompagnements->sippe_non_clsc == "Saint-Michel") echo"selected"; ?>>Saint-Michel</option>
                                    <option value="Deuil - Bell Cause pour la Cause" <?php if($accompagnements->sippe_non_clsc == "Deuil - Bell Cause pour la Cause") echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                    <option value="Deuil - Régulier" <?php if($accompagnements->sippe_non_clsc == "Deuil - Régulier") echo"selected"; ?>>Deuil - Régulier</option>

                                    <option value="IG - Régulier" <?php if($accompagnements->sippe_non_clsc == "IG - Régulier") echo"selected"; ?>>IG - Régulier</option>
                                    <option value="du Parc" <?php if($accompagnements->sippe_non_clsc == "du Parc") echo"selected"; ?>>du Parc</option>
                                    <option value="Saint-Louis-du-Parc" <?php if($accompagnements->sippe_non_clsc == "Saint-Louis-du-Parc") echo"selected"; ?>>Saint-Louis-du-Parc</option>
                                </select>
                                <br>
                            </div>

                            <div class="group-form">
                            <label>Porte-bébé donné ?</label>
                            <input name="porte_bebe_donne" type="checkbox" value="1" <?php if($accompagnements->porte_bebe_donne == 1) echo "checked"; ?> />
                            </div>

                            <div class="group-form">
                            <label>Formation massage bébé donnée ?</label>
                            <input name="massage_bebe_donne" type="checkbox" value="1"  <?php if($accompagnements->massage_bebe_donne == 1) echo "checked"; ?> />
                            </div>

                            <hr>


                            <div class="group-form">
                                <h4>Informations pour Alternative-Naissance</h4>
                                <label for="refere">Référée par un organisme : </label>

                                <input name="refere" type="checkbox" value="1" <?php if($accompagnements->refere == 1) echo "checked"; ?> />
                            </div>
                            <br>

                            <div class="group-form">
                                <label for="refere_organisme">Si oui, lequel? </label>

                                <input name="refere_organisme"  class="form-control" type="text" /> {{$accompagnements->refere_organisme }}
                            </div>
                            <br>


                            <div class="group-form">
                                <label for="service_connu_id">Où avez-vous entendu parlé de AN ?  </label>

                                <input name="service_connu_old" class="form-control"  type="text" value="{{$accompagnements->service_connu }}" disabled />
                                <input name="service_connu_old" class="form-control"  type="hidden" value="{{$accompagnements->service_connu }}"  />
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
                                <input name="accompagnante_1_old" type="text" class="form-control" value="{{$accompagnements->accompagnante_1 }}" disabled />
                                <input name="accompagnante_1_old" type="hidden" class="form-control" value="{{$accompagnements->accompagnante_1 }}"  />
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
                                <label for="statut_accompagnante_id_1">Statut de l'accompagnante primaire </label>
                                <input name="statut_accompagnante_1_old" type="text" class="form-control" value="{{$accompagnements->statut_accompagnante_1 }}" disabled />
                                <input name="statut_accompagnante_1_old" type="hidden" class="form-control" value="{{$accompagnements->statut_accompagnante_1 }}"  />

                                <label for="statut_accompagnante_1">Choisir autre Statut (BD) </label>

                                <select id="" name="statut_accompagnante_1" class="form-control">
                                    <option>__</option>

                                    @foreach ($statut_accompagnante as $value)
                                        <option>{{ $value->prenom .' '. $value->nom}}</option>



                                    @endforeach
                                </select>

                                <br>

                            </div>



                            <div class="group-form">
                                <label>Date de remise du bilan acc1</label>
                                <input name="date_remise_bilan" type="date" class="form-control" value="{{$accompagnements->date_remise_bilan }}"  />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Montant payé acc1 </label>
                                <input name="montant_paye" type="text" class="form-control" value="{{$accompagnements->montant_paye }}"  />

                            </div>
                            <br>

                            <div class="group-form">
                                <label>Numéro du chèque acc1 </label>
                                <input name="numero_cheque" type="text" class="form-control" value="{{$accompagnements->numero_cheque }}"  />

                            </div>
                            <br>


                            <div class="group-form">
                                <label>Date du chèque acc1</label>
                                <input name="date_cheque" type="date" class="form-control" value="{{$accompagnements->date_cheque }}"  />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Dossier bilan acc1</label>
                                <input name="dossier_bilan" type="file" class="form-control" />
                            </div>
                            <br>
                            <br>


                            <div class="group-form">
                                <label for="accompagnante_id_2">Accompagnante secondaire </label>
                                <input name="accompagnante_2_old" type="text" class="form-control" value="{{$accompagnements->accompagnante_2 }}" disabled />
                                <input name="accompagnante_2_old" type="hidden" class="form-control" value="{{$accompagnements->accompagnante_2 }}" />
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
                                <label for="statut_accompagnante_id_2">Statut de l'accompagnante secondaire </label>
                                <input name="statut_accompagnante_2_old" type="text" class="form-control" value="{{$accompagnements->statut_accompagnante_2 }}" disabled />
                                <input name="statut_accompagnante_2_old" type="hidden" class="form-control" value="{{$accompagnements->statut_accompagnante_2 }}"  />

                                <label for="accompagnante_2">Choisir une autre statut (BD) </label>

                                <select id="" name="statut_accompagnante_2" class="form-control">
                                    <option>__</option>

                                    @foreach ($statut_accompagnante as $value)
                                        <option>{{ $value->prenom .' '. $value->nom}}</option>



                                    @endforeach
                                </select>

                                <br>

                            </div>


                            <div class="group-form">
                                <label>Date de remise du bilan acc2</label>
                                <input name="date_remise_bilan_acc2" type="date" class="form-control" value="{{$accompagnements->date_remise_bilan_acc2 }}"  />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Montant payé acc2 </label>
                                <input name="montant_paye_acc2" type="text" class="form-control" value="{{$accompagnements->montant_paye_acc2 }}"  />

                            </div>
                            <br>

                            <div class="group-form">
                                <label>Numéro du chèque acc2 </label>
                                <input name="numero_cheque_acc2" type="text" class="form-control" value="{{$accompagnements->numero_cheque_acc2 }}"  />

                            </div>
                            <br>


                            <div class="group-form">
                                <label>Date du chèque acc2</label>
                                <input name="date_cheque_acc2" type="date" class="form-control" value="{{$accompagnements->date_cheque_acc2 }}"  />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Dossier bilan acc2</label>
                                <input name="dossier_bilan_acc2" type="text" class="form-control" value="{{$accompagnements->dossier_bilan_acc2 }}"  />
                                <input name="dossier_bilan_acc2" type="file" />
                            </div>
                            <br>


                            <hr>

                            <div class="group-form">
                                <label>Fiche relève</label>

                                <input name="evaluation_document" type="file" class="form-control" />
                            </div>
                            <br>

                            <hr>

                            <div class="group-form">
                                <h4>Informations sur grossesse et accouchement</h4>
                                <label for="dpa">Date prevu de l'accouchement : </label>
                                <input type="date" class="form-control" value="{{ $accompagnements->dpa }}"  name="dpa" >
                            </div>
                            <br>
                            <div class="group-form">
                                <label for="hopital">Hopital : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->hopital }}"  name="hopital" >
                            </div>
                            <br>
                            <div class="group-form">
                                <label for="medecin">Medecin : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->medecin }}"  name="medecin" >
                            </div>
                            <br>
                            <div class="group-form">
                                <label for="type_soignant">Type de soignant : </label>
                                <select id="" name="type_soignant" class="form-control">
                                    <option value="Médecin de famille" <?php if($accompagnements->type_soignant == 'Médecin de famille') echo"selected"; ;?>>Médecin de famille</option>
                                    <option value="Gynécologue-obstétricien" <?php if($accompagnements->type_soignant == 'Gynécologue-obstétricien') echo"selected"; ?>>Gynécologue-obstétricien</option>
                                    <option value="Sage-femme" <?php if($accompagnements->type_soignant == 'Sage-femme') echo"selected"; ?>>Sage-femme</option>
                                </select>
                            </div>
                            <br>



                            <hr>


                            <div class="group-form">
                                <h4>Administration</h4>
                                <label name="notes_generales" >Notes générales du dossier</label>
                                <textarea name="notes_generales" type="text" class="form-control">
                                    {{$accompagnements->notes_generales }}
                                </textarea>

                            </div>
                            <br>


                            <div class="group-form">
                                <label name="anxiete" >Au moment de prendre la demande, à quel point avez-vous observé que la future mère était anxieuse ou inquiète</label>

                                <select name="anxiete" class="form-control">
                                    <option value='0' <?php if($accompagnements->anxiete == '0') echo "selected"; ?>>---</option>
                                    <option value='pas anxieuse' <?php if($accompagnements->anxiete == 'pas anxieuse') echo "selected"; ?>>Pas du tout anxieuse/inquiète</option>
                                    <option value='peu anxieuse' <?php if($accompagnements->anxiete == 'peu anxieuse') echo "selected"; ?>>Un peu anxieuse/inquiète</option>
                                    <option value='assez anxieuse' <?php if($accompagnements->anxiete == 'assez anxieuse') echo "selected"; ?>>Assez anxieuse/inquiète</option>
                                    <option value='très anxieuse' <?php if($accompagnements->anxiete == 'très anxieuse') echo "selected"; ?>>Très anxieuse/inquiète</option>
                                    <option value='non observée' <?php if($accompagnements->anxiete == 'non observée') echo "selected"; ?>>N'a pas pu être observé, pas assez d'observations pour répondre</option>
                                </select>

                            </div>
                            <br>

                            <div class="group-form">
                                <label name="notes_anxiete" >Notes sur le niveau d'anxiété/stress (optionnelles)</label>
                                <textarea name="notes_anxiete" type="text" class="form-control">
                                    {{$accompagnements->notes_anxiete }}
                                </textarea>

                            </div>
                            <br>


                            <div class="group-form">
                                <label name="accepter_contact_an" >Acceptez-vous d'être contacté par un intervenant d'Alternative Naissance pour des informations d'activités de votre secteur?</label>



                                <select name="accepter_contact_an" class="form-control">
                                    <option value='0' <?php if($accompagnements->accepter_contact_an == '0') echo "selected"; ?>>---</option>
                                    <option value='oui' <?php if($accompagnements->accepter_contact_an == 'oui') echo "selected"; ?>>oui</option>
                                    <option value='non' <?php if($accompagnements->accepter_contact_an == 'non') echo "selected"; ?>>non</option>
                                </select>

                            </div>
                            <br>

                            <div class="group-form">
                                <label name="accepter_contact_organisme">Acceptez-vous d'être contacté par un intervenant d'un autre organisme pour des informations d'activités de votre secteur?</label>
                                <select name="accepter_contact_organisme" class="form-control">
                                    <option value='0' <?php if($accompagnements->accepter_contact_organisme == '0') echo "selected"; ?>>---</option>
                                    <option value='oui' <?php if($accompagnements->accepter_contact_organisme == 'oui') echo "selected"; ?>>oui</option>
                                    <option value='non' <?php if($accompagnements->accepter_contact_organisme == 'non') echo "selected"; ?>>non</option>
                                </select>
                            </div>
                            <br>

                            <div class="group-form">

                                <label name="accepter_statistiques">Acceptez-vous qu'Alternative Naissance compile certaines données relativement à votre suivi et à votre accouchement, de manière anonyme et confidentielle, pour des fins statistiques.  Ces données pourraient ensuite être utilisées pour évaluer les effets de notre pratique et avoir un portrait de certaines pratiques obstétricales et de leurs effets.</label>
                                <select name="accepter_statistiques" class="form-control">
                                    <option value='0' <?php if($accompagnements->accepter_statistiques == '0') echo "selected"; ?>>---</option>
                                    <option value='oui' <?php if($accompagnements->accepter_statistiques == 'oui') echo "selected"; ?>>oui</option>
                                    <option value='non' <?php if($accompagnements->accepter_statistiques == 'non') echo "selected"; ?>>non</option>
                                </select>

                            </div>

                            <div class="group-form">

                                <label name="statut_dossier">Statut de ce dossier</label>
                                <select name="statut_dossier" class="form-control">
                                    <option value=1 <?php if($accompagnements->statut_dossier == 1) echo "selected"; ?>>Dossier complet</option>
                                    <option value=2 <?php if($accompagnements->statut_dossier == 2) echo "selected"; ?>>Dossier incomplet</option>
                                    <option value=3 <?php if($accompagnements->statut_dossier == 3) echo "selected"; ?>>Dossier problématique</option>
                                    <option value=4 <?php if($accompagnements->statut_dossier == 4) echo "selected"; ?>>Dossier terminé</option>
                                    <option value=5 <?php if($accompagnements->statut_dossier == 5) echo "selected"; ?>>Dossier annulé</option>
                                </select>

                            </div>






                        </div>

                        <!--SAME ROW OTHER SECTION -->
                        <div class="col-6 col-md-6">





                            <h4>Personnes prévues à l'accouchement</h4>

                            <div class="group-form" style="width:100%; padding-bottom:10px;">

                                    <?php
                                    $input_array = explode(',', $accompagnements->personnes_prevues_accouchement);

                                    ?>
                                        @foreach ($accouchement_personnes_prevues as $value)


                                            @if(in_array( $value->nom, $input_array))
                                                <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                                <input type="checkbox" id="{{ $value->nom}}" name="personnes_prevues_accouchement[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                                @continue
                                            @endif

                                            <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                                <input name='personnes_prevues_accouchement[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                                        @endforeach



                            </div>
                            <div class="group-form" style="width:100%; padding-bottom:10px;">

                                <label for="autre_personne">Autre personnes ?</label>


                                <input type="text" name="autre_personne" placeholder="Entrez autre personne" class="form-control" />
                            </div>




                            <div class="group-form" style="margin-top: 58px;padding-top:5px;">
                                <label for="commentaire_presence">Commentaire sur les présences : </label>
                                <input type="text" class="form-control" value="{{ $accompagnements->commentaire_presence }}"  name="commentaire_presence" >
                            </div>
                            <br>
                            <div class="group-form">
                                <label for="conditions_particulieres">Conditions particulières reliées à cette grossesse : </label>
                                <textarea type="text" class="form-control" name="conditions_particulieres"> {{ $accompagnements->conditions_particulieres }}</textarea>
                            </div>
                            <br>

                            <h4>Attentes reliées à cet accompagnement</h4>


                            <div class="group-form" style="width:100%; padding-bottom:10px;">


                                <?php
                                $input_array = explode(',', $accompagnements->attentes);


                                ?>

                                    @foreach ($attentes as $value)


                                        @if(in_array( $value->nom, $input_array))
                                            <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                            <input type="checkbox" id="{{ $value->nom}}" name="attentes[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                            @continue
                                        @endif

                                        <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                        <input name='attentes[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                                    @endforeach
                            </div>
                            <div class="group-form" style="width:100%; padding-bottom:10px;">

                                <label for="autre_attente">Autre attentes ?</label>


                                <input type="text" name="autre_attente" placeholder="Entrez autre attente" class="form-control" />
                            </div>



                            <div class="group-form" style="margin-top: 58px;">
                                <label for="notes_attentes">Notes sur les attentes : </label>
                                <textarea type="text" class="form-control" name="notes_attentes"> {{ $accompagnements->notes_attentes }}</textarea>
                            </div>
                            <br>

                            <hr>

                            <div class="group-form">
                                <label for="notes_attentes">Est-ce que vous avez présentement des préoccupations ou des inquiétudes concernant votre grossesse ? </label>

                                <select name="preoccupations_grossesse" class="form-control">
                                    <option value='0' <?php if($accompagnements->preoccupations_grossesse == '0') echo "selected"; ?>></option>
                                    <option value='oui' <?php if($accompagnements->preoccupations_grossesse == 'oui') echo "selected"; ?>>oui</option>
                                    <option value='non' <?php if($accompagnements->preoccupations_grossesse == 'non') echo "selected"; ?>>non</option>
                                </select>

                            </div>
                            <br>

                            <p style="text-align:center ">Si oui, à quels sujets?</p>


                            <div class="group-form" style="width:100%; padding-bottom:10px;">


                                <?php
                                $input_array = explode(',', $accompagnements->sujets_preoccupations_grossesse);


                                ?>

                                @foreach ($preoccupations_grossesse as $value)


                                    @if(in_array( $value->nom, $input_array))
                                        <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                        <input type="checkbox" id="{{ $value->nom}}" name="sujets_preoccupations_grossesse[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                        @continue
                                    @endif

                                    <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                    <input name='sujets_preoccupations_grossesse[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                                @endforeach
                            </div>

                            <div class="group-form" style="width:100%; padding-bottom:10px;">

                                <label for="autre_sujet_preoccupation_grossesse">Autre préoccupations grossesse  ?</label>


                                <input type="text" name="autre_sujet_preoccupation_grossesse" placeholder="Entrez autre préoccupations" class="form-control" />
                            </div>



                            <div class="group-form" style="margin-top: 58px;" >
                                <label for="notes_preoccupations_grossesse">Notes : </label>
                                <textarea type="text" class="form-control" name="notes_preoccupations_grossesse"> {{ $accompagnements->notes_preoccupations_grossesse }}</textarea>
                            </div>
                            <br>

                            <hr>


                            <div class="group-form">
                                <label for="preoccupations_accouchement">Est-ce que vous avez présentement des préoccupations ou des inquiétudes concernant votre accouchement? </label>

                                <select name="preoccupations_accouchement" class="form-control">
                                    <option value='0' <?php if($accompagnements->preoccupations_accouchement == '0') echo "selected"; ?>></option>
                                    <option value='oui' <?php if($accompagnements->preoccupations_accouchement == 'oui') echo "selected"; ?>>oui</option>
                                    <option value='non' <?php if($accompagnements->preoccupations_accouchement == 'non') echo "selected"; ?>>non</option>
                                </select>

                            </div>
                            <br>

                            <p style="text-align:center ">Si oui, à quels sujets?</p>


                            <div class="group-form" style="width:100%; padding-bottom:10px;">


                                <?php
                                $input_array = explode(',', $accompagnements->sujets_preoccupations_accouchement);


                                ?>

                                @foreach ($preoccupations_accouchement as $value)


                                    @if(in_array( $value->nom, $input_array))
                                        <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                        <input type="checkbox" id="{{ $value->nom}}" name="sujets_preoccupations_accouchement[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                        @continue
                                    @endif

                                    <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                    <input name='sujets_preoccupations_accouchement[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                                @endforeach
                            </div>

                            <div class="group-form" style="width:100%; padding-bottom:10px;">

                                <label for="autre_sujet_preoccupation_accouchement">Autre préoccupations accouchement  ?</label>


                                <input type="text" name="autre_sujet_preoccupation_accouchement" placeholder="Entrez autre préoccupations" class="form-control" />
                            </div>



                            <div class="group-form" style="margin-top: 58px;">
                                <label for="notes_preoccupations_accouchement">Notes : </label>
                                <textarea type="text" class="form-control" name="notes_preoccupations_accouchement"> {{ $accompagnements->notes_preoccupations_accouchement }}</textarea>

                            </div>
                            <br>

                            <hr>


                            <div class="group-form">
                                <label for="preoccupations_accouchement">Est-ce que vous avez présentement des préoccupations ou des inquiétudes concernant l'arrivée de votre bébé ? </label>

                                <select name="preoccupations_bebe" class="form-control">
                                    <option value='0' <?php if($accompagnements->preoccupations_bebe == '0') echo "selected"; ?>></option>
                                    <option value='oui' <?php if($accompagnements->preoccupations_bebe == 'oui') echo "selected"; ?>>oui</option>
                                    <option value='non' <?php if($accompagnements->preoccupations_bebe == 'non') echo "selected"; ?>>non</option>
                                </select>

                            </div>
                            <br>

                            <p style="text-align:center ">Si oui, à quels sujets?</p>


                            <div class="group-form" style="width:100%; padding-bottom:10px;">


                                <?php
                                $input_array = explode(',', $accompagnements->sujets_preoccupations_bebe);


                                ?>

                                @foreach ($preoccupations_bebe as $value)


                                    @if(in_array( $value->nom, $input_array))
                                        <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                        <input type="checkbox" id="{{ $value->nom}}" name="sujets_preoccupations_bebe[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                        @continue
                                    @endif

                                    <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                    <input name='sujets_preoccupations_bebe[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                                @endforeach
                            </div>

                            <div class="group-form" style="width:100%; padding-bottom:10px;">

                                <label for="autre_sujet_preoccupation_bebe">Autre préoccupations bébé   ?</label>


                                <input type="text" name="autre_sujet_preoccupation_bebe" placeholder="Entrez autre préoccupations" class="form-control" />
                            </div>





                            <div class="group-form"  style="margin-top: 58px;">
                                <label for="notes_preoccupations_bebe">Notes : </label>
                                <textarea type="text" class="form-control" name="notes_preoccupations_bebe"> {{ $accompagnements->notes_preoccupations_bebe }}</textarea>
                            </div>
                            <br>

                            <hr>



                            <div class="group-form">
                                <label for="cours_prenatal">Cours prénataux</label>
                                <iDon et Évaluationnput name="cours_prenatal" type="checkbox" value="1" style="" <?php if($accompagnements->cours_prenatal == 1) echo "checked"; ?> />

                            </div>
                            <br>
                            <div class="group-form">
                                <label for="notes_prenatal">Notes reliées aux cours prénataux : </label>
                                <textarea type="text" class="form-control" name="notes_prenatal"> {{ $accompagnements->notes_prenatal }}</textarea>
                            </div>
                            <br>




                            <hr>



                            <div class="group-form">
                                <h4>Don et Évaluation</h4>
                                <label>Sollicité pour un don et évaluation</label>
                                <input name="sollicite_don" type="checkbox" value="1"  <?php if($accompagnements->sollicite_don == 1) echo "checked"; ?> />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Date de la sollicitation</label>
                                <input name="date_sollicitation_don" type="date"  class="form-control" value="{{$accompagnements->date_sollicitation_don}}" />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Date du don</label>
                                <input name="don_date" type="date"  class="form-control" value="{{$accompagnements->don_date }}" />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Montant du don</label>
                                <input name="don_montant" type="text"  class="form-control" value="{{$accompagnements->don_montant }}" />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Numéro de reçu pour le don</label>
                                <input name="don_numero_recu" type="text"  class="form-control" value="{{$accompagnements->don_numero_recu }}" />
                            </div>
                            <br>

                            <div class="group-form">
                                <label>Mode de paiment du don</label>

                                <select name="don_type_paiement" class="form-control">
                                    <option value="" <?php if($accompagnements->don_type_paiement == "") echo "selected"; ?>>---</option>
                                    <option value="Cheque" <?php if($accompagnements->don_type_paiement == "Cheque") echo "selected"; ?>>Chèque</option>
                                    <option value="Paypal" <?php if($accompagnements->don_type_paiement == "Paypal") echo "selected"; ?>>Paypal</option>
                                    <option value="Comptant" <?php if($accompagnements->don_type_paiement == "Comptant") echo "selected"; ?>>Comptant</option>
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
                                    {{$accompagnements->notes_accompagnement }}
                                </textarea>

                            </div>
                            <br>

                            <hr>

                            <div class="group-form">
                                <h4>Informations sur la stagiaire</h4>
                                <strong>Dossier de demande de stage</strong>
                                <input name="dossier_demande_stage" type="checkbox" value="1"  <?php if($accompagnements->dossier_demande_stage == 1) echo "checked"; ?> />

                            </div>
                            <br>


                            <div class="group-form">
                                <strong>Dossier de marrainage</strong>
                                <input  name="dossier_marrainage" type="checkbox" value="1"  <?php if($accompagnements->dossier_marrainage == 1) echo "checked"; ?> />

                            </div>
                            <br>


                            <div class="group-form">
                                <strong>Marrainage en dyade</strong>
                                <input  name="dyade" type="checkbox" value="1"  <?php if($accompagnements->dyade == 1) echo "checked"; ?> />

                            </div>
                            <br>


                            <div class="group-form">
                                <label name="stagiaire" >Nom de la stagiaire</label>
                                <input class="form-control" name="stagiaire" type="text"  value="{{$accompagnements->stagiaire}}" />

                            </div>
                            <br>



                            <div class="group-form">
                                <label name="stage_paye" >Stage payé</label>
                                <input  name="stage_paye" type="checkbox" value="1"  <?php if($accompagnements->stage_paye == 1) echo "checked"; ?> />

                            </div>
                            <br>


                            <div class="group-form">
                                <label name="date_paiement_stage" >Date de paiement du stage</label>
                                <input class="form-control" name="date_paiement_stage" type="date"  value="{{$accompagnements->date_paiement_stage}}" />

                            </div>
                            <br>

                            <div class="group-form">
                                <label name="montant_paye_par_stagiaire" >Montant payé par la stagiaire</label>
                                <input class="form-control" name="montant_paye_par_stagiaire" type="text"  value="{{$accompagnements->montant_paye_par_stagiaire}}" />

                            </div>
                            <br>

                            <div class="group-form">
                                <label name="bilan_supervision_stage_remis" >Bilan de stage remis</label>
                                <input  name="bilan_supervision_stage_remis" type="checkbox" value="1"  <?php if($accompagnements->bilan_supervision_stage_remis == 1) echo "checked"; ?> />

                            </div>
                            <br>

                            <div class="group-form">
                                <label>Pièce électronique du bilan de stage </label>
                                <input name="bilan_supervision_stage_document" type="text" class="form-control" value="{{$accompagnements->bilan_supervision_stage_document }}"  />
                                <input name="bilan_supervision_stage_document" type="file" />
                            </div>
                            <br>

                            <div class="group-form">
                                <label name="montant_paye_marrainee" >Montant payé à la superviseure</label>
                                <input class="form-control" name="montant_paye_marrainee" type="text"  value="{{$accompagnements->montant_paye_marrainee}}" />

                            </div>
                            <br>

                            <div class="group-form">
                                <label name="numero_cheque_marrainee" >Numéro du chèque de la superviseure</label>
                                <input class="form-control" name="numero_cheque_marrainee" type="text"  value="{{$accompagnements->numero_cheque_marrainee}}" />

                            </div>
                            <br>


                            <div class="group-form">
                                <label name="date_paiement_stage" >Date de paiement du stage</label>
                                <input class="form-control" name="date_cheque_marrainee" type="date"  value="{{$accompagnements->date_cheque_marrainee}}" />

                            </div>
                            <br>



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
