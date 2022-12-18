<?php

namespace App\Http\Controllers;

use App\Models\Accompagnante;
use App\Models\AccouchementPersonnesPrevues;
use App\Models\AnneeFiscale;
use App\Models\Attentes;
use App\Models\CercleFamilial;
use App\Models\Clsc;
use App\Models\Inscrit;
use App\Models\PreoccupationsAccouchement;
use App\Models\PreoccupationsBebe;
use App\Models\PreoccupationsGrossesses;
use App\Models\ReferencesDonnees;
use App\Models\Relevaille;
use App\Models\Rencontre;
use App\Models\SourceDiffusion;
use App\Models\SourceRevenu;
use App\Models\StatusCitoyen;
use App\Models\StatutAccompagnantes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RencontreController extends Controller
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
        $rencontres = DB::table('rencontres')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'rencontres.uid')
            ->select('inscrits.nom','inscrits.prenom', 'rencontres.*')
            ->orderBy('inscrits.prenom','asc')
            ->orderBy('inscrits.nom','asc')
            ->skip(30)->take(30)->get();

        return view('admin.rencontre.index',compact('rencontres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annee_fiscale = AnneeFiscale::all();
        $accouchement_personnes_prevues = AccouchementPersonnesPrevues::all();
        $attentes = Attentes::all();
        $preoccupations_grossesse = PreoccupationsGrossesses::all();
        $preoccupations_accouchement = PreoccupationsAccouchement::all();
        $preoccupations_bebe = PreoccupationsBebe::all();
        $clsc = Clsc::all();
        $source_diffusion = SourceDiffusion::all();
        $accompagnantes = Accompagnante::all();
        $statut_accompagnante = StatutAccompagnantes::all();
        $source_revenu = SourceRevenu::all();
        $cercle = CercleFamilial::all();
        $reference_donnee = ReferencesDonnees::all();
        $statut_citoyen = StatusCitoyen::all();
        return view('admin.rencontre.create', compact('statut_citoyen','annee_fiscale','accouchement_personnes_prevues','attentes','preoccupations_grossesse','preoccupations_accouchement','preoccupations_bebe','clsc','source_diffusion','accompagnantes','statut_accompagnante','source_revenu','cercle','reference_donnee'));
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
        //dd($input);
        if(is_null($input['sippe_non_clsc'] ) ){

            $m = '';

            $input['sippe_non_clsc'] = $m;

        }else{
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


        if($input['pae_clsc_id'] == '---'){

            $input['pae_clsc_id'] = 0;
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

        //Cercle familiale

        if(isset($input['cercle'] ) and ($request->has('cercle')))
        {
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('cercle'));

            $input['cercle'] = $input_array;
        }
        if( ! isset($input['cercle'] )) {

            $input['cercle'] = "";

        }


        //NOUVELLE PERSONNE cercle
        if(isset($input['autre_personne'] ) and ($request->has('autre_personne')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= CercleFamilial::create(["nom" =>$input['autre_personne']]);
        }




        //References donnees

        if(isset($input['references_donnees'] ) and ($request->has('references_donnees')))
        {
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('references_donnees'));

            $input['references_donnees'] = $input_array;
        }
        if( ! isset($input['references_donnees'] )) {

            $input['references_donnees'] = "";

        }


        //NOUVELLE PERSONNE reference
        if(isset($input['autre_reference'] ) and ($request->has('autre_reference')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= ReferencesDonnees::create(["nom" =>$input['autre_reference']]);
        }

        //NOUVEAU STATUT CITOYEN
        if(isset($input['autre_statut_citoyen'] ) and ($request->has('autre_statut_citoyen')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= StatusCitoyen::create(["nom" =>$input['autre_statut_citoyen']]);
        }

        //NOUVEAU SOURCE REVENU
        if(isset($input['autre_source_revenu'] ) and ($request->has('autre_source_revenu')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= SourceRevenu::create(["nom" =>$input['autre_source_revenu']]);
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


        //NOUVELLE source diffusion
        if(isset($input['autre_source'] ) and ($request->has('autre_source')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= SourceDiffusion::create(["nom" =>$input['autre_source']]);

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



        //NOTE PRENATAL
        if(! isset($input['notes_prenatal'] ) ){

            $numero_cheque = "";
//dd($input['notes_prenatal']);

            $input['notes_prenatal'] = $numero_cheque;

        }else
            $input['notes_prenatal'] = $request->input('notes_prenatal');


        //raisons_consultation
        if(! isset($input['raisons_consultation'] ) ){

            $numero_cheque = "";


            $input['raisons_consultation'] = $numero_cheque;

        }else
            $input['raisons_consultation'] = $request->input('raisons_consultation');



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
        if(is_null($input['service_connu'] )){



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

        //hopital
        if(! isset($input['hopital'] ) ){

            $m = "";


            $input['hopital'] = $m;

        }else
            $input['hopital'] = $request->input('hopital');


        //type accouchement
        if(! isset($input['type_accouchement'] ) ){

            $m = "";


            $input['type_accouchement'] = $m;

        }else
            $input['type_accouchement'] = $request->input('type_accouchement');


        //commentaire_presence
        if(! isset($input['commentaire_presence'] ) ){

            $m = "";


            $input['commentaire_presence'] = $m;

        }else
            $input['commentaire_presence'] = $request->input('commentaire_presence');

        //cours_prenatal
        if(isset($input['cours_prenatal']) == 1){

            $input['cours_prenatal'] = 1;
        }else
        {

            $input['cours_prenatal'] = 0;
        }


        //suggestions_donnees
        if(! isset($input['suggestions_donnees'] ) ){

            $m = "";


            $input['suggestions_donnees'] = $m;

        }else
            $input['suggestions_donnees'] = $request->input('suggestions_donnees');


        //sujets_documentations
        if(! isset($input['sujets_documentations'] ) ){

            $m = "";


            $input['sujets_documentations'] = $m;

        }else
            $input['sujets_documentations'] = $request->input('sujets_documentations');



        //duree_consultation
        if(! isset($input['duree_consultation'] ) ){

            $m = "";


            $input['duree_consultation'] = $m;

        }else
            $input['duree_consultation'] = $request->input('duree_consultation');

        //nbr_grossesse
        if(is_null($input['nbr_grossesse'] ) ){

            $m = 0;


            $input['nbr_grossesse'] = $m;

        }else
            $input['nbr_grossesse'] = $request->input('nbr_grossesse');




        //suivi_intervenants
        if(! isset($input['suivi_intervenants'] ) ){

            $m = "";


            $input['suivi_intervenants'] = $m;

        }else
            $input['suivi_intervenants'] = $request->input('suivi_intervenants');


        //SOURCE REVENU ID
        if(! isset($input['source_revenu_id'] ) ){

            $m = 0;


            $input['source_revenu_id'] = $m;

        }else
            $input['source_revenu_id'] = $request->input('source_revenu_id');

        //sippe
        if(! isset($input['sippe'] ) ){

            $m = 0;


            $input['sippe'] = $m;

        }else
            $input['sippe'] = $request->input('sippe');

        //arrondissement
        if(! isset($input['arrondissement_habite_id'] ) ){

            $m = 0;


            $input['arrondissement_habite_id'] = $m;

        }else
            $input['arrondissement_habite_id'] = $request->input('arrondissement_habite_id');







        $annee_fiscale_id= AnneeFiscale::where('id', $request->input('annee_fiscale'))->first()->toArray();
        $clsc= Clsc::where('id', $request->input('arrondissement_habite_id'))->first()->toArray();
        $statut_citoyen= StatusCitoyen::where('id', $request->input('statut_citoyen'))->first()->toArray();
        $source_revenu= SourceRevenu::where('id', $request->input('source_revenu_id'))->first()->toArray();
        $pae= Clsc::where('id', $request->input('pae_clsc_id'))->first()->toArray();
        $sippe= Clsc::where('nom', $request->input('sippe_oui_clsc'))->first()->toArray();
        $service_connu= SourceDiffusion::where('nom', $request->input('service_connu'))->first()->toArray();
        //dd($statut_citoyen);

        //finding it
        DB::table('rencontres')->insert([
            "date_demande" =>  $input['date_demande'],
            "annee_fiscale" => $annee_fiscale_id['annee'],
            "annee_fiscale_id" => $annee_fiscale_id['id'],
            "langue_parlee" => $input['langue_parlee'],
            "pays_origine" => $input['pays_origine'],
            "hopital" => $request->input('hopital'),
            "personnes_prevues_accouchement" =>  $input['personnes_prevues_accouchement'],
            "commentaire_presence" =>  $input['commentaire_presence'],
            "cours_prenatal" =>  $input['cours_prenatal'],
            "type_accouchement" => $input['type_accouchement'],
            "conjoint_prenom" => $input['conjoint_prenom'],
            "conjoint_nom" => $input['conjoint_nom'],
            "conjoint_occupation" => $input['conjoint_occupation'],
            "courriel_conjoint" => $input['courriel_conjoint'],
            "notes_prenatal" => $input['notes_prenatal'],
            "monoparentale"  => $input['monoparentale'],
            "nbr_enfants" => $request->input('nbr_enfants'),
            "age_respectif" => $input['age_respectif'],
            "pae" => $input['pae'],
            "pae_clsc_id" => $pae['id'],
            "pae_clsc" => $pae['id'],
            "sippe" => $input['sippe'],
            "sippe_oui_clsc" => $sippe['nom'],
            "sippe_oui_clsc_id" => $sippe['id'],
            "sippe_non_clsc_id" =>  $sippe['id'],
            "sippe_non_clsc" => $sippe['nom'],
            "refere_organisme" => $input['refere_organisme'],
            "refere"  => $input['refere'],
            "service_connu" => $service_connu['nom'],
            "service_connu_id" => $service_connu['id'],
            "raisons_consultation" => $input['raisons_consultation'],
            "suggestions_donnees" => $input['suggestions_donnees'],
            "conditions_particulieres" => $input['conditions_particulieres'],
            "sujets_documentations" => $input['sujets_documentations'],
            "duree_consultation" => $input['duree_consultation'],
            "references_donnees" => $input['references_donnees'],
            "conjoint_absent_pays" => $input['conjoint_absent_pays'],
            "conjoint_absent_accouchement" => $input['conjoint_absent_accouchement'],
            "nbr_grossesse" => $input['nbr_grossesse'],
            "cercle" => $input['cercle'],
            "suivi_intervenants"  => $input['suivi_intervenants'],
            "source_revenu_id" => $source_revenu['id'],
            "source_revenu" => $source_revenu['nom'],
            "code_postal" => $request->input('code_postal'),
            "arrondissement_habite_id" => $clsc['id'],
            "arrondissement_habite" => $clsc['nom'],
            "statut_citoyen_id" => $statut_citoyen['id'],
            "statut_citoyen" => $statut_citoyen['nom'],
            "notes_generales" => $input['notes_generales'],
            "accepter_contact_an" => $request->input('accepter_contact_an'),
            "accepter_contact_organisme" => $request->input('accepter_contact_organisme'),
            "accepter_statistiques" => $request->input('accepter_statistiques'),
            "statut_dossier" => $request->input('statut_dossier'),
            "date_arrivee" => $request->input('date_arrivee'),
            "ramq" => $request->input('ramq'),
            "dpa" => $request->input('dpa'),
            "recontacter" => 0,
            "moment_recontacter" => "aucun",
            "mode_communication" => "aucun",
            "uid" => "ab41re5d7e5h",
            "created_at"      => Carbon::now(),
            "updated_at"             => Carbon::now(),
        ]);

        return redirect('/admin/rencontre');
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
        $rencontres = DB::table('rencontres')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'rencontres.uid')
            ->select('inscrits.nom','inscrits.prenom', 'rencontres.*')
            ->orderBy('inscrits.prenom','asc')
            ->where('rencontres.id', $id)
            ->first();


        $input_array = explode(',', $rencontres->personnes_prevues_accouchement);
        $count_array = count($input_array);
        //dd($input_array);
        $selected = "checked";
        $array_personnes_prevues_accouchement=[];
        for ($x = 0; $x < $count_array; $x++) {
            $array_personnes_prevues_accouchement[]  = $input_array[$x];

        }


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
        $source_revenu = SourceRevenu::all();
        $cercle = CercleFamilial::all();
        $reference_donnee = ReferencesDonnees::all();

        return view('admin.rencontre.edit', compact('rencontres', 'inscrits', 'annee_fiscale', 'accouchement_personnes_prevues','input_array', 'attentes', 'preoccupations_grossesse','preoccupations_accouchement', 'preoccupations_bebe','clsc','source_diffusion','accompagnantes','statut_accompagnante','source_revenu','cercle','reference_donnee'));

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

       // dd($input);


        if(is_null($input['sippe_non_clsc'] ) ){

            $m = '';

            $input['sippe_non_clsc'] = $m;

        }else{
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

        //Cercle familiale

                if(isset($input['cercle'] ) and ($request->has('cercle')))
                {
                    //IMPLODE : get that string FROM  ARRAY
                    $input_array =  implode(',', $request->input('cercle'));

                    $input['cercle'] = $input_array;
                }
        if( ! isset($input['cercle'] )) {

            $input['cercle'] = "";

        }


        //NOUVELLE PERSONNE cercle
        if(isset($input['autre_personne'] ) and ($request->has('autre_personne')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= CercleFamilial::create(["nom" =>$input['autre_personne']]);
        }




        //References donnees

        if(isset($input['references_donnees'] ) and ($request->has('references_donnees')))
        {
            //IMPLODE : get that string FROM  ARRAY
            $input_array =  implode(',', $request->input('references_donnees'));

            $input['references_donnees'] = $input_array;
        }
        if( ! isset($input['references_donnees'] )) {

            $input['references_donnees'] = "";

        }


        //NOUVELLE PERSONNE reference
        if(isset($input['autre_reference'] ) and ($request->has('autre_reference')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= ReferencesDonnees::create(["nom" =>$input['autre_reference']]);
        }

        //NOUVEAU STATUT CITOYEN
        if(isset($input['autre_statut_citoyen'] ) and ($request->has('autre_statut_citoyen')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= StatusCitoyen::create(["nom" =>$input['autre_statut_citoyen']]);
        }

        //NOUVEAU SOURCE REVENU
        if(isset($input['autre_source_revenu'] ) and ($request->has('autre_source_revenu')))
        {
            // NEW CREATE PERSONNES PREVUES ACCOMPAGNEMENT
            $nom= SourceRevenu::create(["nom" =>$input['autre_source_revenu']]);
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


        //NOUVELLE source diffusion
        if(isset($input['autre_source'] ) and ($request->has('autre_source')))
        {
            //var_dump($input['autre_attente']);

            //NEW CREATE ATTENTE
            $nom= SourceDiffusion::create(["nom" =>$input['autre_source']]);

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



        //NOTE PRENATAL
        if(! isset($input['notes_prenatal'] ) ){

            $numero_cheque = "";
//dd($input['notes_prenatal']);

            $input['notes_prenatal'] = $numero_cheque;

        }else
            $input['notes_prenatal'] = $request->input('notes_prenatal');


        //raisons_consultation
        if(! isset($input['raisons_consultation'] ) ){

            $numero_cheque = "";


            $input['raisons_consultation'] = $numero_cheque;

        }else
            $input['raisons_consultation'] = $request->input('raisons_consultation');



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
        if(is_null($input['service_connu'] )){



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

        //hopital
        if(! isset($input['hopital'] ) ){

            $m = "";


            $input['hopital'] = $m;

        }else
            $input['hopital'] = $request->input('hopital');


        //type accouchement
        if(! isset($input['type_accouchement'] ) ){

            $m = "";


            $input['type_accouchement'] = $m;

        }else
            $input['type_accouchement'] = $request->input('type_accouchement');


        //commentaire_presence
        if(! isset($input['commentaire_presence'] ) ){

            $m = "";


            $input['commentaire_presence'] = $m;

        }else
            $input['commentaire_presence'] = $request->input('commentaire_presence');

        //cours_prenatal
        if(isset($input['cours_prenatal']) == 1){

            $input['cours_prenatal'] = 1;
        }else
        {

            $input['cours_prenatal'] = 0;
        }


        //suggestions_donnees
        if(! isset($input['suggestions_donnees'] ) ){

            $m = "";


            $input['suggestions_donnees'] = $m;

        }else
            $input['suggestions_donnees'] = $request->input('suggestions_donnees');


        //sujets_documentations
        if(! isset($input['sujets_documentations'] ) ){

            $m = "";


            $input['sujets_documentations'] = $m;

        }else
            $input['sujets_documentations'] = $request->input('sujets_documentations');



        //duree_consultation
        if(! isset($input['duree_consultation'] ) ){

            $m = "";


            $input['duree_consultation'] = $m;

        }else
            $input['duree_consultation'] = $request->input('duree_consultation');

        //nbr_grossesse
        if(! isset($input['nbr_grossesse'] ) ){

            $m = 0;


            $input['nbr_grossesse'] = $m;

        }else
            $input['nbr_grossesse'] = $request->input('nbr_grossesse');




        //suivi_intervenants
        if(! isset($input['suivi_intervenants'] ) ){

            $m = "";


            $input['suivi_intervenants'] = $m;

        }else
            $input['suivi_intervenants'] = $request->input('suivi_intervenants');


        //SOURCE REVENU ID
        if(! isset($input['source_revenu_id'] ) ){

            $m = 0;


            $input['source_revenu_id'] = $m;

        }else
            $input['source_revenu_id'] = $request->input('source_revenu_id');

        //sippe
        if(! isset($input['sippe'] ) ){

            $m = 0;


            $input['sippe'] = $m;

        }else
            $input['sippe'] = $request->input('sippe');


        //finding it
        $rencontres = Rencontre::where('id', $id)->update([
            "date_demande" =>  $input['date_demande'],
            "annee_fiscale" => $request->input('annee_fiscale'),
            "langue_parlee" => $input['langue_parlee'],
            "statut_citoyen" => $request->input('statut_citoyen'),
            "pays_origine" => $input['pays_origine'],
            "hopital" => $request->input('hopital'),
            "personnes_prevues_accouchement" =>  $input['personnes_prevues_accouchement'],
            "commentaire_presence" =>  $input['commentaire_presence'],
            "cours_prenatal" =>  $input['cours_prenatal'],
            "type_accouchement" => $input['type_accouchement'],
            "conjoint_prenom" => $input['conjoint_prenom'],
            "conjoint_nom" => $input['conjoint_nom'],
            "conjoint_occupation" => $input['conjoint_occupation'],
            "courriel_conjoint" => $input['courriel_conjoint'],
            "notes_prenatal" => $input['notes_prenatal'],
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
            "raisons_consultation" => $input['raisons_consultation'],
            "suggestions_donnees" => $input['suggestions_donnees'],
            "conditions_particulieres" => $input['conditions_particulieres'],
            "sujets_documentations" => $input['sujets_documentations'],
            "duree_consultation" => $input['duree_consultation'],
            "references_donnees" => $input['references_donnees'],
            "conjoint_absent_pays" => $input['conjoint_absent_pays'],
            "conjoint_absent_accouchement" => $input['conjoint_absent_accouchement'],
            "nbr_grossesse" => $request->input('nbr_grossesse'),
            "cercle" => $input['cercle'],
            "suivi_intervenants"  => $input['suivi_intervenants'],
            "source_revenu_id" => $input['source_revenu_id'],
            //"don_montant" => $input['don_montant'],
            //"don_numero_recu" => $input['don_numero_recu'],
            //"don_type_paiement" => $input['don_type_paiement'],
            //"notes_accompagnement" => $input['notes_accompagnement'],
            "notes_generales" => $input['notes_generales'],
            "accepter_contact_an" => $request->input('accepter_contact_an'),
            "accepter_contact_organisme" => $request->input('accepter_contact_organisme'),
            "accepter_statistiques" => $request->input('accepter_statistiques'),
            "statut_dossier" => $request->input('statut_dossier'),
            //"date_naissance_bebe" => $input['date_naissance_bebe'],
        ]);

        return back()->withInput();
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
        $rencontre= Rencontre::findOrFail($id);
        $rencontre->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/rencontre');
    }
}
