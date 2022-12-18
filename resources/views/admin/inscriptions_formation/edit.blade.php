@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                @if($inscriptions_formations)
                    @foreach($inscriptions_formations as $i)

                            {{ Form::model($inscriptions_formations, ['route' => ['inscriptions_formations.update', $i->id], 'method' => 'patch']) }}

                @csrf
                <div class="row">
                    <div class="col-6 col-md-6">
                        <h4>Modification de l'inscription</h4>
                        <div class="group-form">
                            <label for="membre">Membre : </label>
                            <input type="text" class="form-control" value="{{ $i->prenom." ". $i->nom}}"  name="nom" disabled>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="nom">Email: </label>
                            <input type="email" class="form-control" value="{{ $i->courriel}}"  name="courriel" disabled>
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="date_inscription">Date de l'inscription : </label>
                            <input type="date" class="form-control" value="{{ $i->date_inscription}}"  name="date_inscription" disabled>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="prix_formation">Prix de la formation : </label>
                            <input type="text" class="form-control"  name="prix_formation"  value="0" >
                        </div>
                        <br>



                        <hr>
                        <p style="text-align:center ">Programme (gratuité)</p>

                        <div class="group-form">

                            <label for="beneficie_sippe">Beneficie du SIPPE</label>

                            <input name="beneficie_sippe" type="checkbox" value="1" <?php if($i->beneficie_sippe == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">

                            <label for="beneficie_pae">Beneficie du PAE</label>

                            <input name="beneficie_pae" type="checkbox" value="1" <?php if($i->beneficie_pae == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">

                            <label for="formation_gratuite">Beneficie du SIPPE</label>

                            <input name="formation_gratuite" type="checkbox" value="1" <?php if($i->formation_gratuite == 1) echo "checked"; ?> />
                        </div>
                        <br>




                        <hr>
                        <p style="text-align:center ">Paiement complet</p>

                        <div class="group-form">
                            <label for="paiement_complet">Montant complet : </label>
                            <input type="text" class="form-control" value="{{ $i->paiement_complet}}"  name="paiement_complet" >$
                        </div>
                        <br>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="type_paiement_complet">Mode de paiement</label>


                            <select name="type_paiement_complet" class="form-control">
                                <option value="aucun" selected="">---</option>
                                <option value="chèque" <?php if($i->type_paiement_depot == 'chèque') echo "selected"; ?>>Chèque</option>
                                <option value="chèque" <?php if($i->type_paiement_depot == 'comptant') echo "selected"; ?>>Comptant</option>
                                <option value="paypal" <?php if($i->type_paiement_depot == 'paypal') echo "selected"; ?>>Paypal</option>
                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="date_paiement_complet">Date du paiement : </label>
                            <input type="date" class="form-control" value="{{ $i->date_paiement_complet}}"  name="date_paiement_complet" >
                        </div>
                        <br>



                        <p style="text-align:center ">Dépot</p>

                        <div class="group-form">
                            <label for="date_balance">Dépot : </label>
                            <input type="text" class="form-control" value="{{ $i->balance}}"  name="balance" >$
                        </div>
                        <br>

                        <div class="group-form">
                            <label for="date_depot">Date du paiement : </label>
                            <input type="date" class="form-control" value="{{ $i->date_depot}}"  name="date_depot" >
                        </div>
                        <br>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="type_paiement_depot">Mode de paiement</label>


                            <select name="type_paiement_depot" class="form-control">
                                <option value="aucun" selected="">---</option>
                                <option value="chèque" <?php if($i->type_paiement_depot == 'chèque') echo "selected"; ?>>Chèque</option>
                                <option value="chèque" <?php if($i->type_paiement_depot == 'comptant') echo "selected"; ?>>Comptant</option>
                                <option value="paypal" <?php if($i->type_paiement_depot == 'paypal') echo "selected"; ?>>Paypal</option>
                            </select>
                        </div>
                        <br>



                        <hr>


                        <p style="text-align:center ">Solde à payer</p>

                        <div class="group-form">
                            <label for="date_balance">Solde : </label>
                            <input type="text" class="form-control" value="{{ $i->balance}}"  name="balance" >$
                        </div>
                        <br>


                        <br>

                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="type_paiement_balance">Mode de paiement</label>


                            <select name="type_paiement_balance" class="form-control">
                                <option value="aucun" selected="">---</option>
                                <option value="chèque" <?php if($i->type_paiement_balance == 'chèque') echo "selected"; ?>>Chèque</option>
                                <option value="chèque" <?php if($i->type_paiement_balance == 'comptant') echo "selected"; ?>>Comptant</option>
                                <option value="paypal" <?php if($i->type_paiement_balance == 'paypal') echo "selected"; ?>>Paypal</option>
                            </select>
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="date_balance">Date du paiement : </label>
                            <input type="date" class="form-control" value="{{ $i->date_balance}}"  name="date_balance" >
                        </div>
                        <br>



                        <p style="text-align:center ">Conditions expliquées</p>


                        <div class="group-form">

                            <label for="depot_non_remboursable">Cliente avisée du dépôt non-remboursable</label>

                            <input name="depot_non_remboursable" type="checkbox" value="1" <?php if($i->depot_non_remboursable == 1) echo "checked"; ?> />
                        </div>
                        <br>

                        <div class="group-form">

                            <label for="non_remboursable_24h"> Cliente avisée du non-remboursable après 24h</label>

                            <input name="non_remboursable_24h" type="checkbox" value="1" <?php if($i->non_remboursable_24h == 1) echo "checked"; ?> />
                        </div>
                        <br>




                    </div>

                    <!--SAME ROW OTHER SECTION -->
                    <div class="col-6 col-md-6">



                        <p style="text-align:center ">Vous etes inscrite à une formation d'accompagnante ?</p>

                        <div class="group-form">

                            <label name="formation_allaitement">Formation en allaitement</label>
                            <select name="formation_allaitement" class="form-control">
                                <option value="aucun" selected="">---</option>
                                <option value="à faire" <?php if($i->formation_allaitement == 'à faire') echo "selected"; ?>>à faire</option>
                                <option value="non requise" <?php if($i->formation_allaitement == 'non requise') echo "selected"; ?>>non requise</option>
                                <option value="complétée" <?php if($i->formation_allaitement == 'complétée') echo "selected"; ?>>complétée</option>
                            </select>


                        </div>



                        <div class="group-form" style="margin-top: 58px;">
                            <label for="si_non_pourquoi">Si non requise, pourquoi ? </label>
                            <textarea type="text" class="form-control" name="si_non_pourquoi"> {{ $i->si_non_pourquoi }}</textarea>
                        </div>
                        <br>



                        <hr>

                        <p style="text-align:center ">Vous etes inscrite à une formation en allaitement ?</p>

                        <div class="group-form">

                            <label for="formation_accompagnante_completee"> Formation d'accompagnante à la naissance complétée</label>

                            <input name="formation_accompagnante_completee" type="checkbox" value="1" <?php if($i->formation_accompagnante_completee == 1) echo "checked"; ?> />
                        </div>
                        <br>




                        <div class="group-form">
                            <label for="si_oui_lieu_id">Indiquez le lieu</label>

                            <select name="si_oui_lieu_id" class="form-control">
                                <option value='0' <?php if($i->si_oui_lieu_id == '0') echo "selected"; ?>>0</option>
                                <option value='1' <?php if($i->si_oui_lieu_id == '1') echo "selected"; ?>>Alternative Naissance</option>

                            </select>

                        </div>
                        <br>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_lieu1">Ajout auto dans la db  ?</label>


                            <input type="text" name="autre_lieu1" placeholder="Entrez autre lieu" class="form-control" />
                        </div>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="si_non_profession">Indiques la profession   </label>

                            <input type="text"  value="{{ $i->si_non_profession}}" style='' class="form-control">&nbsp;&nbsp;

                        </div>



                        <div class="group-form">

                            <label for="inscrite_formation_accompagnante"> Inscrite à la formation d'accompagnante à la naissance ?</label>

                            <input name="inscrite_formation_accompagnante" type="checkbox" value="1" <?php if($i->inscrite_formation_accompagnante == 1) echo "checked"; ?> />
                        </div>
                        <br>



                        <div class="group-form">

                            <label for="formation_relevaille_completee"> Formation d'accompagnante aux relevailles complétée</label>

                            <input name="formation_relevaille_completee" type="checkbox" value="1" <?php if($i->formation_relevaille_completee == 1) echo "checked"; ?> />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="si_oui_lieu_id2">Indiquez le lieu</label>

                            <select name="si_oui_lieu_id2" class="form-control">
                                <option value='0' <?php if($i->si_oui_lieu_id2 == '0') echo "selected"; ?>>0</option>
                                <option value='1' <?php if($i->si_oui_lieu_id2 == '1') echo "selected"; ?>>Alternative Naissance</option>

                            </select>

                        </div>
                        <br>


                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="autre_lieu2">Ajout auto dans la db  ?</label>


                            <input type="text" name="autre_lieu2" placeholder="Entrez autre lieu" class="form-control" />
                        </div>

                        <div class="group-form">

                            <label for="inscrite_relevailles"> Inscrite à la formation aux relevailles ?</label>

                            <input name="inscrite_relevailles" type="checkbox" value="1" <?php if($i->inscrite_relevailles == 1) echo "checked"; ?> />
                        </div>
                        <br>





                        <hr>




                        <p style="text-align:center ">Rencontre d'information prénatales</p>

                        <div class="group-form">
                            <label for="dpa">Date prevu de l'accouchement (DPA) : </label>
                            <input type="date" class="form-control" value="{{ $i->dpa }}"  name="dpa" >
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="nombre_adultes_prenat">Nombre d'adultes présents</label>

                            <select name="nombre_adultes_prenat" class="form-control">
                                <option value='0' <?php if($i->nombre_adultes_prenat == 0) echo "selected"; ?> >0</option>
                                <option value='1' <?php if($i->nombre_adultes_prenat == 1) echo "selected"; ?>>1</option>
                                <option value='2' <?php if($i->nombre_adultes_prenat == 2) echo "selected"; ?>>2</option>
                                <option value='3' <?php if($i->nombre_adultes_prenat == 3) echo "selected"; ?>>3</option>
                                <option value='4' <?php if($i->nombre_adultes_prenat == 4) echo "selected"; ?>>4</option>
                            </select>

                        </div>
                        <br>

                        <p style="text-align:center ">Si oui, à quels sujets?</p>



                        <hr>

                        <p style="text-align:center ">Massage pour bébés</p>

                        <div class="group-form" style="width:100%; padding-bottom:10px;">

                            <label for="nom_enfant">Nom de l'enfant   </label>

                            <input type="text"  value="{{ $i->nom_enfant}}" style='' class="form-control">&nbsp;&nbsp;

                        </div>



                        <div class="group-form">
                            <label for="date_demande">Date de demande : </label>
                            <input type="date" class="form-control" value="{{ $i->date_naissance}}"  name="date_naissance" >
                        </div>
                        <br>



                        <div class="group-form">
                            <label for="nbr_enfants">Nombre d'adultes présents : </label>
                            <input type="number" min="0" class="form-control" value="{{ $i->nombre_adultes_massage }}"  name="nombre_adultes_massage" >
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="sippe">Programme SIPPE : </label>
                            <input name="sippe" type="checkbox" value="1" <?php if($i->sippe == 1) echo "checked"; ?> />
                            <br>
                        </div>
                        <br>


                        <div class="group-form">
                            <h4>Informations sur les programmes de nos partenaires</h4>
                            <label for="pae">Programme Avenir Enfants (PAE) : </label>

                            <input name="pae" type="checkbox" value="1" <?php if($i->pae == 1) echo "checked"; ?> />
                        </div>
                        <br>


                        <div class="group-form">
                            <label for="pae_clsc_id">CLSS associé à ce PAE </label>

                            <select id="" name="pae_clsc_id" class="form-control">
                                <option value="0" <?php if($i->pae_clsc_id == 0) echo"selected"; ;?>>__</option>
                                <option value="1" <?php if($i->pae_clsc_id == 1) echo"selected"; ;?>>Villeray</option>
                                <option value="2" <?php if($i->pae_clsc_id == 2) echo"selected"; ?>>Petite-Patrie</option>
                                <option value="3" <?php if($i->pae_clsc_id == 3) echo"selected"; ?>>Rosemont</option>
                                <option value="4" <?php if($i->pae_clsc_id == 4) echo"selected"; ?>>Hochelega-Maisonneuve</option>
                                <option value="5" <?php if($i->pae_clsc_id == 5) echo"selected"; ?>>Lasalle</option>

                                <option value="6" <?php if($i->pae_clsc_id == 6) echo"selected"; ?>>Plateau Mont-Royal</option>
                                <option value="7" <?php if($i->pae_clsc_id == 7) echo"selected"; ?>>Olivier-Guimond</option>
                                <option value="8" <?php if($i->pae_clsc_id == 8) echo"selected"; ?>>Des Faubourgs</option>
                                <option value="9" <?php if($i->pae_clsc_id == 9) echo"selected"; ?>>Saint-Léonard</option>

                                <option value="10" <?php if($i->pae_clsc_id == 10) echo"selected"; ?>>Côte-des-neiges</option>
                                <option value="11" <?php if($i->pae_clsc_id == 11) echo"selected"; ?>>Ville Saint-Laurent</option>
                                <option value="13" <?php if($i->pae_clsc_id == 13) echo"selected"; ?>>Pierrefonds</option>
                                <option value="15" <?php if($i->pae_clsc_id == 15) echo"selected"; ?>>Stage de Edith Joseph Alizi</option>

                                <option value="16" <?php if($i->pae_clsc_id == 16) echo"selected"; ?>>Ahuntsic</option>
                                <option value="17" <?php if($i->pae_clsc_id == 17) echo"selected"; ?>>Saint-Michel</option>
                                <option value="18" <?php if($i->pae_clsc_id == 18) echo"selected"; ?>>Deuil - Bell Cause pour la Cause</option>
                                <option value="19" <?php if($i->pae_clsc_id == 19) echo"selected"; ?>>Deuil - Régulier</option>

                                <option value="20" <?php if($i->pae_clsc_id == 20) echo"selected"; ?>>IG - Régulier</option>
                                <option value="21" <?php if($i->pae_clsc_id == 21) echo"selected"; ?>>du Parc</option>
                                <option value="22" <?php if($i->pae_clsc_id == 22) echo"selected"; ?>>Saint-Louis-du-Parc</option>
                            </select>
                        </div>
                        <br>



                        <hr>
                        <p style="text-align:center ">Admin</p>

                        <div class="group-form">
                            <label name="notes_accompagnement" >Admin</label>
                            <textarea name="notes_accompagnement" type="text" class="form-control">
                                    {{$i->notes }}
                                </textarea>
                            @endforeach
                            @endif
                        </div>
                        <br>

                        <hr>





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
