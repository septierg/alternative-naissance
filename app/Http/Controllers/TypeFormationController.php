<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Prerequis;
use App\Models\TypeFormation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TypeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$type_formations= TypeFormation::all();
        //dd($type_formations);
        $type_formations = DB::table('type_formations')
            ->orderBy('nom_fr','asc')
            ->get();
        return view('admin.type_formation.index',compact('type_formations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prerequis = Prerequis::all();
        return view('admin.type_formation.create',compact('prerequis'));
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
        $name='';
        //check if the request as a file
        if($file= $request->file('visuel_last')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);

        }
            //nom fr
            if($input['nom_fr']){

                $input['nom_fr'] = $request->input('nom_fr');

            }

            //texte fr
            if($input['texte_fr'] ){

                $input['texte_fr'] = $request->input('texte_fr');
            }


            //ordre
            if(! isset($input['ordre'])  ){

                $input['ordre'] =  1;

            }else
                $input['ordre'] = 2;


            //visual fr (photo)
            if(! isset($input['visuel_fr'])  ){

                $input['visuel_fr'] =  "aucun";

            }else
                $input['visuel_fr'] = $request->file('visuel_fr');


            //actif
            if(! isset($input['actif'])  ){

                $input['actif'] =  1;

            }else
                $input['actif'] = 2;


        if(! isset($input['nom_en']) ){

            $input['nom_en'] =  "aucun";

        }else
            $input['nom_en'] = $request->input('nom_en');


        //texte en
        if(! isset($input['texte_en'])  ){

            $input['texte_en'] =  "aucun";

        }else
            $input['texte_en'] = $request->input('texte_en');


        //prerequis
        if( isset($input['prerequis']) ){

            if($input['prerequis'] == "Aucun"){
                $input['prerequis'] = 0;
            }

        }else
            $input['prerequis'] = $request->input('prerequis');



        //prerequis id

            $input['prerequis_lecture_id'] = $request->input('prerequis_lecture_id');




        DB::table('type_formations')->insert([
                "nom_fr" =>                 $input['nom_fr'],
                "nom_en" =>                 $input['nom_en'],
                "texte_en" =>               $input['texte_en'],
                "visuel" =>                 $name,
                "texte_fr" =>               $input['texte_fr'],
                "pdf_fr" =>                 $name,
                "pdf_en" =>                 $name,
                "actif" =>                  $input['actif'],
                "ordre" =>                  $input['ordre'],
                "prerequis_lecture_id" =>   $input['prerequis_lecture_id'] ,
                "created_at"      => Carbon::now(),
                "updated_at"             => Carbon::now(),

            ]);

        return redirect('/admin/type_formation');


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
        $type_formations = DB::table('type_formations')
            ->where('type_formations.id', $id)
            ->first();

        $prerequis = Prerequis::all();

        //dd($type_formations);
        return view('admin.type_formation.edit', compact('type_formations','prerequis'));
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
        $type_formations = TypeFormation::findOrFail($id);
        $input=$request->all();
        //dd($input);
        //check if the request as a file
        if($file= $request->file('visuel_fr')){



            //nom fr
            if($input['nom_fr']){

                $input['nom_fr'] = $request->input('nom_fr');

            }

            //texte fr
            if($input['texte_fr'] ){

                $input['texte_fr'] = $request->input('texte_fr');
            }


            //ordre
            if(! isset($input['ordre'])  ){

                $input['ordre'] =  1;

            }else
                $input['ordre'] = 2;


            //visual fr (photo)
            if(! isset($input['visuel_fr'])  ){

                $input['visuel_fr'] =  "aucun";

            }else
                $input['visuel_fr'] = $request->file('visuel_fr');



            //actif
            if(! isset($input['actif'])  ){

                $input['actif'] =  1;

            }else
                $input['actif'] = 2;


            $name= time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);


            //prerequis id

            $input['prerequis_lecture_id'] = $request->input('prerequis_lecture_id');


            $type_formations = TypeFormation::where('id', $id)->update([
                "nom_fr" =>                 $input['nom_fr'],
                "texte_fr" =>               $input['texte_fr'],
                "pdf_fr" =>                 $name,
                "prerequis_lecture_id" =>   $input['prerequis_lecture_id'] ,
                "actif" =>                  $input['actif'],
                "ordre" =>                  $input['ordre'],

            ]);

            return back()->withInput();
            $type_formations->update($input);
            return redirect('/admin/type_formation');
        }





        //en
        if($file= $request->file('visuel_en')){

            //nom en
            if(! isset($input['nom_en']) ){

                $input['nom_en'] =  "aucun";

            }else
                $input['nom_en'] = $request->input('nom_en');


            //texte en
            if(! isset($input['texte_en'])  ){

                $input['texte_en'] =  "aucun";

            }else
                $input['texte_en'] = $request->input('texte_en');


            //ordre
            if(! isset($input['ordre'])  ){

                $input['ordre'] =  1;

            }else
                $input['ordre'] = 2;


            //visual en (photo)
            if(! isset($input['visuel_en'])  ){

                $input['visuel_en'] =  "aucun";

            }else
                $input['visuel_en'] = $request->file('visuel_en');


            $name= time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);


            $input['visuel_en'] = $photo->id;


            $type_formations = TypeFormation::where('id', $id)->update([
                "nom_en" =>                 $input['nom_en'],
                "texte_en" =>               $request->input('texte_en'),
                "pdf_en" =>                 $name,
                "actif" =>                  $input['actif'],
                "ordre" =>                  $input['ordre'],

            ]);

            return back()->withInput();
            $type_formations->update($input);
            return redirect('/admin/type_formation');
        }





        //check if the request as a file
        if($file= $request->file('visuel_last')){

            //prerequis
            if( isset($input['prerequis']) ){

                if($input['prerequis'] == "Aucun"){
                    $input['prerequis'] = 0;
                }

            }else
                $input['prerequis'] = $request->input('prerequis');


            //visual en (photo)
            if(! isset($input['visuel_last'])  ){

                $input['visuel_last'] =  "aucun";

            }else
                $input['visuel_last'] = $request->file('visuel_last');


            $file= $request->file('visuel_last');

            $name= time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);
            $input['visuel_last'] = $photo->id;

            $type_formations = TypeFormation::where('id', $id)->update([
                "prerequis_lecture_id" =>   $input['prerequis_lecture_id'] ,
                "visuel" =>                 $name,

            ]);

            return back()->withInput();

        }

        //DATA TO SAVE IF NOT FILE


        //nom fr
        if($input['nom_fr']){

            $input['nom_fr'] = $request->input('nom_fr');

        }
        //texte fr
        if($input['texte_fr'] ){

            $input['texte_fr'] = $request->input('texte_fr');
        }

        //prerequis
        if( isset($input['prerequis']) ){

            if($input['prerequis'] == "Aucun"){
                $input['prerequis'] = 0;
            }

        }else
            $input['prerequis'] = $request->input('prerequis');

        //actif
        if(! isset($input['actif'])  ){

            $input['actif'] =  1;

        }else
            $input['actif'] = 2;


        $type_formations = TypeFormation::where('id', $id)->update([
            "nom_fr" =>                 $input['nom_fr'],
            "texte_fr" =>               $input['texte_fr'],
            "prerequis_lecture_id" =>   $input['prerequis_lecture_id'] ,
            "actif" =>                  $input['actif'],

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
        $type_formations = TypeFormation::findOrFail($id);
        $type_formations->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/type_formation');
    }
}
