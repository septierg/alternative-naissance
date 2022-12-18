@extends('layouts.admin')

@section('content')

    <style>
        .hide {
            display:none;
        }

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Créer des requetes</h2>
                <br>


                {!! Form::open(['action' => 'App\Http\Controllers\RequettesController@store','method' => 'POST','files' =>true]) !!}

                <label for="cars">Table:</label>

                <div class="group-form">

                    <select name="table" onchange="getTable()" id="table" class="form-control">
                        <option value="">---</option>
                        <option value="inscrits">Inscrits</option>
                        <option value="accompagnements">Accompagnements à la naissance</option>
                        <option value="relevailles">Accompagnements aux relevailles</option>
                        <option value="dons">Dons</option>
                    </select>

                </div>
                <br>

                <div class="group-form hide" id="hide_annee_fiscale">
                    <label for="annee_fiscale_id">Année fiscale </label>

                    <select id="" name="annee_fiscale_id" class="form-control">
                        <option value=0>non applicable</option>
                    @if($annee_fiscale)
                        @foreach ($annee_fiscale as $value)
                            <option value="{{ $value->id }}">{{ $value->annee }}</option>

                        @endforeach
                        @endif

                    </select>
                    <br>

                    <label>Statut de dossier</label>

                    <select name="statut_dossier" class="form-control">
                        <option value="0">non applicable</option>
                        <!--<option value=1>Tout les statuts</option>-->
                        <option value="1" selected="selected">Tout les statuts sauf "annulé"</option>
                    </select>
                    <br>


                    <label>Programme SIPPE</label>
                    <select name="sippe" class="form-control">

                        <option value=0>non applicable</option>
                        <option value=1000>Ne fait pas parti du SIPPE</option>
                        @if($clsc)
                            @foreach ($clsc as $value)
                                <option>{{ $value->nom }}</option>

                    @endforeach
                    @endif
                    </select>
                    <br>

                    <label>PAE</label>


                    <select name="pae" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1000>Ne fait pas parti du PAE</option>
                        @if($clsc)
                            @foreach ($clsc as $value)
                                <option>{{ $value->nom }}</option>

                            @endforeach
                        @endif
                    </select>

                    <br>

                 <strong>Date de demande</strong><br />
                    <label>date début (inclusive)</label>
                    <input  class="form-control" name="date_demande_debut" type="date" />
                    <div class="clear"></div>
                    <label> date fin (inclusive)</label>
                    <input class="form-control" name="date_demande_fin" type="date"  />
                    <div class="clear"></div><br />

                    <label>Monoparentale ?</label>
                    <select name="monoparentale" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>CooPère Rosemont ?</label>
                    <select name="coopere" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Porte-bébé donné ?</label>
                    <select name="portebebe" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Formation massage bébé donnée ?</label>
                    <select name="massage" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Sollicité pour don / évaluation ?</label>
                    <select name="sollicite" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>A déjà fait un don ?</label>
                    <select name="don" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Pièce électronique d'évaluation remise ?</label>
                    <select name="bilanevaluation" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Accompagnante impliquée</label>
                    <select name="accompagnante_id" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=9999>Aucune accompagnante dans le dossier</option>
                        @if($accompagnante)
                            @foreach ($accompagnante as $value)
                                <option>{{ $value->prenom ." ". $value->prenom}}</option>

                            @endforeach
                        @endif
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Dossier de demande de marrainage</label>
                    <select name="demande_marrainage" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />

                    <label>Marrainage en dyade</label>
                    <select name="dyade" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=1>oui</option>
                        <option value=2>non</option>
                    </select>
                    <div style="clear:both"></div><br />


                    <!-- accompagnement naissance seulement -->
                    <div class="group-form hide" id="hide_accompagnement">
                        <br /><strong>Date prévue d'accouchement (DPA)</strong><br />
                        <label>date début (inclusive)</label>
                        <input class="form-control" name="dpa_debut" type="date" />
                        <div class="clear"></div>
                        <label> date fin (inclusive)</label>
                        <input class="form-control" name="dpa_fin" type="date"  />
                        <div class="clear"></div><br />

                        <label>Type de soignant</label>
                        <select name="type_soignant" class="form-control">
                            <option value="non applicable">non applicable</option>
                            @if($soignant)
                                @foreach ($soignant as $value)
                                    <option>{{  $value->nom }}</option>

                                @endforeach
                            @endif
                        </select>
                        <div class="clear"></div>

                        <label>Fiche relève remise</label>
                        <select name="fiche" class="form-control">
                            <option value=0>non applicable</option>
                            <option value=1>oui</option>
                            <option value=2>non</option>
                        </select>
                        <div style="clear:both"></div><br />

                        <label>Accompagnante 1 dossier bilan remis</label>
                        <select name="bilan" class="form-control">
                            <option value=0>non applicable</option>
                            <option value=1>oui</option>
                            <option value=2>non</option>
                        </select>
                        <div style="clear:both"></div><br />

                        <label>Accompagnante 2 dossier bilan remis</label>
                        <select name="bilan2" class="form-control">
                            <option value=0>non applicable</option>
                            <option value=1>oui</option>
                            <option value=2>non</option>
                        </select>
                        <div style="clear:both"></div><br />

                        <label>Dossier de demande de stage</label>
                        <select name="demande_stage" class="form-control">
                            <option value=0>non applicable</option>
                            <option value=1>oui</option>
                            <option value=2>non</option>
                        </select>
                        <div style="clear:both"></div><br />

                        <label>Stage a été payé</label>
                        <select name="stage" class="form-control">
                            <option value=0>non applicable</option>
                            <option value=1>oui</option>
                            <option value=2>non</option>
                        </select>
                        <div style="clear:both"></div><br />

                        <label>Accompagnement avec stagiaire</label>
                        <select name="stage2" class="form-control">
                            <option value=0>non applicable</option>
                            <option value=1>oui</option>
                            <option value=2>non</option>
                        </select>
                        <div style="clear:both"></div><br />

                    </div>


            </div>
                <div class="hide" id="hide_dons">
                    <br /><label>Année fiscale</label>
                    <select name="annee_fiscale_id_don" class="form-control">
                        <option value=0>non applicable</option>
                        @if($annee_fiscale)
                            @foreach ($annee_fiscale as $value)
                                <option>{{ $value->annee }}</option>

                            @endforeach
                        @endif

                    </select>
                    <div class="clear"></div><br />
                    <strong>OU</strong><br />
                    <br /><label>Année complète</label>

                    <select name="annee_complete_don" class="form-control">
                        <option value=0>non applicable</option>
                        <option value=2010>2010</option>
                        <option value=2011>2011</option>
                        <option value=2012>2012</option>
                        <option value=2013>2013</option>
                        <option value=2014>2014</option>
                        <option value=2015>2015</option>
                        <option value=2016>2016</option>
                        <option value=2017>2017</option>
                        <option value=2018>2018</option>
                        <option value=2019>2019</option>
                        <option value=2020>2020</option>
                        <option value=2021>2021</option>
                        <option value=2022>2022</option>
                        <option value=2023>2023</option>
                        <option value=2024>2024</option>
                        <option value=2025>2025</option>

                    </select>

                    <div class="clear"></div>
                </div>




                <!-- accompagnement relevailles seulement -->
                <div class="group-form hide" id="hide_relevailles">
                    <br /><strong>Date de naissance de l'enfant</strong><br />
                    <label>date début (inclusive)</label>
                    <input class="form-control" name="dob_debut" type="date" />
                    <div class="clear"></div>
                    <label>date fin (inclusive)</label>
                    <input class="form-control" name="dob_fin" type="date"  />
                    <div class="clear"></div><br />
                </div>
                <br>


                <div class="group-form hide" id="hide_membre">
                    <label for="cars">Statut de membre :</label>

                    <select name="statut_membre" id="statut_membre" class="form-control">
                        <option value="">non applicable</option>
                        <option value="Actif">Actif</option>
                        <option value="Aspirant">Aspirant</option>
                        <option value="Honoraire">Honoraire</option>
                        <option value="Sans services">Sans services</option>
                        <option value="Soutien">Soutien</option>
                        <option value="Utilisateur">Utilisateur</option>
                    </select>

                </div>
                <br>


                <label for="cars">Ordonner par :</label>

                <div class="group-form">

                    <select name="order" id="order" class="form-control">
                        <option value="non_applicable">non applicable</option>
                        <option value="prenom_nom">Prénom Nom</option>
                        <option value="dpa_croissant">DPA croissant</option>
                    </select>

                </div>
                <br>

                <label>Sauvegarder cette requête</label>
                <input name="sauvegarder" type="checkbox" value="1" style="height:36px;width:50px;"><br><br>

                <label>Description de la requête</label>
                <input name="nom" type="text" class="form-control" style=""><br><br>

                {!! Form::submit('Sauvegarder',['class'=> 'btn btn-info']) !!}
                <button type="submit" class="btn btn-dark waves-effect waves-light">Annuler</button>
                {!! Form::close() !!}


            </div>
        </div>
    </div>


    <script>
        function getTable(){
                if(document.getElementById('table').value === "inscrits"){
                    console.log(document.getElementById('table').value);


                    //show
                    document.getElementById("hide_membre").style.display = "block";
                    //hide other section
                    document.getElementById("hide_annee_fiscale").style.display = "none";
                    document.getElementById("hide_relevaille").style.display = "none";
                    document.getElementById("hide_dons").style.display = "none";


                }
                if(document.getElementById('table').value === "accompagnements"){
                    console.log(document.getElementById('table').value);

                    //show
                    document.getElementById("hide_annee_fiscale").style.display = "block";
                    document.getElementById("hide_accompagnement").style.display = "block";


                    //hide
                    document.getElementById("hide_membre").style.display = "none";
                    document.getElementById("hide_relevailles").style.display = "none";
                    document.getElementById("hide_dons").style.display = "none";


                }
                if(document.getElementById('table').value === "dons"){
                    console.log(document.getElementById('table').value);


                    //show
                    document.getElementById("hide_dons").style.display = "block";

                    //hide
                    document.getElementById("hide_membre").style.display = "none";
                    document.getElementById("hide_relevailles").style.display = "none";
                    document.getElementById("hide_annee_fiscale").style.display = "none";

                }
                if(document.getElementById('table').value === "relevailles"){
                    console.log(document.getElementById('table').value);

                    //show
                    document.getElementById("hide_annee_fiscale").style.display = "block";
                    document.getElementById("hide_relevailles").style.display = "block";

                    //hide
                    document.getElementById("hide_membre").style.display = "none";
                    document.getElementById("hide_accompagnement").style.display = "none";
                    document.getElementById("hide_dons").style.display = "none";


            }


        }


    </script>
@endsection
