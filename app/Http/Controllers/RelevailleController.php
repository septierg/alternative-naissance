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
use Illuminate\Http\Request;
use App\Models\Relevaille;
use Illuminate\Support\Facades\DB;

class RelevailleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$relevailles = Relevaille::all();
        $relevailles = DB::table('relevailles')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'relevailles.uid')
            ->select('inscrits.nom','inscrits.prenom', 'relevailles.*')
            ->orderBy('inscrits.prenom','asc')
            ->skip(25)->take(15)
            ->get();

        return view('admin.relevaille.index', compact('relevailles'));
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
        $relevailles = DB::table('relevailles')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'relevailles.uid')
            ->select('inscrits.nom','inscrits.prenom', 'relevailles.*')
            ->orderBy('inscrits.prenom','asc')
            ->where('relevailles.id', $id)
            ->first();


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

        return view('admin.relevaille.edit', compact('relevailles', 'inscrits', 'annee_fiscale', 'accouchement_personnes_prevues', 'attentes', 'preoccupations_grossesse','preoccupations_accouchement', 'preoccupations_bebe','clsc','source_diffusion','accompagnantes','statut_accompagnante'));

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

        //dd($input);
        //format some column


        if(! isset($input['sippe_non_clsc'] ) ){

            $m = 'aucun';


            $input['sippe_non_clsc'] = $m;

        }
        if( isset($input['sippe_non_clsc'] ) ){
            $input['sippe_non_clsc'] = $request->input('sippe_non_clsc');

    }


        if(isset($input['sippe_non_clsc_id']) == 1){

            $input['sippe_non_clsc_id'] = 1;

        }else
            $input['sippe_non_clsc_id'] = 0;

        //sollicite_don
        if(isset($input['sollicite_don']) == 1){

            $input['sollicite_don'] = 1;

        }else
            $input['sollicite_don'] = 0;

        //dossier_marrainage
        if(isset($input['dossier_marrainage']) == 1){

            $input['dossier_marrainage'] = 1;

        }else
            $input['dossier_marrainage'] = 0;



        if(isset($input['sippe']) == 1){

            $input['sippe'] = 1;

        }else
            $input['sippe'] = 0;


        //sippe_oui_clsc
        if(! isset($input['sippe_oui_clsc'] ) ){

            $m = 0;


            $input['sippe_oui_clsc'] = $m;

        }else
            $input['sippe_oui_clsc'] = $request->input('sippe_oui_clsc');



        if(isset($input['pae']) == 1){

            $input['pae'] = 1;
        }else
        {

            $input['pae'] = 0;
        }


        if($input['pae_clsc_id'] == '__'){

            $input['pae_clsc_id'] = 0;
        }


        if($input['accompagnante_1'] == '__' OR $input['accompagnante_1'] == ''){

            if(isset($input['accompagnante_1_old'])){
                $input['accompagnante_1'] = $input['accompagnante_1_old'];

            }
            else{
                $input['accompagnante_1'] = "aucun";
            }
        }





        if($input['accompagnante_2'] == '__' OR $input['accompagnante_2'] == ''){
            if(isset($input['accompagnante_2_old'])){
                $input['accompagnante_2'] = $input['accompagnante_2_old'];

            }
            else{
                $input['accompagnante_2'] = "aucun";
            }
        }


        if(isset($input['attentes']) and ($request->has('attentes'))){


            $input['attentes'] = $request->input('attentes');
        }

        //NOUVELLE ATTENTES
        if(isset($input['autre_attente'] ) and ($request->has('autre_attente')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= Attentes::create(["nom" =>$input['autre_attente']]);

        }




        if(isset($input['sujets_preoccupations_grossesse']) and ($request->has('sujets_preoccupations_grossesse'))){
            //dd($input['sujet_preoccupations_grossesse']);
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('sujets_preoccupations_grossesse'));

            $input['sujets_preoccupations_grossesse'] = $input_array;
        }

        //NOUVELLE PREOCCUPATION GROSSESSE
        if(isset($input['autre_sujet_preoccupation_grossesse'] ) and ($request->has('autre_sujet_preoccupation_grossesse')))
        {
            //var_dump($input['autre_sujet_preoccupation_grossesse']);

            //NEW CREATE ATTENTE
            $nom= PreoccupationsGrossesses::create(["nom" =>$input['autre_sujet_preoccupation_grossesse']]);

        }





        if(isset($input['sujets_preoccupations_accouchement']) and ($request->has('sujets_preoccupations_accouchement'))){
            //dd($input['preoccupations_grossesse']);
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('sujets_preoccupations_accouchement'));

            $input['sujets_preoccupations_accouchement'] = $input_array;
        }

        //NOUVELLE PREOCCUPATION ACCOUCHEMENT
        if(isset($input['autre_sujet_preoccupation_accouchement'] ) and ($request->has('autre_sujet_preoccupation_accouchement')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= PreoccupationsAccouchement::create(["nom" =>$input['autre_sujet_preoccupation_accouchement']]);

        }




        if(isset($input['sujets_preoccupations_bebe']) and ($request->has('sujets_preoccupations_bebe'))){
            //dd($input['preoccupations_grossesse']);
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('sujets_preoccupations_bebe'));

            $input['sujets_preoccupations_bebe'] = $input_array;
        }

        //NOUVELLE PREOCCUPATION BEBE
        if(isset($input['autre_sujet_preoccupation_bebe'] ) and ($request->has('autre_sujet_preoccupation_bebe')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= PreoccupationsBebe::create(["nom" =>$input['autre_sujet_preoccupation_bebe']]);

        }






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



        if(! isset($input['notes_generales'] ) ){

            $m = "";


            $input['notes_generales'] = $m;

        }else
            $input['notes_generales'] = $request->input('notes_generales');


        if(! isset($input['notes_anxiete'] ) ){

            $m = "";


            $input['notes_anxiete'] = $m;

        }else
            $input['notes_anxiete'] = $request->input('notes_anxiete');


        if(! isset($input['courriel_conjoint'] ) ){

            $m = "";


            $input['courriel_conjoint'] = $m;

        }else
            $input['courriel_conjoint'] = $request->input('courriel_conjoint');





        if(! isset($input['refere'] ) ){

            $m = 0;


            $input['refere'] = $m;

        }else
            $input['refere'] = $request->input('refere');





        if(! isset($input['sippe'] ) ){

            $m = 0;


            $input['sippe'] = $m;

        }else
            $input['sippe'] = $request->input('sippe');


        if(! isset($input['pays_origine'] ) ){

            $m = '';


            $input['pays_origine'] = $m;

        }else
            $input['pays_origine'] = $request->input('pays_origine');


        //DATE
        if(! isset($input['date_demande'] ) ){

            $myDate = "2000-01-01";
            //secho 'libre et riche';

            $input['date_demande'] = $myDate;

        }else
            $input['date_demande'] = $request->input('date_demande');


        //langue_parlee
        if(! isset($input['langue_parlee'] ) ){

            $m = '';


            $input['langue_parlee'] = $m;

        }else
            $input['langue_parlee'] = $request->input('langue_parlee');


        //occupation
        if(! isset($input['occupation'] ) ){

            $m = '';


            $input['occupation'] = $m;

        }else
            $input['occupation'] = $request->input('occupation');



        //conjoint_prenom
        if(! isset($input['conjoint_prenom'] ) ){

            $m = '';


            $input['conjoint_prenom'] = $m;

        }else
            $input['conjoint_prenom'] = $request->input('conjoint_prenom');


        //conjoint_nom
        if(! isset($input['conjoint_nom'] ) ){

            $m = '';


            $input['conjoint_nom'] = $m;

        }else
            $input['conjoint_nom'] = $request->input('conjoint_nom');


        //conjoint_occupation
        if(! isset($input['conjoint_occupation'] ) ){

            $m = '';


            $input['conjoint_occupation'] = $m;

        }else
            $input['conjoint_occupation'] = $request->input('conjoint_occupation');



        //age_respectif
        if(! isset($input['age_respectif'] ) ){

            $m = '';


            $input['age_respectif'] = $m;

        }else
            $input['age_respectif'] = $request->input('age_respectif');




        //service_connu
        if(! isset($input['service_connu'] ) or $input['service_connu'] == '__'){



            $input['service_connu'] = $input['service_connu_old'];


        }else
            $input['service_connu'] = $request->input('service_connu');




        //conditions_particulieres
        if(! isset($input['conditions_particulieres'] ) ){

            $m = "";


            $input['conditions_particulieres'] = $m;

        }else
            $input['conditions_particulieres'] = $request->input('conditions_particulieres');


        //notes_attentes
        if(! isset($input['attentes'] ) ){

            $m = "";


            $input['attentes'] = $m;

        }else
            $input['attentes'] = $request->input('attentes');




        //date_naissance_bebe
        if(! isset($input['date_naissance_bebe'] ) ){

            $m = "";
            $myDate = "2000-01-01";


            $input['date_naissance_bebe'] = $myDate;

        }else
            $input['date_naissance_bebe'] = $request->input('date_naissance_bebe');




        //date_sollicitation_don
        if(! isset($input['date_sollicitation_don'] ) ){

            $m = "";
            $myDate = "2000-01-01";


            $input['date_sollicitation_don'] = $myDate;

        }else
            $input['date_sollicitation_don'] = $request->input('date_sollicitation_don');





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




        //finding it
        $relevailles= Relevaille::findOrFail($id);

        $relevailles = Relevaille::where('id', $id)->update([
            "date_demande" =>  $input['date_demande'],
            "annee_fiscale" => $request->input('annee_fiscale'),
            "langue_parlee" => $input['langue_parlee'],
            "statut_citoyen" => $request->input('statut_citoyen'),
            "pays_origine" => $input['pays_origine'],
            "age" => $request->input('age'),
            "occupation" => $input['occupation'],
            "conjoint_prenom" => $input['conjoint_prenom'],
            "conjoint_nom" => $input['conjoint_nom'],
            "conjoint_occupation" => $input['conjoint_occupation'],
            "courriel_conjoint" => $input['courriel_conjoint'],
            "coopere" => $input['coopere'],
            "monoparentale"  => $input['monoparentale'],
            "nbr_enfants" => $request->input('nbr_enfants'),
            "age_respectif" => $input['age_respectif'],
            "pae" => $input['pae'],
            "pae_clsc_id" => $input['pae_clsc_id'],
            "sippe" => $input['sippe'],
            "sippe_non_clsc_id" =>  $input['sippe_non_clsc_id'],
            "sippe_oui_clsc" => $input['sippe_oui_clsc'],
            "sippe_non_clsc" => $input['sippe_non_clsc'],
            "refere_organisme" => $input['refere_organisme'],
            "refere"  => $input['refere'],
            "service_connu" => $input['service_connu'],
            "porte_bebe_donne" => $input['porte_bebe_donne'],
            "massage_bebe_donne" => $input['massage_bebe_donne'],
            "accompagnante_1" => $input['accompagnante_1'],
            "accompagnante_2" => $input['accompagnante_2'],
            "conditions_particulieres" => $input['conditions_particulieres'],
            "attentes" => $input['attentes'],
            //"notes_attentes" => $input['notes_attentes'],
            "date_sollicitation_don" => $input['date_sollicitation_don'],
            "sollicite_don" => $input['sollicite_don'],
            "dossier_marrainage"  => $input['dossier_marrainage'],
            "don_date" => $input['don_date'],
            "don_montant" => $input['don_montant'],
            "don_numero_recu" => $input['don_numero_recu'],
            "don_type_paiement" => $input['don_type_paiement'],
            "notes_accompagnement" => $input['notes_accompagnement'],
            "notes_generales" => $input['notes_generales'],
            "accepter_contact_an" => $request->input('accepter_contact_an'),
            "accepter_contact_organisme" => $request->input('accepter_contact_organisme'),
            "accepter_statistiques" => $request->input('accepter_statistiques'),
            "statut_dossier" => $request->input('statut_dossier'),
            "date_naissance_bebe" => $input['date_naissance_bebe'],
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
