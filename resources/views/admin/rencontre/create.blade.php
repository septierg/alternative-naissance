@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">
                {!! Form::open(['action' => 'App\Http\Controllers\RencontreController@store','method' => 'POST','files' =>true]) !!}

                @csrf
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Création de l'inscription</h4>
                        <div class="group-form">
                            <label for="date_demande">Date de demande : </label>
                            <input type="date" class="form-control" value=""  name="date_demande" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="annee_fiscale">Année fiscale: </label>
                            <select id="" name="annee_fiscale" class="form-control">

                                @foreach ($annee_fiscale as $value)
                                    <option value="{{ $value->id }}">{{ $value->annee }}</option>



                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <h4>Informations sur la clientele</h4>
                            <label for="nom">Inscrits: </label>
                            <input type="text" class="form-control" value=""  name="nom">
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="code_postal">Code postal: </label>
                            <input type="text" class="form-control" value=""  name="code_postal" required>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="arrondissement_habite_id">Arrondissement habité lors de l'acchouchement: </label>
                            <select id="" name="arrondissement_habite_id" class="form-control">

                                @foreach ($clsc as $value)
                                    <option value="{{ $value->id }}">{{ $value->nom }}</option>



                                @endforeach
                            </select>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="langue_parlee">Langues parlées: </label>
                            <input type="text" class="form-control" value=""  name="langue_parlee" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="statut_citoyen">Statut de citoyenneté : </label>
                            <select id="" name="statut_citoyen" class="form-control">

                                @foreach ($statut_citoyen as $value)
                                    <option value="{{ $value->id }}">{{ $value->nom }}</option>



                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_statut_citoyen">Autre statut citoyen   ?</label>


                            <input type="text" name="autre_statut_citoyen" placeholder="Entrez autre statut" class="form-control" />
                        </div>



                        <div class="group-form">
                            <label for="pays_origine">Pays d'origine : </label>
                            <input type="text" class="form-control"  name="pays_origine"  value="" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="date_arrivee">Date d'arrivée au Québec : </label>
                            <input type="date" class="form-control"  name="date_arrivee"  value="" required>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="ramq">RAMQ : </label>
                            <select name="ramq"  class="form-control">
                                <option value='à venir' >à venir</option>
                                <option value='oui' >oui</option>
                                <option value='non'>non</option>
                            </select>

                        </div>
                        <br>


                        <div class="group-form">
                            <label for="source_revenu_id">Source de revenu : </label>
                            <select id="" name="source_revenu_id" class="form-control">

                                @foreach ($source_revenu as $value)
                                    <option value="{{ $value->id }}">{{ $value->nom }}</option>



                                @endforeach

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
                            <textarea type="text" class="form-control" name="suivi_intervenants" ></textarea>
                        </div>
                        <br>


                        <p style="text-align:center ">Cercle familial / Social au Québec</p>



                        <div class="group-form" style="width:100%; padding-bottom:10px;">


                            @foreach ($cercle as $value)



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
                            <input type="text" class="form-control" value=""  name="conjoint_prenom" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conjoint_nom">Nom du Conjoint : </label>
                            <input type="text" class="form-control" value=""  name="conjoint_nom" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="conjoint_occupation">Occupation du Conjoint : </label>
                            <input type="text" class="form-control" value=""  name="conjoint_occupation" >
                        </div>
                        <br>
                        <div class="group-form">
                            <label for="courriel_conjoint">Email du Conjoint : </label>
                            <input type="text" class="form-control" value=""  name="courriel_conjoint" >
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="monoparentale">Monoparentale : </label>
                            <input type="checkbox" name="monoparentale"   value="" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="conjoint_absent_pays">Conjoint absent du pays : </label>
                            <input type="checkbox" name="conjoint_absent_pays"   value="" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conjoint_absent_accouchement">Conjoint absent lors de l'accouchement : </label>
                            <input type="checkbox" name="conjoint_absent_accouchement"   value="" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="nbr_grossesse">Nombre de grossesse incluant celle-ci : </label>
                            <input type="number" min="0" class="form-control" value=""  name="nbr_grossesse" required>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="nbr_enfants">Nombre d'enfants : </label>
                            <input type="number" min="0" class="form-control" value=""  name="nbr_enfants" required>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="age_respectif">Âge des enfants : </label>
                            <textarea type="text" class="form-control" name="age_respectif" ></textarea>
                        </div>
                        <br>

                        <hr>

                        <div class="group-form">
                            <h4>Administration</h4>
                            <label name="notes_generales" >Notes générales du dossier</label>
                            <textarea name="notes_generales" type="text" class="form-control">

                                </textarea>

                        </div>
                        <br>



                        <div class="group-form">
                            <label name="accepter_contact_an" >Acceptez-vous d'être contacté par un intervenant d'Alternative Naissance pour des informations d'activités de votre secteur?</label>



                            <select name="accepter_contact_an" class="form-control">
                                <option value='0' >---</option>
                                <option value='oui' >oui</option>
                                <option value='non' >non</option>
                            </select>

                        </div>
                        <br>

                        <div class="group-form">
                            <label name="accepter_contact_organisme">Acceptez-vous d'être contacté par un intervenant d'un autre organisme pour des informations d'activités de votre secteur?</label>
                            <select name="accepter_contact_organisme" class="form-control">
                                <option value='0' >---</option>
                                <option value='oui' >oui</option>
                                <option value='non' >non</option>
                            </select>
                        </div>
                        <br>

                        <div class="group-form">

                            <label name="accepter_statistiques">Acceptez-vous qu'Alternative Naissance compile certaines données relativement à votre suivi et à votre accouchement, de manière anonyme et confidentielle, pour des fins statistiques.  Ces données pourraient ensuite être utilisées pour évaluer les effets de notre pratique et avoir un portrait de certaines pratiques obstétricales et de leurs effets.</label>
                            <select name="accepter_statistiques" class="form-control">
                                <option value='0'>---</option>
                                <option value='oui' >oui</option>
                                <option value='non' >non</option>
                            </select>

                        </div>

                        <div class="group-form">

                            <label name="statut_dossier">Statut de ce dossier</label>
                            <select name="statut_dossier" class="form-control">
                                <option value=1 >Dossier complet</option>
                                <option value=2 >Dossier incomplet</option>
                                <option value=3 >Dossier problématique</option>
                                <option value=4 >Dossier terminé</option>
                                <option value=5 >Dossier annulé</option>
                            </select>

                        </div>






                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">

                        <h4>Informations sur la grossesse et l'accouchement</h4>

                        <div class="group-form">
                            <label for="dpa">Date prévue d'accouchement ou Date de naissance du bébé : </label>
                            <input type="date" class="form-control"  name="dpa"  value="" required>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="hopital">Hôpital : </label>
                            <input type="text" class="form-control"  name="hopital"  value="" required>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="type_accouchement">Type d'accouchement planifié / souhaité ou Type d'accouchement : </label>
                            <textarea type="text" class="form-control" name="type_accouchement" ></textarea>
                        </div>
                        <br>


                        <p style="text-align:center ">Personnes prévues à l'accouchement</p>


                        <div class="group-form" style="width:100%; padding-bottom:5px;">


                            @foreach ($accouchement_personnes_prevues as $value)




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
                            <input type="text" class="form-control" value=""  name="commentaire_presence" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="conditions_particulieres">Conditions particulières reliées à cette grossesse</label>

                            <textarea id="" name="conditions_particulieres" class="form-control">

                            </textarea>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="cours_prenatal">Cours prénataux : </label>
                            <input type="checkbox" name="cours_prenatal"   value="" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="notes_prenatal">Notes reliées aux cours prénataux : </label>
                            <textarea type="text" class="form-control" name="notes_prenatal"> </textarea>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="raisons_consultation">Raisons de cette consultation : </label>
                            <textarea type="text" class="form-control" name="raisons_consultation"> </textarea>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="suggestions_donnees">Suggestions données : </label>
                            <textarea type="text" class="form-control" name="suggestions_donnees"> </textarea>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="sujets_documentations">Sujets des documentations données : </label>
                            <textarea type="text" class="form-control" name="sujets_documentations"></textarea>
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="sujets_documentations">Durée la consultation : </label>
                            <select type="text" class="form-control">
                                <option value='15 minutes' >15 minutes</option>
                                <option value='30 minutes' >30 minutes</option>
                                <option value='45 minutes' >45 minutes</option>
                                <option value='60 minutes' >60 minutes</option>
                                <option value='75 minutes' >75 minutes</option>
                                <option value='90 minutes' >90 minutes</option>
                            </select>
                        </div>
                        <br>

                        <p style="text-align:center ">Références données</p>

                        <div class="group-form" style="width:100%; padding-bottom:5px;">


                            @foreach ($reference_donnee as $value)



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

                            <input name="pae" type="checkbox" value="1"  />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="pae_clsc_id">CLSS associé à ce PAE </label>

                            <select id="" name="pae_clsc_id" class="form-control">

                                @foreach ($clsc as $value)
                                    <option value="{{ $value->id }}">{{ $value->nom }}</option>



                                @endforeach


                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="sippe">Programme SIPPE : </label>
                            <input name="sippe" type="checkbox" value="1" />
                            <br>
                        </div>
                        <br>


                        <div class="group-form">
                            <label>Si OUI à SIPPE, CLSC associé</label>
                            <select id="" name="sippe_oui_clsc" class="form-control">

                                @foreach ($clsc as $value)
                                    <option value="{{ $value->nom }}">{{ $value->nom }}</option>



                                @endforeach


                            </select>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="sippe_non_clsc_id">SIPPE d'un autre CLSS </label>
                            <input name="sippe_non_clsc_id" type="checkbox" value="1"  />


                            <select id="" name="sippe_non_clsc" class="form-control">

                                @foreach ($clsc as $value)
                                    <option value="{{ $value->nom }}">{{ $value->nom }}</option>



                                @endforeach


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

                            <input name="refere" type="checkbox" value="1" />
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="refere_organisme">Si oui, lequel? </label>

                            <input name="refere_organisme"  class="form-control" type="text" value="" />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="service_connu_id">Où avez-vous entendu parlé de AN ?  </label>

                            <input name="service_connu_old" class="form-control"  type="text" value="" disabled />
                            <input name="service_connu_old" class="form-control"  type="hidden" value=""  />
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="service_connu_id">Choisir une autre source (BD) </label>

                            <select id="" name="service_connu" class="form-control">

                                @foreach ($source_diffusion as $value)
                                    <option {{ $value->nom }}>{{ $value->nom }}</option>



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
