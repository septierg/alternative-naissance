@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                {!! Form::model($rencontres, ['method' => 'PATCH','action' => ['App\Http\Controllers\RencontreController@update', $rencontres->id],'files' =>true]) !!}
                @csrf
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Modification de l'inscription</h4>
                        <div class="group-form">
                            <label for="date_demande">Date de demande : </label>
                            <input type="date" class="form-control" value="{{ $rencontres->date_demande}}"  name="date_demande" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="annee_fiscale">Année fiscale: </label>
                            <select id="" name="annee_fiscale" class="form-control">
                                <option value="2005-2006" <?php if($rencontres->annee_fiscale == '2005-2006') echo"selected"; use Illuminate\Support\Facades\DB;?>>2005-2006</option>
                                <option value="2006-2007" <?php if($rencontres->annee_fiscale == '2006-2007') echo"selected"; ?>>2006-2007</option>
                                <option value="2007-2008" <?php if($rencontres->annee_fiscale == '2007-2008') echo"selected"; ?>>2007-2008</option>
                                <option value="2008-2009" <?php if($rencontres->annee_fiscale == '2008-2009') echo"selected"; ?>>2008-2009</option>
                                <option value="2009-2010" <?php if($rencontres->annee_fiscale == '2009-2010') echo"selected"; ?>>2009-2010</option>

                                <option value="2010-2011" <?php if($rencontres->annee_fiscale == '2010-2011') echo"selected"; ?>>2010-2011</option>
                                <option value="2011-2012" <?php if($rencontres->annee_fiscale == '2011-2012') echo"selected"; ?>>2011-2012</option>
                                <option value="2012-2013" <?php if($rencontres->annee_fiscale == '2012-2013') echo"selected"; ?>>2012-2013</option>
                                <option value="2013-2014" <?php if($rencontres->annee_fiscale == '2013-2014') echo"selected"; ?>>2013-2014</option>

                                <option value="2014-2015" <?php if($rencontres->annee_fiscale == '2014-2015') echo"selected"; ?>>2014-2015</option>
                                <option value="2015-2016" <?php if($rencontres->annee_fiscale == '2015-2016') echo"selected"; ?>>2015-2016</option>
                                <option value="2016-2017" <?php if($rencontres->annee_fiscale == '2016-2017') echo"selected"; ?>>2016-2017</option>
                                <option value="2017-2018" <?php if($rencontres->annee_fiscale == '2017-2018') echo"selected"; ?>>2017-2018</option>

                                <option value="2018-2019" <?php if($rencontres->annee_fiscale == '2018-2019') echo"selected"; ?>>2018-2019</option>
                                <option value="2019-2020" <?php if($rencontres->annee_fiscale == '2019-2020') echo"selected"; ?>>2019-2020</option>
                                <option value="2020-2021" <?php if($rencontres->annee_fiscale == '2020-2021') echo"selected"; ?>>2020-2021</option>
                                <option value="2021-2022" <?php if($rencontres->annee_fiscale == '2021-2022') echo"selected"; ?>>2021-2022</option>

                                <option value="2022-2023" <?php if($rencontres->annee_fiscale == '2022-2023') echo"selected"; ?>>2022-2023</option>
                                <option value="2023-2024" <?php if($rencontres->annee_fiscale == '2023-2024') echo"selected"; ?>>2023-2024</option>
                                <option value="2024-2025" <?php if($rencontres->annee_fiscale == '2024-2025') echo"selected"; ?>>2024-2025</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <h4>Informations sur la clientele</h4>
                            <label for="nom">Inscrits: </label>
                            <input type="text" class="form-control" value="{{ $rencontres->prenom .' ' . $rencontres->nom}}"  name="nom" disabled>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="code_postal">Code postal: </label>
                            <input type="text" class="form-control" value="{{ $rencontres->code_postal}}"  name="code_postal" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="arrondissement_habite_id">Arrondissement habité lors de l'acchouchement: </label>
                            <select id="" name="arrondissement_habite_id" class="form-control">
                                <option value="0" <?php if($rencontres->pae_clsc_id == 0) echo"selected"; ;?>>__</option>
                                <option value="1" <?php if($rencontres->pae_clsc_id == 1) echo"selected"; ;?>>Villeray</option>
                                <option value="2" <?php if($rencontres->pae_clsc_id == 2) echo"selected"; ?>>Petite-Patrie</option>
                                <option value="3" <?php if($rencontres->pae_clsc_id == 3) echo"selected"; ?>>Rosemont</option>
                                <option value="4" <?php if($rencontres->pae_clsc_id == 4) echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="5" <?php if($rencontres->pae_clsc_id == 5) echo"selected"; ?>>Lasalle</option>

                                <option value="6" <?php if($rencontres->pae_clsc_id == 6) echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="7" <?php if($rencontres->pae_clsc_id == 7) echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="8" <?php if($rencontres->pae_clsc_id == 8) echo"selected"; ?>>Des Faubourgs</option>
                                <option value="9" <?php if($rencontres->pae_clsc_id == 9) echo"selected"; ?>>Saint-Léonard</option>

                                <option value="10" <?php if($rencontres->pae_clsc_id == 10) echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="11" <?php if($rencontres->pae_clsc_id == 11) echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="13" <?php if($rencontres->pae_clsc_id == 13) echo"selected"; ?>>Pierrefonds</option>
                                <option value="15" <?php if($rencontres->pae_clsc_id == 15) echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="16" <?php if($rencontres->pae_clsc_id == 16) echo"selected"; ?>>Ahuntsic</option>
                                <option value="17" <?php if($rencontres->pae_clsc_id == 17) echo"selected"; ?>>Saint-Michel</option>
                                <option value="18" <?php if($rencontres->pae_clsc_id == 18) echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="19" <?php if($rencontres->pae_clsc_id == 19) echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="20" <?php if($rencontres->pae_clsc_id == 20) echo"selected"; ?>>IG - Régulier</option>
                                <option value="21" <?php if($rencontres->pae_clsc_id == 21) echo"selected"; ?>>du Parc</option>
                                <option value="22" <?php if($rencontres->pae_clsc_id == 22) echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="langue_parlee">Langues parlées: </label>
                            <input type="text" class="form-control" value="{{ $rencontres->langue_parlee}}"  name="langue_parlee" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="statut_citoyen">Statut de citoyenneté : </label>
                            <select id="" name="statut_citoyen" class="form-control">
                                <option value="Citoyen canadien" <?php if($rencontres->statut_citoyen == 'Citoyen canadien') echo"selected"; ;?>>Citoyen canadien</option>
                                <option value="Résident permanent" <?php if($rencontres->statut_citoyen == 'Résident permanent') echo"selected"; ?>>Résident permanent</option>
                                <option value="Réfugié" <?php if($rencontres->statut_citoyen == 'Réfugié') echo"selected"; ?>>Réfugié</option>
                                <option value="Visa" <?php if($rencontres->statut_citoyen == 'Visa') echo"selected"; ?>>Visa</option>
                                <option value="Immigrant reçu" <?php if($rencontres->statut_citoyen == 'Immigrant reçu') echo"selected"; ?>>Immigrant reçu</option>

                                <option value="Demandeur d'asile" <?php if($rencontres->statut_citoyen == 'Demandeur d\'asile') echo"selected"; ?>>Demandeur d'asile</option>
                                <option value="Visa d'études" <?php if($rencontres->statut_citoyen == 'Visa d\'études') echo"selected"; ?>>Visa d'études</option>
                                <option value="sans statut" <?php if($rencontres->statut_citoyen == 'sans statut') echo"selected"; ?>>sans statut</option>
                                <option value="Conjoint Canadien" <?php if($rencontres->statut_citoyen == 'Conjoint Canadien') echo"selected"; ?>>Conjoint Canadien</option>

                                <option value="Visa de travail" <?php if($rencontres->statut_citoyen == 'Visa de travail') echo"selected"; ?>>Visa de travail</option>
                                <option value="Visteur" <?php if($rencontres->statut_citoyen == 'Visteur') echo"selected"; ?>>Visteur</option>
                                <option value="parrainé par mari" <?php if($rencontres->statut_citoyen == 'parrainé par mari') echo"selected"; ?>>parrainé par mari</option>
                                <option value="Résidente temporaire" <?php if($rencontres->statut_citoyen == 'Résidente temporaire') echo"selected"; ?>>Résidente temporaire</option>

                                <option value="en attente statut résidence" <?php if($rencontres->statut_citoyen == 'en attente statut résidence') echo"selected"; ?>>en attente statut résidence</option>
                                <option value="Congo" <?php if($rencontres->statut_citoyen == 'Congo') echo"selected"; ?>>Congo</option>
                                <option value="visa de tourisme" <?php if($rencontres->statut_citoyen == 'visa de tourisme') echo"selected"; ?>>visa de tourisme</option>
                                <option value="Permis de travail" <?php if($rencontres->statut_citoyen == 'Permis de travail') echo"selected"; ?>>Permis de travail</option>

                                <option value="Parrainage en cours" <?php if($rencontres->statut_citoyen == 'Parrainage en cours') echo"selected"; ?>>Parrainage en cours</option>
                                <option value="Citoyenne reçue" <?php if($rencontres->statut_citoyen == 'Citoyenne reçue') echo"selected"; ?>>Citoyenne reçue</option>
                            </select>
                        </div>
                        <br>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_statut_citoyen">Autre statut citoyen   ?</label>


                            <input type="text" name="autre_statut_citoyen" placeholder="Entrez autre statut" class="form-control" />
                        </div>


                        <div class="group-form">
                            <label for="pays_origine">Pays d'origine : </label>
                            <input type="text" class="form-control"  name="pays_origine"  value="{{ $rencontres->pays_origine}}" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="date_arrivee">Date d'arrivée au Québec : </label>
                            <input type="date" class="form-control"  name="date_arrivee"  value="{{ $rencontres->date_arrivee}}" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="ramq">RAMQ : </label>
                            <select name="ramq"  class="form-control">
                                <option value='à venir' <?php if($rencontres->ramq == 'à venir') echo "selected"; ?>>à venir</option>
                                <option value='oui' <?php if($rencontres->ramq == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($rencontres->ramq == 'non') echo "selected"; ?>>non</option>
                            </select>

                        </div>
                        <br>


                        <div class="group-form">
                            <label for="source_revenu_id">Source de revenu : </label>
                            <select id="" name="source_revenu_id" class="form-control">
                                <option value="0" <?php if($rencontres->source_revenu_id == 0) echo"selected"; ;?>>__</option>
                                <option value="1" <?php if($rencontres->source_revenu_id == 1) echo"selected"; ;?>>Prestation sociale</option>
                                <option value="3" <?php if($rencontres->source_revenu_id == 3) echo"selected"; ?>>Assurance-emploi</option>
                                <option value="4" <?php if($rencontres->source_revenu_id == 4) echo"selected"; ?>>Riche</option>
                                <option value="5" <?php if($rencontres->source_revenu_id == 5) echo"selected"; ?>>travail: mari et elle (sous Emploi-Qc)</option>

                                <option value="6" <?php if($rencontres->source_revenu_id == 6) echo"selected"; ?>>Conjoint travaille</option>
                                <option value="7" <?php if($rencontres->source_revenu_id == 7) echo"selected"; ?>>Étudiante</option>
                                <option value="8" <?php if($rencontres->source_revenu_id == 8) echo"selected"; ?>>Elle travaille</option>
                                <option value="9" <?php if($rencontres->source_revenu_id == 9) echo"selected"; ?>>csst et rqap</option>

                                <option value="10" <?php if($rencontres->source_revenu_id == 10) echo"selected"; ?>>csst retrait préventif (aide educatrice)</option>
                                <option value="11" <?php if($rencontres->source_revenu_id == 11) echo"selected"; ?>>mari travaille aussi</option>
                                <option value="12" <?php if($rencontres->source_revenu_id == 12) echo"selected"; ?>>Conjoint travaille</option>
                                <option value="13" <?php if($rencontres->source_revenu_id == 13) echo"selected"; ?>>mari commence un emploi cette semaine</option>

                                <option value="14" <?php if($rencontres->source_revenu_id == 14) echo"selected"; ?>>prêts et bourses</option>
                                <option value="15" <?php if($rencontres->source_revenu_id == 15) echo"selected"; ?>>Étudiante en doctorat (bourse) et conjoint travai</option>
                                <option value="16" <?php if($rencontres->source_revenu_id == 16) echo"selected"; ?>>Budget prévu avant d'immigrer</option>

                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="service_connu_id">Choisir une autre source (BD) </label>
                            <input type="text" name="autre_source_revenu" placeholder="Entrez autre source revenu" class="form-control" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="suivi_intervenants">Suivi avec intervenants /Organismes : </label>
                            <textarea type="text" class="form-control" name="suivi_intervenants" >{{ $rencontres->suivi_intervenants }}</textarea>
                        </div>
                        <br>


                        <p style="text-align:center ">Cercle familial / Social au Québec</p>



                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <?php
                            $input_array = explode(',', $rencontres->cercle);

                            ?>
                            @foreach ($cercle as $value)


                                @if(in_array( $value->nom, $input_array))
                                    <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                    <input type="checkbox" id="{{ $value->nom}}" name="cercle[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                    @continue
                                @endif

                                <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                <input name='cercle[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                            @endforeach



                        </div>
                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_cercle">Autre personnes ?</label>


                            <input type="text" name="autre_cercle" placeholder="Entrez autre personne" class="form-control" />
                        </div>


                        <hr>

                        <h4>Informations sur le conjoint et la famille</h4>

                        <div class="group-form">
                            <label for="conjoint_prenom">Nom du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $rencontres->conjoint_prenom }}"  name="conjoint_prenom" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conjoint_nom">Nom du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $rencontres->conjoint_nom }}"  name="conjoint_nom" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="conjoint_occupation">Occupation du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $rencontres->conjoint_occupation }}"  name="conjoint_occupation" >
                        </div>
                        <br>
                        <div class="group-form">
                            <label for="courriel_conjoint">Email du Conjoint : </label>
                            <input type="text" class="form-control" value="{{ $rencontres->courriel_conjoint }}"  name="courriel_conjoint" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="monoparentale">Monoparentale : </label>
                            <input type="checkbox" name="monoparentale"  <?php if($rencontres->monoparentale === 1 ) echo"checked"; ?> value="{{ $rencontres->monoparentale }}" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="conjoint_absent_pays">Conjoint absent du pays : </label>
                            <input type="checkbox" name="conjoint_absent_pays"  <?php if($rencontres->conjoint_absent_pays === 1 ) echo"checked"; ?> value="{{ $rencontres->conjoint_absent_pays }}" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conjoint_absent_accouchement">Conjoint absent lors de l'accouchement : </label>
                            <input type="checkbox" name="conjoint_absent_accouchement"  <?php if($rencontres->conjoint_absent_accouchement === 1 ) echo"checked"; ?> value="{{ $rencontres->conjoint_absent_accouchement }}" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="nbr_grossesse">Nombre de grossesse incluant celle-ci : </label>
                            <input type="number" min="0" class="form-control" value="{{ $rencontres->nbr_grossesse }}"  name="nbr_grossesse" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="nbr_enfants">Nombre d'enfants : </label>
                            <input type="number" min="0" class="form-control" value="{{ $rencontres->nbr_enfants }}"  name="nbr_enfants" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="age_respectif">Âge des enfants : </label>
                            <textarea type="text" class="form-control" name="age_respectif" >{{ $rencontres->age_respectif }}</textarea>
                        </div>
                        <br>

                        <hr>

                        <div class="group-form">
                            <h4>Administration</h4>
                            <label name="notes_generales" >Notes générales du dossier</label>
                            <textarea name="notes_generales" type="text" class="form-control">
                                    {{$rencontres->notes_generales }}
                                </textarea>

                        </div>
                        <br>



                        <div class="group-form">
                            <label name="accepter_contact_an" >Acceptez-vous d'être contacté par un intervenant d'Alternative Naissance pour des informations d'activités de votre secteur?</label>



                            <select name="accepter_contact_an" class="form-control">
                                <option value='0' <?php if($rencontres->accepter_contact_an == '0') echo "selected"; ?>>---</option>
                                <option value='oui' <?php if($rencontres->accepter_contact_an == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($rencontres->accepter_contact_an == 'non') echo "selected"; ?>>non</option>
                            </select>

                        </div>
                        <br>

                        <div class="group-form">
                            <label name="accepter_contact_organisme">Acceptez-vous d'être contacté par un intervenant d'un autre organisme pour des informations d'activités de votre secteur?</label>
                            <select name="accepter_contact_organisme" class="form-control">
                                <option value='0' <?php if($rencontres->accepter_contact_organisme == '0') echo "selected"; ?>>---</option>
                                <option value='oui' <?php if($rencontres->accepter_contact_organisme == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($rencontres->accepter_contact_organisme == 'non') echo "selected"; ?>>non</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">

                            <label name="accepter_statistiques">Acceptez-vous qu'Alternative Naissance compile certaines données relativement à votre suivi et à votre accouchement, de manière anonyme et confidentielle, pour des fins statistiques.  Ces données pourraient ensuite être utilisées pour évaluer les effets de notre pratique et avoir un portrait de certaines pratiques obstétricales et de leurs effets.</label>
                            <select name="accepter_statistiques" class="form-control">
                                <option value='0' <?php if($rencontres->accepter_statistiques == '0') echo "selected"; ?>>---</option>
                                <option value='oui' <?php if($rencontres->accepter_statistiques == 'oui') echo "selected"; ?>>oui</option>
                                <option value='non' <?php if($rencontres->accepter_statistiques == 'non') echo "selected"; ?>>non</option>
                            </select>

                        </div>

                        <div class="group-form">

                            <label name="statut_dossier">Statut de ce dossier</label>
                            <select name="statut_dossier" class="form-control">
                                <option value=1 <?php if($rencontres->statut_dossier == 1) echo "selected"; ?>>Dossier complet</option>
                                <option value=2 <?php if($rencontres->statut_dossier == 2) echo "selected"; ?>>Dossier incomplet</option>
                                <option value=3 <?php if($rencontres->statut_dossier == 3) echo "selected"; ?>>Dossier problématique</option>
                                <option value=4 <?php if($rencontres->statut_dossier == 4) echo "selected"; ?>>Dossier terminé</option>
                                <option value=5 <?php if($rencontres->statut_dossier == 5) echo "selected"; ?>>Dossier annulé</option>
                            </select>

                        </div>






                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">

                        <h4>Informations sur la grossesse et l'accouchement</h4>

                        <div class="group-form">
                            <label for="dpa">Date prévue d'accouchement ou Date de naissance du bébé : </label>
                            <input type="date" class="form-control"  name="dpa"  value="{{ $rencontres->dpa}}" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="hopital">Hôpital : </label>
                            <input type="text" class="form-control"  name="hopital"  value="{{ $rencontres->hopital}}" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="type_accouchement">Type d'accouchement planifié / souhaité ou Type d'accouchement : </label>
                            <textarea type="text" class="form-control" name="type_accouchement" >{{ $rencontres->type_accouchement }}</textarea>
                        </div>
                        <br>


                        <p style="text-align:center ">Personnes prévues à l'accouchement</p>


                        <div class="group-form" style="width:100%; padding-bottom:5px;">

                            <?php
                            $input_array = explode(',', $rencontres->personnes_prevues_accouchement);

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
                        <br>



                        <div class="group-form" style="width:100%; ">

                            <label for="autre_personne">Autre personnes ?</label>


                            <input type="text" name="autre_personne" placeholder="Entrez autre personne" class="form-control" />
                        </div>
                        <br>


                        <div class="group-form" style="margin-top: 10px;">
                            <label for="commentaire_presence">Commentaire sur les présences : </label>
                            <input type="text" class="form-control" value="{{ $rencontres->commentaire_presence }}"  name="commentaire_presence" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conditions_particulieres">Conditions particulières reliées à cette grossesse</label>

                            <textarea id="" name="conditions_particulieres" class="form-control">
                                            {{ $rencontres->conditions_particulieres}}
                            </textarea>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="cours_prenatal">Cours prénataux : </label>
                            <input type="checkbox" name="cours_prenatal"  <?php if($rencontres->cours_prenatal === 1 ) echo"checked"; ?> value="{{ $rencontres->cours_prenatal }}" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="notes_prenatal">Notes reliées aux cours prénataux : </label>
                            <textarea type="text" class="form-control" name="notes_prenatal"> {{ $rencontres->notes_prenatal }}</textarea>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="raisons_consultation">Raisons de cette consultation : </label>
                            <textarea type="text" class="form-control" name="raisons_consultation"> {{ $rencontres->raisons_consultation }}</textarea>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="suggestions_donnees">Suggestions données : </label>
                            <textarea type="text" class="form-control" name="suggestions_donnees"> {{ $rencontres->suggestions_donnees }}</textarea>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="sujets_documentations">Sujets des documentations données : </label>
                            <textarea type="text" class="form-control" name="sujets_documentations"> {{ $rencontres->sujets_documentations }}</textarea>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="sujets_documentations">Durée la consultation : </label>
                            <select type="text" class="form-control">
                                <option value='15 minutes' <?php if($rencontres->duree_consultation == '15 minutes') echo "selected"; ?>>15 minutes</option>
                                <option value='30 minutes' <?php if($rencontres->duree_consultation == '30 minutes') echo "selected"; ?>>30 minutes</option>
                                <option value='45 minutes' <?php if($rencontres->duree_consultation == '45 minutes') echo "selected"; ?>>45 minutes</option>
                                <option value='60 minutes' <?php if($rencontres->duree_consultation == '60 minutes') echo "selected"; ?>>60 minutes</option>
                                <option value='75 minutes' <?php if($rencontres->duree_consultation == '75 minutes') echo "selected"; ?>>75 minutes</option>
                                <option value='90 minutes' <?php if($rencontres->duree_consultation == '90 minutes') echo "selected"; ?>>90 minutes</option>
                            </select>
                        </div>
                        <br>

                        <p style="text-align:center ">Références données</p>

                        <div class="group-form" style="width:100%; padding-bottom:5px;">

                            <?php
                            $input_array = explode(',', $rencontres->references_donnees);

                            ?>
                            @foreach ($reference_donnee as $value)


                                @if(in_array( $value->nom, $input_array))
                                    <label for="{{ $value->nom}}">{{ $value->nom}}</label>
                                    <input type="checkbox" id="{{ $value->nom}}" name="references_donnees[]" value="{{ $value->nom}}" style='height:12px;margin-left:10px;' checked>&nbsp;&nbsp;
                                    @continue
                                @endif

                                <label for="{{ $value->nom}}">{{  $value->nom}}</label>
                                <input name='references_donnees[]' type='checkbox' value='{{ $value->nom}}' style='height:12px;margin-left:10px;'  />&nbsp;&nbsp;


                            @endforeach



                        </div>
                        <br>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_reference">Autre référence ?</label>


                            <input type="text" name="autre_reference" placeholder="Entrez autre reference" class="form-control" />
                        </div>

                        <br>
                        <hr>


                        <div class="group-form">
                            <h4>Informations sur les programmes de nos partenaires</h4>
                            <label for="pae">Programme Avenir Enfants (PAE) : </label>

                            <input name="pae" type="checkbox" value="1" <?php if($rencontres->pae == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="pae_clsc_id">CLSS associé à ce PAE </label>

                            <select id="" name="pae_clsc_id" class="form-control">
                                <option value="0" <?php if($rencontres->pae_clsc_id == 0) echo"selected"; ;?>>__</option>
                                <option value="1" <?php if($rencontres->pae_clsc_id == 1) echo"selected"; ;?>>Villeray</option>
                                <option value="2" <?php if($rencontres->pae_clsc_id == 2) echo"selected"; ?>>Petite-Patrie</option>
                                <option value="3" <?php if($rencontres->pae_clsc_id == 3) echo"selected"; ?>>Rosemont</option>
                                <option value="4" <?php if($rencontres->pae_clsc_id == 4) echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="5" <?php if($rencontres->pae_clsc_id == 5) echo"selected"; ?>>Lasalle</option>

                                <option value="6" <?php if($rencontres->pae_clsc_id == 6) echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="7" <?php if($rencontres->pae_clsc_id == 7) echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="8" <?php if($rencontres->pae_clsc_id == 8) echo"selected"; ?>>Des Faubourgs</option>
                                <option value="9" <?php if($rencontres->pae_clsc_id == 9) echo"selected"; ?>>Saint-Léonard</option>

                                <option value="10" <?php if($rencontres->pae_clsc_id == 10) echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="11" <?php if($rencontres->pae_clsc_id == 11) echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="13" <?php if($rencontres->pae_clsc_id == 13) echo"selected"; ?>>Pierrefonds</option>
                                <option value="15" <?php if($rencontres->pae_clsc_id == 15) echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="16" <?php if($rencontres->pae_clsc_id == 16) echo"selected"; ?>>Ahuntsic</option>
                                <option value="17" <?php if($rencontres->pae_clsc_id == 17) echo"selected"; ?>>Saint-Michel</option>
                                <option value="18" <?php if($rencontres->pae_clsc_id == 18) echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="19" <?php if($rencontres->pae_clsc_id == 19) echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="20" <?php if($rencontres->pae_clsc_id == 20) echo"selected"; ?>>IG - Régulier</option>
                                <option value="21" <?php if($rencontres->pae_clsc_id == 21) echo"selected"; ?>>du Parc</option>
                                <option value="22" <?php if($rencontres->pae_clsc_id == 22) echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="sippe">Programme SIPPE : </label>
                            <input name="sippe" type="checkbox" value="1" <?php if($rencontres->sippe == 1) echo "checked"; ?> />
                            <br>
                        </div>
                        <br>


                        <div class="group-form">
                            <label>Si OUI à SIPPE, CLSC associé</label>
                            <select id="" name="sippe_oui_clsc" class="form-control">

                                <option value="" <?php if($rencontres->sippe_oui_clsc == '') echo"selected"; ;?>>__</option>
                                <option value="Villeray" <?php if($rencontres->sippe_oui_clsc == "Villeray") echo"selected"; ;?>>Villeray</option>
                                <option value="Petite-Patrie" <?php if($rencontres->sippe_oui_clsc == "Petite-Patrie") echo"selected"; ?>>Petite-Patrie</option>
                                <option value="Rosemont" <?php if($rencontres->sippe_oui_clsc == "Rosemont") echo"selected"; ?>>Rosemont</option>
                                <option value="Hochelega-Maisonneuve" <?php if($rencontres->sippe_oui_clsc == "Hochelega-Maisonneuve") echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="Lasalle" <?php if($rencontres->sippe_oui_clsc == "Lasalle") echo"selected"; ?>>Lasalle</option>

                                <option value="Plateau Mont-Royal" <?php if($rencontres->sippe_oui_clsc == "Plateau Mont-Royal") echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="Olivier-Guimond" <?php if($rencontres->sippe_oui_clsc == "Olivier-Guimond") echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="Des Faubourgs" <?php if($rencontres->sippe_oui_clsc == "Des Faubourgs") echo"selected"; ?>>Des Faubourgs</option>
                                <option value="Saint-Léonard" <?php if($rencontres->sippe_oui_clsc == "Saint-Léonard") echo"selected"; ?>>Saint-Léonard</option>

                                <option value="Côte-des-neiges" <?php if($rencontres->sippe_oui_clsc == "Côte-des-neiges") echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="Ville Saint-Laurent" <?php if($rencontres->sippe_oui_clsc == "Ville Saint-Laurent") echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="Pierrefonds" <?php if($rencontres->sippe_oui_clsc == "Pierrefonds") echo"selected"; ?>>Pierrefonds</option>
                                <option value="Stage de Edith Joseph Alizi" <?php if($rencontres->sippe_oui_clsc == "Stage de Edith Joseph Alizi") echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="Ahuntsic" <?php if($rencontres->sippe_oui_clsc == "Ahuntsic") echo"selected"; ?>>Ahuntsic</option>
                                <option value="Saint-Michel" <?php if($rencontres->sippe_oui_clsc == "Saint-Michel") echo"selected"; ?>>Saint-Michel</option>
                                <option value="Deuil - Bell Cause pour la Cause" <?php if($rencontres->sippe_oui_clsc == "Deuil - Bell Cause pour la Cause") echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="Deuil - Régulier" <?php if($rencontres->sippe_oui_clsc == "Deuil - Régulier") echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="IG - Régulier" <?php if($rencontres->sippe_oui_clsc == "IG - Régulier") echo"selected"; ?>>IG - Régulier</option>
                                <option value="du Parc" <?php if($rencontres->sippe_oui_clsc == "du Parc") echo"selected"; ?>>du Parc</option>
                                <option value="Saint-Louis-du-Parc" <?php if($rencontres->sippe_oui_clsc == "Saint-Louis-du-Parc") echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="sippe_non_clsc_id">SIPPE d'un autre CLSS </label>
                            <input name="sippe_non_clsc_id" type="checkbox" value="1" <?php if($rencontres->sippe_non_clsc_id == 1) echo "checked"; ?> />


                            <select id="" name="sippe_non_clsc" class="form-control">

                                <option value="" <?php if($rencontres->sippe_non_clsc == '') echo"selected"; ;?>>__</option>
                                <option value="Villeray" <?php if($rencontres->sippe_non_clsc == "Villeray") echo"selected"; ;?>>Villeray</option>
                                <option value="Petite-Patrie" <?php if($rencontres->sippe_non_clsc == "Petite-Patrie") echo"selected"; ?>>Petite-Patrie</option>
                                <option value="Rosemont" <?php if($rencontres->sippe_non_clsc == "Rosemont") echo"selected"; ?>>Rosemont</option>
                                <option value="Hochelega-Maisonneuve" <?php if($rencontres->sippe_non_clsc == "Hochelega-Maisonneuve") echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="Lasalle" <?php if($rencontres->sippe_non_clsc == "Lasalle") echo"selected"; ?>>Lasalle</option>

                                <option value="Plateau Mont-Royal" <?php if($rencontres->sippe_non_clsc == "Plateau Mont-Royal") echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="Olivier-Guimond" <?php if($rencontres->sippe_non_clsc == "Olivier-Guimond") echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="Des Faubourgs" <?php if($rencontres->sippe_non_clsc == "Des Faubourgs") echo"selected"; ?>>Des Faubourgs</option>
                                <option value="Saint-Léonard" <?php if($rencontres->sippe_non_clsc == "Saint-Léonard") echo"selected"; ?>>Saint-Léonard</option>

                                <option value="Côte-des-neiges" <?php if($rencontres->sippe_non_clsc == "Côte-des-neiges") echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="Ville Saint-Laurent" <?php if($rencontres->sippe_non_clsc == "Ville Saint-Laurent") echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="Pierrefonds" <?php if($rencontres->sippe_non_clsc == "Pierrefonds") echo"selected"; ?>>Pierrefonds</option>
                                <option value="Stage de Edith Joseph Alizi" <?php if($rencontres->sippe_non_clsc == "Stage de Edith Joseph Alizi") echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="Ahuntsic" <?php if($rencontres->sippe_non_clsc == "Ahuntsic") echo"selected"; ?>>Ahuntsic</option>
                                <option value="Saint-Michel" <?php if($rencontres->sippe_non_clsc == "Saint-Michel") echo"selected"; ?>>Saint-Michel</option>
                                <option value="Deuil - Bell Cause pour la Cause" <?php if($rencontres->sippe_non_clsc == "Deuil - Bell Cause pour la Cause") echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="Deuil - Régulier" <?php if($rencontres->sippe_non_clsc == "Deuil - Régulier") echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="IG - Régulier" <?php if($rencontres->sippe_non_clsc == "IG - Régulier") echo"selected"; ?>>IG - Régulier</option>
                                <option value="du Parc" <?php if($rencontres->sippe_non_clsc == "du Parc") echo"selected"; ?>>du Parc</option>
                                <option value="Saint-Louis-du-Parc" <?php if($rencontres->sippe_non_clsc == "Saint-Louis-du-Parc") echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                            <br>
                        </div>
                        <br>

                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_clsc">Autre CLSC ?</label>


                            <input type="text" name="autre_clsc" placeholder="Entrez autre CLSC" class="form-control" />
                        </div>



                        <div class="group-form">
                            <h4>Informations pour Alternative-Naissance</h4>
                            <label for="refere">Référée par un organisme : </label>

                            <input name="refere" type="checkbox" value="1" <?php if($rencontres->refere == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="refere_organisme">Si oui, lequel? </label>

                            <input name="refere_organisme"  class="form-control" type="text" value="{{$rencontres->refere_organisme }}" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="service_connu_id">Où avez-vous entendu parlé de AN ?  </label>

                            <input name="service_connu_old" class="form-control"  type="text" value="{{$rencontres->service_connu }}" disabled />
                            <input name="service_connu_old" class="form-control"  type="hidden" value="{{$rencontres->service_connu }}"  />
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


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_source">Autre source ?</label>


                            <input type="text" name="autre_source" placeholder="Entrez autre source" class="form-control" />
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
