<?php

namespace App\Http\Controllers;

use App\Models\Accompagnement;
use Illuminate\Http\Request;
use App\Models\Inscriptions_formations;
use Illuminate\Support\Facades\DB;

class InscriptionsFormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($id);
        $inscriptions_formations1 = Inscriptions_formations::all();
        //dd($inscriptions_formations1);
        $inscriptions_formations = DB::table('inscriptions_formations')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'inscriptions_formations.uid')
            ->select('inscrits.nom','inscrits.prenom', 'inscrits.courriel','inscriptions_formations.*')
            ->where('formation_id', $id)
            ->orderBy('date_inscription','asc')
            ->orderBy('prenom','asc')
            ->get();


        //dd($inscriptions_formations);
        if (count($inscriptions_formations) > 0){

            $fetchUserData = $inscriptions_formations;
            echo json_encode(array('success' => 1, 'data' => $fetchUserData));

        }
        else {
            echo json_encode(array('success' => 0));
        }
    }

    public function edit_list_formation($id,$courriel){
        $inscriptions_formations = DB::table('inscriptions_formations')
            ->leftJoin('inscrits', 'inscrits.uid', '=', 'inscriptions_formations.uid')
            ->select('inscrits.nom','inscrits.prenom', 'inscrits.courriel','inscriptions_formations.*')
            ->where('inscriptions_formations.id', $id)
            ->get();

        //dd($inscriptions_formations);
        return view('admin.inscriptions_formation.edit',compact('inscriptions_formations'));


        if (count($inscriptions_formations) > 0){

            $fetchUserData = $inscriptions_formations;
            echo json_encode(array('success' => 1, 'data' => $fetchUserData));

        }
        else {
            echo json_encode(array('success' => 0));
        }
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
        $input= $request->all();
        //dd($input);

        //format some column

        //prix
        if(! isset($input['prix_formation'] ) ){

            $m = 0;


            $input['prix_formation'] = $m;

        }
        else{
            $input['prix_formation'] = $request->input('prix_formation');

        }

        //formation
        if(! isset($input['formation_gratuite'] ) ){

            $m = 0;


            $input['formation_gratuite'] = $m;

        }
        else{
            $input['formation_gratuite'] = $request->input('formation_gratuite');

        }

        //paiement complet
        if(! isset($input['paiement_complet'] ) ){

            $m = 0.00;


            $input['paiement_complet'] = $m;

        }
        else{
            $input['paiement_complet'] = $request->input('paiement_complet');

        }

        //type paiement complet
        if(! isset($input['type_paiement_complet'] ) ){

            $m = "aucun";


            $input['type_paiement_complet'] = $m;

        }
        else{
            $input['type_paiement_complet'] = $request->input('type_paiement_complet');

        }

        //date_paiement_complet
        if(! isset($input['date_paiement_complet'] ) ){

            $m = "2000-01-01";


            $input['date_paiement_complet'] = $m;

        }
        else{
            $input['date_paiement_complet'] = $request->input('date_paiement_complet');

        }

        //balance
        if(! isset($input['balance'] ) ){

            $m = 0.00;


            $input['balance'] = $m;

        }
        else{
            $input['balance'] = $request->input('balance');

        }

        //date_depot
        if(! isset($input['date_depot'] ) ){

            $m = "2000-01-01";


            $input['date_depot'] = $m;

        }
        else{
            $input['date_depot'] = $request->input('date_depot');

        }

        //type_paiement_depot
        if(! isset($input['type_paiement_depot'] ) ){

            $m = "aucun";


            $input['type_paiement_depot'] = $m;

        }
        else{
            $input['type_paiement_depot'] = $request->input('type_paiement_depot');

        }

        //type_paiement_balance
        if(! isset($input['type_paiement_balance'] ) ){

            $m = "aucun";


            $input['type_paiement_balance'] = $m;

        }
        else{
            $input['type_paiement_balance'] = $request->input('type_paiement_balance');

        }

        //date_balance
        if(! isset($input['date_balance'] ) ){

            $m = "2000-01-01";


            $input['date_balance'] = $m;

        }
        else{
            $input['date_balance'] = $request->input('date_balance');

        }

        //depot_non_remboursable
        if(! isset($input['depot_non_remboursable'] ) ){

            $m = 1;


            $input['depot_non_remboursable'] = $m;

        }
        else{
            $input['depot_non_remboursable'] = $request->input('depot_non_remboursable');

        }

        //non_remboursable_24h
        if(! isset($input['non_remboursable_24h'] ) ){

            $m = 1;


            $input['non_remboursable_24h'] = $m;

        }
        else{
            $input['non_remboursable_24h'] = $request->input('non_remboursable_24h');

        }


        //formation_allaitement
        if(! isset($input['formation_allaitement'] ) ){

            $m = "aucun";


            $input['formation_allaitement'] = $m;

        }
        else{
            $input['formation_allaitement'] = $request->input('formation_allaitement');

        }

        //si_non_pourquoi
        if(! isset($input['si_non_pourquoi'] ) ){

            $numero_cheque = "";

            $input['si_non_pourquoi'] = $numero_cheque;

        }else
            $input['si_non_pourquoi'] = $request->input('si_non_pourquoi');

        //formation_accompagnante_completee
        if(! isset($input['formation_accompagnante_completee'] ) ){

            $m = 1;


            $input['formation_accompagnante_completee'] = $m;

        }
        else{
            $input['formation_accompagnante_completee'] = $request->input('formation_accompagnante_completee');

        }

        //si_oui_lieu_id
        if(! isset($input['si_oui_lieu_id'] ) ){

            $m = 0;


            $input['si_oui_lieu_id'] = $m;

        }
        else{
            $input['si_oui_lieu_id'] = $request->input('si_oui_lieu_id');

        }

        //autre_lieu1
        if(! isset($input['autre_lieu1'] ) ){

            $m = "aucun";


            $input['autre_lieu1'] = $m;

        }
        else{
            $input['autre_lieu1'] = $request->input('autre_lieu1');

        }

        //inscrite_formation_accompagnante
        if(! isset($input['inscrite_formation_accompagnante'] ) ){

            $m = 0;


            $input['inscrite_formation_accompagnante'] = $m;

        }
        else{
            $input['inscrite_formation_accompagnante'] = $request->input('inscrite_formation_accompagnante');

        }

        //formation_relevaille_completee
        if(! isset($input['formation_relevaille_completee'] ) ){

            $m = 0;


            $input['formation_relevaille_completee'] = $m;

        }
        else{
            $input['formation_relevaille_completee'] = $request->input('formation_relevaille_completee');

        }

        //si_oui_lieu_id2
        if(! isset($input['si_oui_lieu_id2'] ) ){

            $m = 0;


            $input['si_oui_lieu_id2'] = $m;

        }
        else{
            $input['si_oui_lieu_id2'] = $request->input('si_oui_lieu_id2');

        }

        //autre_lieu2
        if(! isset($input['autre_lieu2'] ) ){

            $m = "aucun";


            $input['autre_lieu2'] = $m;

        }
        else{
            $input['autre_lieu2'] = $request->input('autre_lieu2');

        }

        //inscrite_relevailles
        if(! isset($input['inscrite_relevailles'] ) ){

            $m = 0;


            $input['inscrite_relevailles'] = $m;

        }
        else{
            $input['inscrite_relevailles'] = $request->input('inscrite_relevailles');

        }

        //dpa
        if(! isset($input['dpa'] ) ){

            $m = "2000-01-01";


            $input['dpa'] = $m;

        }
        else{
            $input['dpa'] = $request->input('dpa');

        }

        //nombre_adultes_prenat
        if(! isset($input['nombre_adultes_prenat'] ) ){

            $m = 0;


            $input['nombre_adultes_prenat'] = $m;

        }
        else{
            $input['nombre_adultes_prenat'] = $request->input('nombre_adultes_prenat');

        }

        //date_naissance
        if(! isset($input['date_naissance'] ) ){

            $m = "2000-01-01";


            $input['date_naissance'] = $m;

        }
        else{
            $input['date_naissance'] = $request->input('date_naissance');

        }

        //nombre_adultes_massage
        if(! isset($input['nombre_adultes_massage'] ) ){

            $m = 0;


            $input['nombre_adultes_massage'] = $m;

        }
        else{
            $input['nombre_adultes_massage'] = $request->input('nombre_adultes_massage');

        }

        //sippe
        if(! isset($input['sippe'] ) ){

            $m = 0;


            $input['sippe'] = $m;

        }
        else{
            $input['sippe'] = $request->input('sippe');

        }

        //pae
        if(! isset($input['pae'] ) ){

            $m = 0;


            $input['pae'] = $m;

        }
        else{
            $input['pae'] = $request->input('pae');

        }

        //pae_clsc_id
        if(! isset($input['pae_clsc_id'] ) ){

            $m = "aucun";


            $input['pae_clsc_id'] = $m;

        }
        else{
            $input['pae_clsc_id'] = $request->input('pae_clsc_id');

        }

        //notes_accompagnement
        if(! isset($input['notes_accompagnement'] ) ){

            $numero_cheque = "";

            $input['notes_accompagnement'] = $numero_cheque;

        }else
            $input['notes_accompagnement'] = $request->input('notes_accompagnement');


        $inscriptions_formations = Inscriptions_formations::where('id', $id)->update([
            //"prix_formation" =>$input['prix_formation'],
            "formation_gratuite" => $request->input('formation_gratuite'),
            "paiement_complet" => $input['paiement_complet'],
            "type_paiement_complet" => $request->input('type_paiement_complet'),
            "date_paiement_complet" => $input['date_paiement_complet'],
            "balance" => $input['balance'],
            "date_depot" => $input['date_depot'],
            "type_paiement_depot" => $input['type_paiement_depot'],
            "type_paiement_balance" => $input['type_paiement_balance'],
            "date_balance" => $input['date_balance'],
            "depot_non_remboursable" => $input['depot_non_remboursable'],
            "non_remboursable_24h" => $input['non_remboursable_24h'],
            "formation_allaitement" => $input['formation_allaitement'],
            "si_non_pourquoi" => $input['si_non_pourquoi'],
            "formation_accompagnante_completee"  => $input['formation_accompagnante_completee'],
            "si_oui_lieu_id" => $request->input('si_oui_lieu_id'),
            //"autre_lieu1" => $request->input('autre_lieu1'),
            "inscrite_formation_accompagnante" => $input['inscrite_formation_accompagnante'],
            "formation_relevaille_completee" => $input['formation_relevaille_completee'],
            "si_oui_lieu_id2" => $input['si_oui_lieu_id2'],
            //"autre_lieu2" => $input['autre_lieu2'],
            "inscrite_relevailles" =>  $input['inscrite_relevailles'],
            "dpa" => $input['dpa'],
            "nombre_adultes_prenat" => $input['nombre_adultes_prenat'],
            "date_naissance" => $input['date_naissance'],
            "nombre_adultes_massage" => $input['nombre_adultes_massage'],
            "sippe"  => $input['sippe'],
            "pae" => $input['pae'],
            "pae_clsc_id" => $input['pae_clsc_id'],
            "notes" => $input['notes_accompagnement'],
        ]);

        return back()->withInput();



    }
    public function update_list_formation($id){
        $inscriptions_formations = DB::table('inscriptions_formations')
            ->where('id', $id)
            ->get();

        dd($inscriptions_formations);

        return view('admin.inscriptions_formation.edit',compact('inscriptions_formations'));

        // dd($inscriptions_formations);
        if (count($inscriptions_formations) > 0){

            $fetchUserData = $inscriptions_formations;
            echo json_encode(array('success' => 1, 'data' => $fetchUserData));

        }
        else {
            echo json_encode(array('success' => 0));
        }
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
