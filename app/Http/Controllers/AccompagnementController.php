<?php

namespace App\Http\Controllers;

use App\Models\Accompagnante;
use App\Models\Accompagnement;
use App\Models\AccouchementPersonnesPrevues;
use App\Models\AnneeFiscale;
use App\Models\Attentes;
use App\Models\Clsc;
use App\Models\Inscrit;
use App\Models\PreoccupationsAccouchement;
use App\Models\PreoccupationsBebe;
use App\Models\PreoccupationsGrossesses;
use App\Models\SourceDiffusion;
use App\Models\StatutAccompagnantes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class AccompagnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$accompagnements =  Accompagnement::all();
        $accompagnements = DB::table('accompagnements')
      ->leftJoin('inscrits', 'inscrits.uid', '=', 'accompagnements.uid')
      ->select('inscrits.nom','inscrits.prenom', 'accompagnements.*')
            ->orderBy('inscrits.prenom','asc')
            ->orderBy('inscrits.nom','asc')
            ->skip(15)->take(15)->get();

        return view('admin.accompagnement.index',compact('accompagnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $accompagnements = DB::table('accompagnements')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'accompagnements.uid')
            ->select('inscrits.nom','inscrits.prenom', 'accompagnements.*')
            ->orderBy('inscrits.prenom','asc')
            ->where('accompagnements.id', $id)
            ->first();
//dd($accompagnements);

        $input_array = explode(',', $accompagnements->personnes_prevues_accouchement);
        $count_array = count($input_array);
        //dd($input_array);
        $selected = "checked";
        $array_personnes_prevues_accouchement=[];
        for ($x = 0; $x < $count_array; $x++) {
            $array_personnes_prevues_accouchement[]  = $input_array[$x];

        }
        //dd($array_personnes_prevues_accouchement);
       // var_dump($accompagnements['personnes_prevues_accouchement']);
        // ($accompagnements->personnes_prevues_accouchement as $value) {
           // echo "value: $value <br>";
            //echo "<label style='height:20px; padding: 0px 6px 2px; '>$value</label><input name='$value' type='checkbox' value='1' style='height:21px;margin-left:10px;' $selected /><div style='clear:both; '></div>";
       // }
        //$personnes_prevues_accouchement[$accompagnements->personnes_prevues_accouchement];

        //var_dump($personnes_prevues_accouchement);

        //help to open the category model and send it to help create the post orderBy('name')->get();
        $inscrits = Inscrit::pluck('nom', 'id')->all();
        $annee_fiscale = AnneeFiscale::pluck('annee')->all();
        $accouchement_personnes_prevues = AccouchementPersonnesPrevues::all();
        $attentes = Attentes::all();
        $preoccupations_grossesse = PreoccupationsGrossesses::all();
        $preoccupations_accouchement = PreoccupationsAccouchement::all();
        $preoccupations_bebe = PreoccupationsBebe::all();
        $clsc = Clsc::all();
        $source_diffusion = SourceDiffusion::all();
        $accompagnantes = Accompagnante::all();
        $statut_accompagnante = StatutAccompagnantes::all();

        return view('admin.accompagnement.edit', compact('accompagnements', 'inscrits', 'annee_fiscale', 'accouchement_personnes_prevues','input_array', 'attentes', 'preoccupations_grossesse','preoccupations_accouchement', 'preoccupations_bebe','clsc','source_diffusion','accompagnantes','statut_accompagnante'));

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
        //receiving data from the request
        $input=$request->all();



        //format some column
        if(! isset($input['sippe_non_clsc'] ) ){

            $m = 'aucun';


            $input['sippe_non_clsc'] = $m;

        }
        else{
            $input['sippe_non_clsc'] = $request->input('sippe_non_clsc');

        }


        if(isset($input['sippe_non_clsc_id']) == 1){

            $input['sippe_non_clsc_id'] = 1;

        }else
            $input['sippe_non_clsc_id'] = 0;



        //sippe
        if($input['sippe_oui_clsc'] == '__'){

            $input['sippe_oui_clsc'] = '';
        }

        //sippe_oui_clsc
        if(! isset($input['sippe_oui_clsc'] ) ){

            $m = 0;


            $input['sippe_oui_clsc'] = $m;

        }else
            $input['sippe_oui_clsc'] = $request->input('sippe_oui_clsc');


        //pae

        if(isset($input['pae']) == 1){

            $input['pae'] = 1;
        }else
        {

            $input['pae'] = 0;
        }

        if($input['pae_clsc_id'] == '__'){

            $input['pae_clsc_id'] = 0;
        }

        //accompagnante 1
        if($input['accompagnante_1'] == '__' OR $input['accompagnante_1'] == ''){
            if(isset($input['accompagnante_1_old'])){
                $input['accompagnante_1'] = $input['accompagnante_1_old'];

            }
            else{
                $input['accompagnante_1'] = "aucun";
            }
        }




        //accompagnante 2
        if($input['accompagnante_2'] == '__' OR $input['accompagnante_2'] == ''){
            if(isset($input['accompagnante_2_old'])){
                $input['accompagnante_2'] = $input['accompagnante_2_old'];

            }
            else{
                $input['accompagnante_2'] = "aucun";
            }
        }

        //statut accompagnante 1
        if($input['statut_accompagnante_1'] == '__' OR $input['statut_accompagnante_1'] == ''){
            if(isset($input['statut_accompagnante_1_old'])){
                $input['statut_accompagnante_1'] = $input['statut_accompagnante_1_old'];

            }
            else{
                $input['statut_accompagnante_1'] = "aucun";
            }
        }


        //statut accompagnante 2
        if($input['statut_accompagnante_2'] == '__' OR $input['statut_accompagnante_2'] == ''){
            if(isset($input['accompagnante_2_old'])){
                $input['statut_accompagnante_2'] = $input['statut_accompagnante_2_old'];

            }
            else{
                $input['statut_accompagnante_2'] = "aucun";
            }
        }


        //PERSONNE PREVUES ACCOUCHEMENT
        if(isset($input['personnes_prevues_accouchement'] ) and ($request->has('personnes_prevues_accouchement')))
         {
             //IMPLODE : get that string FROM  ARRAY
             $input_array =  implode(',', $request->input('personnes_prevues_accouchement'));

             $input['personnes_prevues_accouchement'] = $input_array;
        }
        if( ! isset($input['personnes_prevues_accouchement'] )) {

            $input['personnes_prevues_accouchement'] = "";

        }


        //NOUVELLE PERSONNE PREVUES ACCOUCHEMENT
        if(isset($input['autre_personne'] ) and ($request->has('autre_personne')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= AccouchementPersonnesPrevues::create(["nom" =>$input['autre_personne']]);
        }



        //ATTENTES
        if(isset($input['attentes']) and ($request->has('attentes'))){
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('attentes'));

            $input['attentes'] = $input_array;
        }
        if(! isset($input['attentes'])){

            $input['attentes'] = '';
        }


        //NOUVELLE ATTENTES
        if(isset($input['autre_attente'] ) and ($request->has('autre_attente')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= Attentes::create(["nom" =>$input['autre_attente']]);

        }



        //sujets_preoccupations_grossesse
        if(isset($input['sujets_preoccupations_grossesse']) and ($request->has('sujets_preoccupations_grossesse'))){
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('sujets_preoccupations_grossesse'));

            $input['sujets_preoccupations_grossesse'] = $input_array;
        }
        if( ! isset($input['sujets_preoccupations_grossesse'])){

            $input['sujets_preoccupations_grossesse'] = '';
        }



        //NOUVELLE PREOCCUPATION GROSSESSE
        if(isset($input['autre_sujet_preoccupation_grossesse'] ) and ($request->has('autre_sujet_preoccupation_grossesse')))
        {
            //NEW CREATE ATTENTE
            $nom= PreoccupationsGrossesses::create(["nom" =>$input['autre_sujet_preoccupation_grossesse']]);
        }


        //sujets_preoccupations_accouchement
        if(isset($input['sujets_preoccupations_accouchement']) and ($request->has('sujets_preoccupations_accouchement'))){
            //dd($input['preoccupations_grossesse']);
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('sujets_preoccupations_accouchement'));

            $input['sujets_preoccupations_accouchement'] = $input_array;
        }
        if( ! isset($input['sujets_preoccupations_accouchement'])){

            $input['sujets_preoccupations_accouchement'] = '';
        }



        //NOUVELLE PREOCCUPATION ACCOUCHEMENT
        if(isset($input['autre_sujet_preoccupation_accouchement'] ) and ($request->has('autre_sujet_preoccupation_accouchement')))
        {
            //NEW CREATE ATTENTE
            $nom= PreoccupationsAccouchement::create(["nom" =>$input['autre_sujet_preoccupation_accouchement']]);
        }



        //sujets_preoccupations_bebe
        if(isset($input['sujets_preoccupations_bebe']) and ($request->has('sujets_preoccupations_bebe'))){
            //dd($input['preoccupations_grossesse']);
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('sujets_preoccupations_bebe'));

            $input['sujets_preoccupations_bebe'] = $input_array;
        }

        if( ! isset($input['sujets_preoccupations_bebe'])){

            $input['sujets_preoccupations_bebe'] = '';
        }



        //NOUVELLE PREOCCUPATION BEBE
        if(isset($input['autre_sujet_preoccupation_bebe'] ) and ($request->has('autre_sujet_preoccupation_bebe')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= PreoccupationsBebe::create(["nom" =>$input['autre_sujet_preoccupation_bebe']]);

        }


        if(! isset($input['refere'] ) ){

            $m = 0;


            $input['refere'] = $m;

        }else
            $input['refere'] = $request->input('refere');




        if(! isset($input['refere_organisme'] ) ){
        //dd($input['personnes_prevues_accouchement_old']);

            $input['refere_organisme'] = '';
        }else
            $input['refere_organisme'] = $request->input('refere_organisme');


        if(! isset($input['date_remise_bilan'] ) ){

            $myDate = "2000-01-01";

            $input['date_remise_bilan'] = $myDate;

        }else
            $input['date_remise_bilan'] = $request->input('date_remise_bilan');

        if(! isset($input['date_remise_bilan_acc2'] ) ){

            $myDate = "2000-01-01";

            $input['date_remise_bilan_acc2'] = $myDate;

        }else
            $input['date_remise_bilan_acc2'] = $request->input('date_remise_bilan_acc2');


        if(! isset($input['montant_paye'] ) ){

            $montant_paye = "";


            $input['montant_paye'] = $montant_paye;

        }else
            $input['montant_paye'] = $request->input('montant_paye');


        if(! isset($input['montant_paye_acc2'] ) ){

            $montant_paye = "";


            $input['montant_paye_acc2'] = $montant_paye;

        }else
            $input['montant_paye_acc2'] = $request->input('montant_paye_acc2');


        if(! isset($input['numero_cheque'] ) ){

            $numero_cheque = "";


            $input['numero_cheque'] = $numero_cheque;

        }else
            $input['numero_cheque'] = $request->input('numero_cheque');


        if(! isset($input['numero_cheque_acc2'] ) ){

            $numero_cheque = "";


            $input['numero_cheque_acc2'] = $numero_cheque;

        }else
            $input['numero_cheque_acc2'] = $request->input('numero_cheque_acc2');


        if(! isset($input['date_cheque_acc2'] ) ){

            $myDate = "2000-01-01";

            $input['date_cheque_acc2'] = $myDate;

        }else
            $input['date_cheque_acc2'] = $request->input('date_cheque_acc2');



        if(! isset($input['dossier_bilan_acc2'] ) ){

            $numero_cheque = "";

            $input['dossier_bilan_acc2'] = $numero_cheque;

        }else
            $input['dossier_bilan_acc2'] = $request->input('dossier_bilan_acc2');



        if(! isset($input['commentaire_presence'] ) ){

            $numero_cheque = "";

            $input['commentaire_presence'] = $numero_cheque;

        }else
            $input['commentaire_presence'] = $request->input('commentaire_presence');


        if(! isset($input['notes_prenatal'] ) ){

            $numero_cheque = "";


            $input['notes_prenatal'] = $numero_cheque;

        }else
            $input['notes_prenatal'] = $request->input('notes_prenatal');



        if(! isset($input['date_sollicitation_don'] ) ){

            $myDate = "2000-01-01";


            $input['date_sollicitation_don'] = $myDate;

        }else
            $input['date_sollicitation_don'] = $request->input('date_sollicitation_don');


        if(! isset($input['don_date'] ) ){

            $myDate = "2000-01-01";


            $input['don_date'] = $myDate;

        }else
            $input['don_date'] = $request->input('don_date');


        if(! isset($input['don_montant'] ) ){

            $m = "";


            $input['don_montant'] = $m;

        }else
            $input['don_montant'] = $request->input('don_montant');


        if(! isset($input['don_numero_recu'] ) ){

            $m = "";


            $input['don_numero_recu'] = $m;

        }else
            $input['don_numero_recu'] = $request->input('don_numero_recu');


        if(! isset($input['don_type_paiement'] ) ){

            $m = "";


            $input['don_type_paiement'] = $m;

        }else
            $input['don_type_paiement'] = $request->input('don_type_paiement');

        if(! isset($input['notes_accompagnement'] ) ){

            $m = "";


            $input['notes_accompagnement'] = $m;

        }else
            $input['notes_accompagnement'] = $request->input('notes_accompagnement');


        if(! isset($input['stagiaire'] ) ){

            $m = "";


            $input['stagiaire'] = $m;

        }else
            $input['stagiaire'] = $request->input('stagiaire');


        if(! isset($input['stage_paye'] ) ){

            $m = 0;


            $input['stage_paye'] = $m;

        }else
            $input['stage_paye'] = $request->input('stage_paye');




        //DATE
        if(! isset($input['date_paiement_stage'] ) ){

            $myDate = "2000-01-01";


            $input['date_paiement_stage'] = $myDate;

        }else
            $input['date_paiement_stage'] = $request->input('date_paiement_stage');


        if(! isset($input['montant_paye_par_stagiaire'] ) ){

            $m = "";


            $input['montant_paye_par_stagiaire'] = $m;

        }else
            $input['montant_paye_par_stagiaire'] = $request->input('montant_paye_par_stagiaire');


        if(! isset($input['bilan_supervision_stage_document'] ) ){

            $m = "";


            $input['bilan_supervision_stage_document'] = $m;

        }else
            $input['bilan_supervision_stage_document'] = $request->input('bilan_supervision_stage_document');



        if(! isset($input['montant_paye_marrainee'] ) ){

            $m = "";


            $input['montant_paye_marrainee'] = $m;

        }else
            $input['montant_paye_marrainee'] = $request->input('montant_paye_marrainee');


        if(! isset($input['numero_cheque_marrainee'] ) ){

            $m = "";


            $input['numero_cheque_marrainee'] = $m;

        }else
            $input['numero_cheque_marrainee'] = $request->input('numero_cheque_marrainee');

        //DATE
        if(! isset($input['date_cheque_marrainee'] ) ){

            $myDate = "2000-01-01";


            $input['date_cheque_marrainee'] = $myDate;

        }else
            $input['date_cheque_marrainee'] = $request->input('date_cheque_marrainee');




        //DATE
        if(! isset($input['date_cheque'] ) ){

            $myDate = "2000-01-01";


            $input['date_cheque'] = $myDate;

        }else
            $input['date_cheque'] = $request->input('date_cheque');




        if(! isset($input['notes_generales'] ) ){

            $m = "";


            $input['notes_generales'] = $m;

        }else
            $input['notes_generales'] = $request->input('notes_generales');



        //anxiete
        if(! isset($input['anxiete'] ) ){

            $m = 0;


            $input['anxiete'] = $m;

        }else
            $input['anxiete'] = $request->input('anxiete');


        //dossier_demande_stage
        if(! isset($input['dossier_demande_stage'] ) ){

            $m = 0;


            $input['dossier_demande_stage'] = $m;

        }else
            $input['dossier_demande_stage'] = $request->input('dossier_demande_stage');







        if(! isset($input['notes_anxiete'] ) ){

            $m = "";


            $input['notes_anxiete'] = $m;

        }else
            $input['notes_anxiete'] = $request->input('notes_anxiete');


        //DATE
        if(! isset($input['date_demande'] ) ){

            $myDate = "2000-01-01";
            //secho 'libre et riche';

            $input['date_demande'] = $myDate;

        }else
            $input['date_demande'] = $request->input('date_demande');


        //langue parlee
        if(! isset($input['langue_parlee'] ) ){

            $m = "";


            $input['langue_parlee'] = $m;

        }else
            $input['langue_parlee'] = $request->input('langue_parlee');


        //pays_origine
        if(! isset($input['pays_origine'] ) ){

            $m = "";


            $input['pays_origine'] = $m;

        }else
            $input['pays_origine'] = $request->input('pays_origine');


        //occupation
        if(! isset($input['occupation'] ) ){

            $m = "";


            $input['occupation'] = $m;

        }else
            $input['occupation'] = $request->input('occupation');


        //conjoint_prenom
        if(! isset($input['conjoint_prenom'] ) ){

            $m = "";


            $input['conjoint_prenom'] = $m;

        }else
            $input['conjoint_prenom'] = $request->input('conjoint_prenom');


        //conjoint_nom
        if(! isset($input['conjoint_nom'] ) ){

            $m = "";


            $input['conjoint_nom'] = $m;

        }else
            $input['conjoint_nom'] = $request->input('conjoint_nom');



        //conjoint_occupation
        if(! isset($input['conjoint_occupation'] ) ){

            $m = "";


            $input['conjoint_occupation'] = $m;

        }else
            $input['conjoint_occupation'] = $request->input('conjoint_occupation');


        //courriel_conjoint
        if(! isset($input['courriel_conjoint'] ) ){

            $m = "";


            $input['courriel_conjoint'] = $m;

        }else
            $input['courriel_conjoint'] = $request->input('courriel_conjoint');




        //age_respectif
        if(! isset($input['age_respectif'] ) ){

            $m = "";


            $input['age_respectif'] = $m;

        }else
            $input['age_respectif'] = $request->input('age_respectif');


        //age
        if(! isset($input['age'] ) ){

            $m = 0;


            $input['age'] = $m;

        }else
            $input['age'] = $request->input('age');



        //sippe
        if(! isset($input['sippe'] ) ){

            $m = 0;


            $input['sippe'] = $m;

        }else
            $input['sippe'] = $request->input('sippe');


        //service_connu
        if(! isset($input['service_connu'] ) or $input['service_connu'] == '__'){



                $input['service_connu'] = $input['service_connu_old'];


        }else
            $input['service_connu'] = $request->input('service_connu');


        //dpa
        if(! isset($input['dpa'] ) ){

            $myDate = "2000-01-01";
            $input['dpa'] = $myDate;

        }else
            $input['dpa'] = $request->input('dpa');


        //hopital
        if(! isset($input['hopital'] ) ){

            $m = "";


            $input['hopital'] = $m;

        }else
            $input['hopital'] = $request->input('hopital');



        //medecin
        if(! isset($input['medecin'] ) ){

            $m = "";


            $input['medecin'] = $m;

        }else
            $input['medecin'] = $request->input('medecin');



        //conditions_particulieres
        if(! isset($input['conditions_particulieres'] ) ){

            $m = "";


            $input['conditions_particulieres'] = $m;

        }else
            $input['conditions_particulieres'] = $request->input('conditions_particulieres');



        //notes_attentes
        if(! isset($input['notes_attentes'] ) ){

            $m = "";


            $input['notes_attentes'] = $m;

        }else
            $input['notes_attentes'] = $request->input('notes_attentes');


        //notes_preoccupations_grossesse
        if(! isset($input['notes_preoccupations_grossesse'] ) ){

            $m = "";


            $input['notes_preoccupations_grossesse'] = $m;

        }else
            $input['notes_preoccupations_grossesse'] = $request->input('notes_preoccupations_grossesse');



        //notes_preoccupations_accouchement
        if(! isset($input['notes_preoccupations_accouchement'] ) ){

            $m = "";


            $input['notes_preoccupations_accouchement'] = $m;

        }else
            $input['notes_preoccupations_accouchement'] = $request->input('notes_preoccupations_accouchement');



        //notes_preoccupations_bebe
        if(! isset($input['notes_preoccupations_bebe'] ) ){

            $m = "";


            $input['notes_preoccupations_bebe'] = $m;

        }else
            $input['notes_preoccupations_bebe'] = $request->input('notes_preoccupations_bebe');



        //sollicite don
        if(! isset($input['sollicite_don'] ) ){

            $m = 0;


            $input['sollicite_don'] = $m;

        }else
            $input['sollicite_don'] = $request->input('sollicite_don');




        //porte_bebe_donne
        if(! isset($input['porte_bebe_donne'] ) ){

            $m = 0;


            $input['porte_bebe_donne'] = $m;

        }else
            $input['porte_bebe_donne'] = $request->input('porte_bebe_donne');



        //massage_bebe_donne
        if(! isset($input['massage_bebe_donne'] ) ){

            $m = 0;


            $input['massage_bebe_donne'] = $m;

        }else
            $input['massage_bebe_donne'] = $request->input('massage_bebe_donne');


        //monoparentale

        if(isset($input['monoparentale']) == 1){

            $input['monoparentale'] = 1;
        }else
        {

            $input['monoparentale'] = 0;
        }

        //coopere
        if(isset($input['coopere']) == 1){

            $input['coopere'] = 1;
        }else
        {

            $input['coopere'] = 0;
        }



        //conjoint_absent_pays
        if(! isset($input['conjoint_absent_pays'] ) ){


            $input['conjoint_absent_pays'] = 0;

        }else
            $input['conjoint_absent_pays'] = 1;



        //conjoint_absent_accouchement
        if(! isset($input['conjoint_absent_accouchement'] ) ){


            $input['conjoint_absent_accouchement'] = 0;

        }else
            $input['conjoint_absent_accouchement'] = 1;



        //dossier_marrainage
        if(! isset($input['dossier_marrainage'] ) ){


            $input['dossier_marrainage'] = 0;

        }else
            $input['dossier_marrainage'] = 1;



        //dyade
        if(! isset($input['dyade'] ) ){


            $input['dyade'] = 0;

        }else
            $input['dyade'] = 1;


        //bilan_supervision_stage_remis
        if(! isset($input['bilan_supervision_stage_remis'] ) ){


            $input['bilan_supervision_stage_remis'] = 0;

        }else
            $input['bilan_supervision_stage_remis'] = 1;




        //finding it
        $accompagnements= Accompagnement::findOrFail($id);
      //dd($request->all());
        //dd($input['date_remise_bilan']);
        //update it
        //$accompagnements = Accompagnement::where('id', $id)->update(['job_id' => $job_id]);
        $accompagnements = Accompagnement::where('id', $id)->update([
            "date_demande" =>$input['date_demande'],
          "annee_fiscale" => $request->input('annee_fiscale'),
          "langue_parlee" => $input['langue_parlee'],
          "statut_citoyen" => $request->input('statut_citoyen'),
          "pays_origine" => $input['pays_origine'],
          "age" => $input['age'],
          "occupation" => $input['occupation'],
          "conjoint_prenom" => $input['conjoint_prenom'],
          "conjoint_nom" => $input['conjoint_nom'],
          "conjoint_occupation" => $input['conjoint_occupation'],
          "courriel_conjoint" => $input['courriel_conjoint'],
          "conjoint_absent_pays" => $input['conjoint_absent_pays'],
            "conjoint_absent_accouchement" => $input['conjoint_absent_accouchement'],
          "coopere" => $input['coopere'],
            "monoparentale"  => $input['monoparentale'],
          "nbr_grossesse" => $request->input('nbr_grossesse'),
          "nbr_enfants" => $request->input('nbr_enfants'),
          "age_respectif" => $input['age_respectif'],
          "pae_clsc_id" => $input['pae_clsc_id'],
          "sippe" => $input['sippe'],
            "sippe_oui_clsc" => $input['sippe_oui_clsc'],
            "sippe_non_clsc_id" =>  $input['sippe_non_clsc_id'],
  "sippe_non_clsc" => $input['sippe_non_clsc'],
            "porte_bebe_donne" => $input['porte_bebe_donne'],
            "massage_bebe_donne" => $input['massage_bebe_donne'],
  "refere_organisme" => $input['refere_organisme'],
            "refere"  => $input['refere'],
  //"service_connu_old" => $request->input('service_connu_old'),
  "service_connu" => $input['service_connu'],
  //"accompagnante_1_old" => $request->input('accompagnante_1_old'),
  "accompagnante_1" => $input['accompagnante_1'],
  //"statut_accompagnante_1_old" => $request->input('statut_accompagnante_1_old'),
  "statut_accompagnante_1" => $input['statut_accompagnante_1'],
  "date_remise_bilan" => $input['date_remise_bilan'],
  "montant_paye" => $input['montant_paye'],
  "numero_cheque" => $input['numero_cheque'],
  //"accompagnante_2_old" => $request->input('accompagnante_2_old'),
  "accompagnante_2" => $input['accompagnante_2'],
  //"statut_accompagnante_2_old" => $request->input('statut_accompagnante_2_old'),
  "statut_accompagnante_2" => $input['statut_accompagnante_2'],
  "date_remise_bilan_acc2" => $input['date_remise_bilan_acc2'],
  "montant_paye_acc2" => $input['montant_paye_acc2'],
  "numero_cheque_acc2" => $input['numero_cheque_acc2'],
            "date_cheque" => $input['date_cheque'],
  "date_cheque_acc2" => $input['date_cheque_acc2'],
  "dossier_bilan_acc2" => $input['dossier_bilan_acc2'],
  "dossier_demande_stage" =>  $input['dossier_demande_stage'],
  "dossier_marrainage"  =>  $input['dossier_marrainage'],
            "dyade" => $input['dyade'],
  "dpa" => $input['dpa'],
            "pae" => $input['pae'],
  "hopital" => $input['hopital'],
  "medecin" => $input['medecin'],
  "type_soignant" => $request->input('type_soignant'),
  "personnes_prevues_accouchement" =>  $input['personnes_prevues_accouchement'],
  "commentaire_presence" => $input['commentaire_presence'],
  "conditions_particulieres" => $input['conditions_particulieres'],
  "attentes" => $input['attentes'],
  "notes_attentes" => $input['notes_attentes'],
  "sujets_preoccupations_grossesse" => $input['sujets_preoccupations_grossesse'],
  //"sujets_preoccupations_grossesse_old" => $request->input('sujets_preoccupations_grossesse_old'),
  "notes_preoccupations_grossesse" => $input['notes_preoccupations_grossesse'],
  "sujets_preoccupations_accouchement" => $input['sujets_preoccupations_accouchement'],
  //"sujets_preoccupations_accouchement_old" => $request->input('sujets_preoccupations_accouchement_old'),
  "notes_preoccupations_accouchement" => $input['notes_preoccupations_accouchement'],
  "sujets_preoccupations_bebe" => $input['sujets_preoccupations_bebe'],
  //"sujets_preoccupations_bebe_old" => $request->input('sujets_preoccupations_bebe_old'),
  "notes_preoccupations_bebe" => $input['notes_preoccupations_bebe'],
  "notes_prenatal" => $input['notes_prenatal'],
  "date_sollicitation_don" => $input['date_sollicitation_don'],
  "don_date" => $input['don_date'],
  "don_montant" => $input['don_montant'],
  "don_numero_recu" => $input['don_numero_recu'],
  "don_type_paiement" => $input['don_type_paiement'],
  "notes_accompagnement" => $input['notes_accompagnement'],
  "stagiaire" => $input['stagiaire'],
  "stage_paye" =>  $input['stage_paye'],
  "date_paiement_stage" => $input['date_paiement_stage'],
  "montant_paye_par_stagiaire" => $input['montant_paye_par_stagiaire'],
  "bilan_supervision_stage_document" => $input['bilan_supervision_stage_document'],
  "montant_paye_marrainee" => $input['montant_paye_marrainee'],
  "numero_cheque_marrainee" => $input['numero_cheque_marrainee'],
  "date_cheque_marrainee" => $input['date_cheque_marrainee'],
  "notes_generales" => $input['notes_generales'],
  "anxiete" => $request->input('anxiete'),
  "notes_anxiete" =>  $input['notes_anxiete'],
  "sollicite_don"  =>  $input['sollicite_don'],
  "bilan_supervision_stage_remis" => $input['bilan_supervision_stage_remis'],
  "accepter_contact_an" => $request->input('accepter_contact_an'),
  "accepter_contact_organisme" => $request->input('accepter_contact_organisme'),
  "accepter_statistiques" => $request->input('accepter_statistiques'),
  "statut_dossier" => $request->input('statut_dossier'),
        ]);

        return back()->withInput();
        return redirect('/accompagnement');




        $accompagnements->update($input);
        //dd($input);
        //dd($accompagnements->update($input));
        return redirect('/accompagnement');
        return redirect::back()->withErrors(['msg' => 'The Message']);
        //return redirect('/accompagnements');
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
