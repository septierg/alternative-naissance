<?php

namespace App\Http\Controllers;

use App\Models\Accompagnante;
use App\Models\AnneeFiscale;
use App\Models\Clsc;
use App\Models\Requetes;
use App\Models\Soignants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requetes= Requetes::all()->sortDesc();

        return view("admin.requetes.index", compact("requetes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $annee_fiscale = AnneeFiscale::all();
        $clsc = Clsc::orderBy('nom')->get();
        $accompagnante = Accompagnante::orderBy('prenom')->get();
        $soignant = Soignants::orderBy('nom')->get();
        //dd($accompagnante);

        return view('admin.requetes.create',compact('annee_fiscale','clsc','accompagnante','soignant'));
    }

    //create query to add to requetes table
    public function create_query_dynamically(\Illuminate\Http\Request $request)
    {
        $input=$request->all();

        dd($input);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input=$request->all();
        $nouvelle_requete = "";

        //dd($input);
        $table= "";
        $annee_fiscale_id = "";
  $statut_dossier= "";
  $sippe = "";
  $pae = "";
  $date_demande_debut = "";
  $date_demande_fin = "";
  $monoparentale = "";
  $coopere = "";
  $portebebe = "";
  $massage= "";
  $sollicite = "";
  $don = "";
  $bilanevaluation = "";
  $accompagnante_id = "";
  $demande_marrainage = "";
  $dyade = "";
  $dpa_debut = "";
  $dpa_fin = "";
  $type_soignant = "";
  $fiche = "";
  $bilan = "";
  $bilan2 = "";
  $demande_stage = "";
  $stage = "";
  $stage2 = "";
  $annee_fiscale_id_don = "";
  $annee_complete_don = "";
  $dob_debut = "";
  $dob_fin = "";
  $statut_membre = "";
        $order = "";
        $nom=  "";
        $sauvegarder = 0;
              if($input['order'] = "non_applicable"){
                  $order = $input['order'];
              }
              if($input['order'] = "prenom_nom"){
                $order = "ORDER BY membres.prenom, membres.nom";
              } if($input['order'] = "dpa_croissant"){
                $order = "ORDER BY membres.prenom, membres.nom";
              }


              $table= $input['table'];
            $pae = $input['pae'];
            $sippe = $input['sippe'];
            $annee_fiscale_id = $input['annee_fiscale_id'];
            $date_demande_debut = $input['date_demande_debut'];
            $date_demande_fin = $input['date_demande_fin'];
            $monoparentale = $input['monoparentale'];
            $coopere = $input['coopere'];
            $dpa_debut = $input['dpa_debut'];
            $dpa_fin = $input['dpa_fin'];
            $dob_debut = $input['dob_debut'];
            $dob_fin = $input['dob_fin'];
            $type_soignant = $input['type_soignant'];
            $portebebe = $input['portebebe'];
            $massage = $input['massage'];
            $sollicite = $input['sollicite'];
            $don = $input['don'];
            $bilanevaluation = $input['bilanevaluation'];
            $accompagnante_id = $input['accompagnante_id'];
            $fiche = $input['fiche'];
            $stage = $input['stage'];
            $bilan = $input['bilan'];
            $bilan2 = $input['bilan2'];
            $stage2 = $input['stage2'];
            $demande_stage = $input['demande_stage'];
            $demande_marrainage = $input['demande_marrainage'];
            $dyade = $input['dyade'];
            $statut_dossier = $input['statut_dossier'];



        if($table == "inscrits" || $table == "dons")
        {
            $pae = 0;
            $sippe = 0;
            $annee_fiscale_id = 0;
            $date_demande_debut = 0;
            $date_demande_fin = 0;
            $monoparentale = 0;
            $coopere = 0;
            $dpa_debut = 0;
            $dpa_fin = 0;
            $dob_debut = 0;
            $dob_fin = 0;
            $type_soignant = 0;
            $portebebe = 0;
            $massage = 0;
            $sollicite = 0;
            $don = 0;
            $bilanevaluation = 0;
            $accompagnante_id = 0;
            $fiche = 0;
            $stage = 0;
            $bilan = 0;
            $bilan2 = 0;
            $stage2 = 0;
            $demande_stage = 0;
            $demande_marrainage = 0;
            $dyade = 0;
            $statut_dossier = 0;
        }
        if($table == "inscrits")
        {
            $annee_fiscale_id_don = 0;
            $annee_complete_don = 0;
        }
        if($table == "dons")
        {
            $statut_membre = 0;
        }

        if($table == "relevailles")
        {
            $dpa_debut = 0;
            $dpa_fin = 0;
            $type_soignant = 0;
            $fiche = 0;
            $stage = 0;
            $bilan = 0;
            $bilan2 = 0;
            $stage2 = 0;
            $demande_stage = 0;
            $demande_marrainage = 0;
            $dyade = 0;
            $annee_fiscale_id_don = 0;
            $annee_complete_don = 0;
            $statut_membre = 0;
        }
        if($table == "accompagnements")
        {
            $dob_debut = 0;
            $dob_fin = 0;
            $annee_fiscale_id_don = 0;
            $annee_complete_don = 0;
            $statut_membre = 0;
        }

        //integration
        $requete_query = "SELECT * FROM ";
        $requete_affichee = "<strong>PARAMÈTRES DE LA REQUÊTE</strong><br />";

        if($table != "")
        {
            $requete_affichee .= "Table : $table<br />";
            if($table != "inscrits")
            {
                $new_table = "inscrits,".$table;
                //$requete_query .= "$new_table WHERE $table.uid=inscrits.uid";
                $requete_query .= "$new_table WHERE inscrits.uid=$table.uid";
            }
            else
            {
                $new_table = $table;
                //$new_table = "inscrits,statut_membres";
                $requete_query .= "$new_table WHERE 1";
            }
        }
        if($statut_membre != "" )
        {
            $requete_query .= " AND $table.statut_membre=\"$statut_membre\"";
            //$result1 = mysql_query("SELECT `nom` FROM `statut_membres` WHERE `id`=$statut_membre", $link);
            // $myrow1 = mysql_fetch_assoc($result1);
            // $statut_membre = $myrow1['nom'];
            $requete_affichee .= "Statut du membre : $statut_membre<br />";
        }
        if($annee_fiscale_id != 0 )
        {
            $requete_query .= " AND $table.annee_fiscale_id=$annee_fiscale_id";
            $result1 =  DB::select( DB::raw("SELECT `annee` FROM `annee_fiscale` WHERE `id`=$annee_fiscale_id") );

            $myrow1 =$result1[0];
            $annee_fiscale = $myrow1->annee;
            $requete_affichee .= "Année fiscale : $annee_fiscale<br />";

        }
        if($annee_fiscale_id_don != 0)
        {
            $requete_query .= " AND $table.annee_fiscale_id=$annee_fiscale_id_don";
            $result1 = DB::select( DB::raw("SELECT `annee` FROM `annee_fiscale` WHERE `id`=$annee_fiscale_id") );
            $myrow1 =$result1[0];
            $annee_fiscale = $myrow1->annee;
            $requete_affichee .= "Année fiscale : $annee_fiscale<br />";
        }
        if($annee_complete_don != 0)
        {
            $requete_query .= " AND $table.don_date LIKE \"%{$annee_complete_don}%\"";
            $requete_affichee .= "Année complète : $annee_complete_don<br />";
        }
        if($pae != 0)
        {
            if($pae == 1000)
            {
                $requete_query .= " AND $table.pae_clsc_id=0";
                $requete_affichee .= "PAE : Ne fait pas parti du SIPPE<br />";
            }
            else
            {
                $requete_query .= " AND $table.pae_clsc_id=$pae";
                $result1 = DB::select( DB::raw("SELECT `nom` FROM `clsc` WHERE `id`=$pae") );
                $myrow1 =$result1[0];
                $nom_clsc = $myrow1->nom;
                $nom_clsc = stripslashes($nom_clsc);
                $requete_affichee .= "PAE : $nom_clsc<br />";
            }
        }
        if($sippe != 0)
        {
            if($sippe == 1000)
            {
                $requete_query .= " AND $table.sippe_oui_clsc_id=0";
                $requete_affichee .= "SIPPE : Ne fait pas parti du SIPPE<br />";
            }
            else
            {
                $requete_query .= " AND $table.sippe_oui_clsc_id=$sippe";
                $result1 = DB::select( DB::raw("SELECT `nom` FROM `clsc` WHERE `id`=$sippe") );
                $myrow1 =$result1[0];
                $nom_clsc2 = $myrow1->nom;
                $nom_clsc2 = stripslashes($nom_clsc2);
                $requete_affichee .= "SIPPE : $nom_clsc2<br />";
            }
        }
        if($date_demande_debut != 0 && $date_demande_fin != 0)
        {
            $requete_query .= " AND $table.date_demande>=\"$date_demande_debut\" && $table.date_demande<=\"$date_demande_fin\"";
            $requete_affichee .= "Date de demande entre le $date_demande_debut et le $date_demande_fin<br />";
        }

        if($monoparentale != 0)
        {
            if($monoparentale == 1)
            {
                $requete_query .= " AND $table.monoparentale=1";
                $monoparentale_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.monoparentale=0";
                $monoparentale_statut = "non";
            }
            $requete_affichee .= "Monoparentale :  $monoparentale_statut<br />";
        }

        if($coopere != 0)
        {
            if($coopere == 1)
            {
                $requete_query .= " AND $table.coopere=1";
                $coopere_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.coopere=0";
                $coopere_statut = "non";
            }
            $requete_affichee .= "CooPère Rosemont :  $coopere_statut<br />";
        }

        if($dpa_debut != 0 && $dpa_fin != 0)
        {
            $requete_query .= " AND $table.dpa>=\"$dpa_debut\" && $table.dpa<=\"$dpa_fin\"";
            $requete_affichee .= "Date prévue d'accouchement entre le $dpa_debut et le $dpa_fin<br />";
        }

        if($dob_debut != 0 && $dob_fin != 0)
        {
            $requete_query .= " AND $table.date_naissance_bebe>=\"$dob_debut\" && $table.date_naissance_bebe<=\"$dob_fin\"";
            $requete_affichee .= "Date de naissance du bébé entre le $dob_debut et le $dob_fin<br />";
        }
        if($type_soignant != "")
        {
            $requete_query .= " AND $table.type_soignant=\"$type_soignant\"";
            $requete_affichee .= "Type de soignant : $type_soignant<br />";
        }

        if($portebebe != 0)
        {
            if($portebebe == 1)
            {
                $requete_query .= " AND $table.porte_bebe_donne=1";
                $portebebe_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.porte_bebe_donne=0";
                $portebebe_statut = "non";
            }
            $requete_affichee .= "Porte-bébé donné :  $portebebe_statut<br />";
        }

        if($massage != 0)
        {
            if($massage == 1)
            {
                $requete_query .= " AND $table.massage_bebe_donne=1";
                $massage_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.massage_bebe_donne=0";
                $massage_statut = "non";
            }
            $requete_affichee .= "Formation massage pour bébé donnée :  $massage_statut<br />";
        }

        if($sollicite != 0)
        {
            if($sollicite == 1)
            {
                $requete_query .= " AND $table.sollicite_don=1";
                $sollicite_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.sollicite_don=0";
                $sollicite_statut = "non";
            }
            $requete_affichee .= "Sollicité pour un don :  $sollicite_statut<br />";
        }

        if($don != 0)
        {
            if($don == 1)
            {
                $requete_query .= " AND $table.don_montant!=\"\"";
                $don_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.don_montant=\"\"";
                $don_statut = "non";
            }
            $requete_affichee .= "A déjà fait un don :  $don_statut<br />";
        }

        if($bilanevaluation != 0)
        {
            if($bilanevaluation == 1)
            {
                $requete_query .= " AND $table.document_sollicite_evaluation!=\"\"";
                $bilanevaluation_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.document_sollicite_evaluation=\"\"";
                $bilanevaluation_statut = "non";
            }
            $requete_affichee .= "Pièce électronique d'évaluation remise :  $bilanevaluation_statut<br />";
        }

        if($accompagnante_id != 0)
        {
            if($accompagnante_id != 9999)
            {
                $requete_query .= " AND $table.accompagnante_id_1=$accompagnante_id || $table.accompagnante_id_2=$accompagnante_id";
                $result1 = DB::select( DB::raw("SELECT `uid` FROM `accompagnantes` WHERE `id`=$accompagnante_id") );
                $myrow1 = $result1[0];
                $acc_uid = $myrow1->uid;
                $result2 = DB::select( DB::raw("SELECT `prenom`,`nom` FROM `inscrits` WHERE `uid`='$acc_uid'") );
                $myrow2 = $result2[0];
                $acc_prenom = $myrow2->prenom;
                $acc_nom = $myrow2->nom;
                $accompagnante = stripslashes($acc_prenom." ".$acc_nom);
                $requete_affichee .= "Accompagnante associée : $accompagnante<br />";
            }
            else
            {
                $requete_query .= " AND $table.accompagnante_id_1=0 && $table.accompagnante_id_2=0";
                $requete_affichee .= "Accompagnante associée : Aucune accompagnante dans le dossier<br />";
            }
        }

        if($fiche != 0)
        {
            if($fiche == 1)
            {
                $requete_query .= " AND $table.evaluation_document!=\"\"";
                $fiche_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.evaluation_document=\"\"";
                $fiche_statut = "non";
            }
            $requete_affichee .= "Fiche relève remise :  $fiche_statut<br />";
        }

        if($bilan != 0)
        {
            if($bilan == 1)
            {
                $requete_query .= " AND $table.accompagnante_id_1!=0 AND $table.date_remise_bilan!=\"0000-00-00\"";
                $bilan_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.accompagnante_id_1!=0 AND $table.date_remise_bilan=\"0000-00-00\"";
                $bilan_statut = "non";
            }
            $requete_affichee .= "Accompagnante 1 dossier bilan remis :  $bilan_statut<br />";
        }
        if($bilan2 != 0)
        {
            if($bilan2 == 1)
            {
                $requete_query .= " AND $table.accompagnante_id_2!=0 AND $table.date_remise_bilan_acc2!=\"0000-00-00\"";
                $bilan_statut2 = "oui";
            }
            else
            {
                $requete_query .= " AND $table.accompagnante_id_2!=0 AND $table.date_remise_bilan_acc2=\"0000-00-00\"";
                $bilan_statut2 = "non";
            }
            $requete_affichee .= "Accompagnante 2 dossier bilan remis :  $bilan_statut2<br />";
        }

        if($stage != 0)
        {
            if($stage == 1)
            {
                $requete_query .= " AND $table.stage_paye!=\"\"";
                $stage_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.stage_paye=\"\"";
                $stage_statut = "non";
            }
            $requete_affichee .= "Stage à été payé :  $stage_statut<br />";
        }
        if($stage2 != 0)
        {
            if($stage2 == 1)
            {
                $requete_query .= " AND $table.stagiaire!=\"\"";
                $stage2_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.stagiaire=\"\"";
                $stage2_statut = "non";
            }
            $requete_affichee .= "Accompagnement avec stagiaire :  $stage2_statut<br />";
        }


        if($demande_marrainage != 0)
        {
            if($demande_marrainage == 1)
            {
                $requete_query .= " AND $table.dossier_marrainage=1";
                $demande_marrainage = "oui";
            }
            else
            {
                $requete_query .= " AND $table.dossier_marrainage=0";
                $demande_marrainage = "non";
            }
            $requete_affichee .= "Dossier de demande de marrainage :  $demande_marrainage<br />";
        }

        if($dyade != 0)
        {
            if($dyade == 1)
            {
                $requete_query .= " AND $table.dyade=1";
                $dyade = "oui";
            }
            else
            {
                $requete_query .= " AND $table.dyade=0";
                $dyade = "non";
            }
            $requete_affichee .= "Dossier de demande de marrainage :  $dyade<br />";
        }

        if($demande_stage != 0)
        {
            if($demande_stage == 1)
            {
                $requete_query .= " AND $table.dossier_demande_stage=1";
                $demande_stage_statut = "oui";
            }
            else
            {
                $requete_query .= " AND $table.dossier_demande_stage=0";
                $demande_stage_statut = "non";
            }
            $requete_affichee .= "Dossier de demande de stage :  $demande_stage_statut<br />";
        }

        if($statut_dossier != 0)
        {
            if($statut_dossier == 1)
            {
                $requete_query .= " AND $table.statut_dossier<5";
                $statut_dossier_statut = "Tout les statuts sauf \"annulé\"";
            }

            $requete_affichee .= "Statut de dossiers :  $statut_dossier_statut<br />";
        }


        if($order == 0 || $order == 1)
        {
            $requete_query .= " ORDER BY inscrits.prenom, inscrits.nom";
        }
        else if($order == 2)
        {
            $requete_query .= " ORDER BY $table.dpa ASC";
        }

        if($nom == null){
            $nom= "";
        }
        else{
            $nom= $input['nom'];
        }
        //dd($requete_query.'-'.$request->has('sauvegarder'));
        $randomNumber = rand(1721, 9999);
        if($request->has('sauvegarder'))
        {
            $sauvegarder = 1;
            $nouvelle_requete= $requete_query;
            //dd($sauvegarder);
            $requete= Requetes::create(["nom" => $nom,"favori" => 1,"ordre" =>$randomNumber, "requete" => $nouvelle_requete]);
        }
        else {

            $sauvegarder =0;
            //dd($sauvegarder);
            $nouvelle_requete= $requete_query;
            $requete= Requetes::create(["nom" => $nom,"favori" => 0,"ordre" =>$randomNumber,"requete" => $nouvelle_requete]);
        }
        return redirect('/admin/requetes');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
