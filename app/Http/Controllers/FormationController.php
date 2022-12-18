<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Photo;
use App\Models\TypeFormation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //FORMATION'S TYPES
        $type_formations = DB::table('type_formations')
            //->select('type_formations.nom_fr')
            //->leftJoin('inscriptions_formations', 'inscriptions_formations.type_formation_id', '=', 'type_formation.id')
            ->orderBy('nom_fr','asc')
            ->get();


        //FORMATION'S TYPES(nom_fr)
        $type_formations_nom = DB::table('type_formations')
            ->select('type_formations.nom_fr')
            //->leftJoin('inscriptions_formations', 'inscriptions_formations.type_formation_id', '=', 'type_formation.id')
            ->orderBy('nom_fr','asc')
            ->get()
            ->toArray();


        //creating array of all the formation type
        $array_type_formations = [];

        //creating array with number of formation in it
        $array_nbr_formations = [];

        $array = [];

        // FOR EACH FORMATION CATEGORIE, GIVE ME THE NUMBER OF FORMATION, FOR THOSE FORMATION HOW MANY PERSON WILL BE THERE
        foreach ($type_formations as $t) {


            $nbr_formation_par_type = DB::table('formations')->where("formation_id",$t->id)->count();

            $array[] = $t->id;
            $array_nbr_formations[] = $nbr_formation_par_type;

            $formations= DB::select(" SELECT * FROM `formations` WHERE formation_id= $t->id ORDER BY nom_fr ASC;");


        }


        //TYPE FORMATIONS NOM INTO ARRAY
        foreach ($type_formations_nom as $t){

            //echo $t->nom_fr;
            $array_type_formations[] = $t->nom_fr;
        }


        //dd($array);
        return view('admin.formation.index',compact('array_type_formations', 'array_nbr_formations','type_formations_nom','array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = DB::table('formations')
            ->get();
        //dd($formations);

        $annéefiscale = DB::table('annee_fiscale')
            ->get();
        $accompagnantes = DB::table('accompagnantes')
            ->orderBy('prenom','asc')
            ->orderBy('nom','asc')
            ->get();
        $type_formations = DB::table('type_formations')
            //->select('type_formations.nom_fr')
            //->leftJoin('inscriptions_formations', 'inscriptions_formations.type_formation_id', '=', 'type_formation.id')
            ->orderBy('nom_fr','asc')
            ->get();

        return view('admin.formation.create',compact('formations','type_formations','annéefiscale','accompagnantes'));
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
        //
        $input=$request->all();
        //var_dump($input['formation_id']);
        //dd($request->all());
        //Formation::create($request->all());
        $nom_formatrice_1= '';
        $nom_formatrice_2= '';
        $nom_formatrice_3= '';
        $name='';
       // Formation::create([$input]);
        //check if the request as a file
        if($file= $request->file('visuel_fr')){


            $name= time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);

            //dd($request->all());
        }
//dd($input);
        //nom_fr
        if($input['nom_fr']){

            $input['nom_fr'] = $request->input('nom_fr');

        }

        //formation_id
        if($input['formation_id']){

            $input['formation_id'] = $request->input('formation_id');
            $input['formation_id'] = intval($input['formation_id']);
        }

        //annee_fiscale_id
        if($input['annee_fiscale_id'] ){

            $input['annee_fiscale_id'] = $request->input('annee_fiscale_id');
        }

        //langue_formation
        if($input['langue_formation'] ){

            $input['langue_formation'] = $request->input('langue_formation');
        }

        //date_fr
        if($input['date_fr']){

            $input['date_fr'] = $request->input('date_fr');

        }

        //prix_total
        if($input['prix_total']){

            $input['prix_total'] = $request->input('prix_total');

        }
        //paypal_surplus_total
        if($input['paypal_surplus_total']){

            $input['paypal_surplus_total'] = $request->input('paypal_surplus_total');

        }
        //prix_depot
        if($input['prix_depot']){

            $input['prix_depot'] = $request->input('prix_depot');

        }
        //paypal_surplus_depot
        if($input['paypal_surplus_depot']){

            $input['paypal_surplus_depot'] = $request->input('paypal_surplus_depot');

        }
        //prix_balance
        if($input['prix_balance']){

            $input['prix_balance'] = $request->input('prix_balance');

        }
        //paypal_surplus_balance
        if($input['paypal_surplus_balance']){

            $input['paypal_surplus_balance'] = $request->input('paypal_surplus_balance');

        }

        //nbr_places
        if($input['nbr_places']){

            $input['nbr_places'] = $request->input('nbr_places');

        }
        //date_limite
        if($input['date_limite']){

            $input['date_limite'] = $request->input('date_limite');

        }
        //recu_donne
        if(! isset($input['recu_donne'])  ){

            $input['recu_donne'] =  0;

        }else
            $input['recu_donne'] = 1;

        //certificat_donne
        if(! isset($input['certificat_donne'])  ){

            $input['certificat_donne'] =  0;

        }else
            $input['certificat_donne'] = 1;

        //actif
        if($input['actif'] == 0){

            $input['actif'] =  0;

        }else
            $input['actif'] = 1;


        //id_formatrice_1
        if($input['id_formatrice_1'] == 0){

            $input['id_formatrice_1'] = 0;
        }else{

            $my_array= explode("-",$input['id_formatrice_1']);
            //id
            $input['id_formatrice_1'] = $my_array[0];
            //nom formatrice
            $nom_formatrice_1= $my_array[1];
        }

        //id_formatrice_2
        if($input['id_formatrice_2'] == 0){

            $input['id_formatrice_2'] = 0;
        }else{

            $my_array= explode("-",$input['id_formatrice_2']);
            //id
            $input['id_formatrice_2'] = $my_array[0];
            //nom formatrice
            $nom_formatrice_2= $my_array[1];
        }

        //id_formatrice_3
        if($input['id_formatrice_3'] == 0){

            $input['id_formatrice_3'] = 0;
        }else{

            $my_array= explode("-",$input['id_formatrice_3']);
            //id
            $input['id_formatrice_3'] = $my_array[0];
            //nom formatrice
            $nom_formatrice_3= $my_array[1];
        }

        //langue_formation
        if($input['langue_formation'] ){

            $input['langue_formation'] = $request->input('langue_formation');
        }

        //dd($input['formation_id']);
        DB::table('formations')->insert([

            "pdf_fr"            =>  $name,
            "id_formatrice_1"   =>  $input['id_formatrice_1'],
            "id_formatrice_2"   =>  $input['id_formatrice_2'],
            "id_formatrice_3"   =>  $input['id_formatrice_3'],
            "nom_formatrice_1"  =>  $nom_formatrice_1,
            "nom_formatrice_2"  =>  $nom_formatrice_2,
            "nom_formatrice_3"  =>  $nom_formatrice_3,
            "nom_fr"            =>  $input['nom_fr'],
            "formation_id"      =>  $input['formation_id'],
            "annee_fiscale_id"  =>  $input['annee_fiscale_id'],
            "langue_formation"  =>  $input['langue_formation'],
            "date_fr"           => $input['date_fr'],
            "prix_total"        => $input['prix_total'],
            "paypal_surplus_total" => $input['paypal_surplus_total'],
            "prix_depot"            => $input['prix_depot'],
            "paypal_surplus_depot"  => $input['paypal_surplus_depot'],
            "prix_balance"          => $input['prix_balance'],
            "paypal_surplus_balance" => $input['paypal_surplus_balance'],
            "nbr_places"            => $input['nbr_places'],
            "date_limite"           => $input['date_limite'],
            "recu_donne"            => $input['recu_donne'],
            "certificat_donne"      => $input['certificat_donne'],
            "actif"                 => $input['actif'],
            "created_at"      => Carbon::now(),
            "updated_at"             => Carbon::now(),


        ]);
        return redirect('/admin/formation');

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

        //FORMATION

        $formations = DB::table('formations')
            ->where('id', $id)
            ->first();
        //dd($formations);

        $annéefiscale = DB::table('annee_fiscale')
            ->get();
        $accompagnantes = DB::table('accompagnantes')
            ->orderBy('prenom','asc')
            ->orderBy('nom','asc')
            ->get();

        //$type_formations = TypeFormation::all();
        $type_formations = DB::table('type_formations')
            //->select('type_formations.nom_fr')
            //->leftJoin('inscriptions_formations', 'inscriptions_formations.type_formation_id', '=', 'type_formation.id')
            ->orderBy('nom_fr','asc')
            ->get();

        //dd($formations->formation_id);

        return view('admin.formation.edit',compact('formations','type_formations','annéefiscale','accompagnantes'));

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
        $input=$request->all();
        //dd($input);

        $nom_formatrice_1= '';
        $nom_formatrice_2= '';
        $nom_formatrice_3= '';

        //check if the request as a file
        if($file= $request->file('visuel_fr')){

            //visual fr (photo)
            if(! isset($input['visuel_fr'])  ){

                $input['visuel_fr'] =  "aucun";

            }else
                $input['visuel_fr'] = $request->file('visuel_fr');

            //nom_fr
            if($input['nom_fr']){

                $input['nom_fr'] = $request->input('nom_fr');

            }

            //formation_id
            if($input['formation_id']){

                $input['formation_id'] = $request->input('formation_id');

            }

            //annee_fiscale_id
            if($input['annee_fiscale_id'] ){

                $input['annee_fiscale_id'] = $request->input('annee_fiscale_id');
            }

            //langue_formation
            if($input['langue_formation'] ){

                $input['langue_formation'] = $request->input('langue_formation');
            }

            //date_fr
            if($input['date_fr']){

                $input['date_fr'] = $request->input('date_fr');

            }

            //prix_total
            if($input['prix_total']){

                $input['prix_total'] = $request->input('prix_total');

            }
            //paypal_surplus_total
            if($input['paypal_surplus_total']){

                $input['paypal_surplus_total'] = $request->input('paypal_surplus_total');

            }
            //prix_depot
            if($input['prix_depot']){

                $input['prix_depot'] = $request->input('prix_depot');

            }
            //paypal_surplus_depot
            if($input['paypal_surplus_depot']){

                $input['paypal_surplus_depot'] = $request->input('paypal_surplus_depot');

            }
            //prix_balance
            if($input['prix_balance']){

                $input['prix_balance'] = $request->input('prix_balance');

            }
            //paypal_surplus_balance
            if($input['paypal_surplus_balance']){

                $input['paypal_surplus_balance'] = $request->input('paypal_surplus_balance');

            }

            //nbr_places
            if($input['nbr_places']){

                $input['nbr_places'] = $request->input('nbr_places');

            }
            //date_limite
            if($input['date_limite']){

                $input['date_limite'] = $request->input('date_limite');

            }
            //recu_donne
            if(! isset($input['recu_donne'])  ){

                $input['recu_donne'] =  0;

            }else
                $input['recu_donne'] = 1;

            //certificat_donne
            if(! isset($input['certificat_donne'])  ){

                $input['certificat_donne'] =  0;

            }else
                $input['certificat_donne'] = 1;

            //actif
            if($input['actif'] == 0){

                $input['actif'] =  0;

            }else
                $input['actif'] = 1;



            //id_formatrice_1
            if($input['id_formatrice_1'] == 0){

                $input['id_formatrice_1'] = 0;
            }else{

                $my_array= explode("-",$input['id_formatrice_1']);
                //id
                $input['id_formatrice_1'] = $my_array[0];
                //nom formatrice
                $nom_formatrice_1= $my_array[1];
            }


            //id_formatrice_2
            if($input['id_formatrice_2'] == 0){

                $input['id_formatrice_2'] = 0;
            }else{

                $my_array= explode("-",$input['id_formatrice_2']);
                //id
                $input['id_formatrice_2'] = $my_array[0];
                //nom formatrice
                $nom_formatrice_2= $my_array[1];
            }

            //id_formatrice_3
            if($input['id_formatrice_3'] == 0){

                $input['id_formatrice_3'] = 0;
            }else{

                $my_array= explode("-",$input['id_formatrice_3']);
                //id
                $input['id_formatrice_3'] = $my_array[0];
                //nom formatrice
                $nom_formatrice_3= $my_array[1];
            }

            //langue_formation
            if($input['langue_formation'] ){

                $input['langue_formation'] = $request->input('langue_formation');
            }

            $name= time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);


            $input['visuel_fr'] = $photo->id;


            $type_formations = Formation::where('id', $id)->update([
                "pdf_fr"            =>  $name,
                "id_formatrice_1"   =>  $input['id_formatrice_1'],
                "id_formatrice_2"   =>  $input['id_formatrice_2'],
                "id_formatrice_3"   =>  $input['id_formatrice_3'],
                "nom_formatrice_1"  =>  $nom_formatrice_1,
                "nom_formatrice_2"  =>  $nom_formatrice_2,
                "nom_formatrice_3"  =>  $nom_formatrice_3,
                "nom_fr"            =>  $input['nom_fr'],
                "formation_id"      =>  $input['formation_id'],
                "annee_fiscale_id"  =>  $input['annee_fiscale_id'],
                "langue_formation"  =>  $input['langue_formation'],
                "date_fr"           => $input['date_fr'],
                "prix_total"        => $input['prix_total'],
                "paypal_surplus_total" => $input['paypal_surplus_total'],
                "prix_depot"            => $input['prix_depot'],
                "paypal_surplus_depot"  => $input['paypal_surplus_depot'],
                "prix_balance"          => $input['prix_balance'],
                "paypal_surplus_balance" => $input['paypal_surplus_balance'],
                "nbr_places"            => $input['nbr_places'],
                "date_limite"           => $input['date_limite'],
                "recu_donne"            => $input['recu_donne'],
                "certificat_donne"      => $input['certificat_donne'],
                "actif"                 => $input['actif']
            ]);

            return back()->withInput();
            $type_formations->update($input);
            return redirect('/admin/type_formation');
        }
        //nom_fr
        if($input['nom_fr']){

            $input['nom_fr'] = $request->input('nom_fr');

        }

        //formation_id
        if($input['formation_id']){

            $input['formation_id'] = $request->input('formation_id');

        }

        //annee_fiscale_id
        if($input['annee_fiscale_id'] ){

            $input['annee_fiscale_id'] = $request->input('annee_fiscale_id');
        }

        //langue_formation
        if($input['langue_formation'] ){

            $input['langue_formation'] = $request->input('langue_formation');
        }

        //date_fr
        if($input['date_fr']){

            $input['date_fr'] = $request->input('date_fr');

        }



        //prix_total
        if($input['prix_total']){

            $input['prix_total'] = $request->input('prix_total');

        }
        //paypal_surplus_total
        if($input['paypal_surplus_total']){

            $input['paypal_surplus_total'] = $request->input('paypal_surplus_total');

        }
        //prix_depot
        if($input['prix_depot']){

            $input['prix_depot'] = $request->input('prix_depot');

        }
        //paypal_surplus_depot
        if($input['paypal_surplus_depot']){

            $input['paypal_surplus_depot'] = $request->input('paypal_surplus_depot');

        }
        //prix_balance
        if($input['prix_balance']){

            $input['prix_balance'] = $request->input('prix_balance');

        }
        //paypal_surplus_balance
        if($input['paypal_surplus_balance']){

            $input['paypal_surplus_balance'] = $request->input('paypal_surplus_balance');

        }

        //nbr_places
        if($input['nbr_places']){

            $input['nbr_places'] = $request->input('nbr_places');

        }
        //date_limite
        if($input['date_limite']){

            $input['date_limite'] = $request->input('date_limite');

        }
        //recu_donne
        if(! isset($input['recu_donne'])  ){

            $input['recu_donne'] =  0;

        }else
            $input['recu_donne'] = 1;

        //certificat_donne
        if(! isset($input['certificat_donne'])  ){

            $input['certificat_donne'] =  0;

        }else
            $input['certificat_donne'] = 1;

        //actif
        if($input['actif'] == 0){

            $input['actif'] =  0;

        }else
            $input['actif'] = 1;



        //id_formatrice_1
        if($input['id_formatrice_1'] == 0){

            $input['id_formatrice_1'] = 0;
        }else{

            $my_array= explode("-",$input['id_formatrice_1']);
            //id
            $input['id_formatrice_1'] = $my_array[0];
            //nom formatrice
            $nom_formatrice_1= $my_array[1];
        }


        //id_formatrice_2
        if($input['id_formatrice_2'] == 0){

            $input['id_formatrice_2'] = 0;
        }else{

            $my_array= explode("-",$input['id_formatrice_2']);
            //id
            $input['id_formatrice_2'] = $my_array[0];
            //nom formatrice
            $nom_formatrice_2= $my_array[1];
        }

        //id_formatrice_3
        if($input['id_formatrice_3'] == 0){

            $input['id_formatrice_3'] = 0;
        }else{

            $my_array= explode("-",$input['id_formatrice_3']);
            //id
            $input['id_formatrice_3'] = $my_array[0];
            //nom formatrice
            $nom_formatrice_3= $my_array[1];
        }

        //langue_formation
        if($input['langue_formation'] ){

            $input['langue_formation'] = $request->input('langue_formation');
        }

        $formations = Formation::where('id', $id)->update([

            "id_formatrice_1"   =>  $input['id_formatrice_1'],
            "id_formatrice_2"   =>  $input['id_formatrice_2'],
            "id_formatrice_3"   =>  $input['id_formatrice_3'],
            "nom_formatrice_1"  =>  $nom_formatrice_1,
            "nom_formatrice_2"  =>  $nom_formatrice_2,
            "nom_formatrice_3"  =>  $nom_formatrice_3,
            "nom_fr"            =>  $input['nom_fr'],
            "formation_id"      =>  $input['formation_id'],
            "annee_fiscale_id"  =>  $input['annee_fiscale_id'],
            "langue_formation"  =>  $input['langue_formation'],
            "date_fr"           => $input['date_fr'],
            "prix_total"        => $input['prix_total'],
            "paypal_surplus_total" => $input['paypal_surplus_total'],
            "prix_depot"            => $input['prix_depot'],
            "paypal_surplus_depot"  => $input['paypal_surplus_depot'],
            "prix_balance"          => $input['prix_balance'],
            "paypal_surplus_balance" => $input['paypal_surplus_balance'],
            "nbr_places"            => $input['nbr_places'],
            "date_limite"           => $input['date_limite'],
            "recu_donne"            => $input['recu_donne'],
            "certificat_donne"      => $input['certificat_donne'],
            "actif"                 => $input['actif']


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
    }
}
