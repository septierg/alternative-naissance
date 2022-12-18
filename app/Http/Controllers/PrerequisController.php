<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Prerequis;
use Illuminate\Support\Facades\Session;

class PrerequisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prerequis = Prerequis::all();

        return view ('admin.prerequis.index', compact('prerequis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.prerequis.create');
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
        Prerequis::create($request->all());
        return redirect('/admin/prerequis');
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
        $prerequis = Prerequis::findOrFail($id);
        //dd($prerequis);
        return view('admin.prerequis.edit', compact('prerequis'));
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
        $input=$request->all();
        //dd($input);
        $prerequis = Prerequis::where('id', $id)->update([
            "nom_fr" =>$input['nom_fr'],

        ]);
        return redirect('/admin/prerequis');
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
        $prerequis = Prerequis::findOrFail($id);
        //dd($prerequis);
        $prerequis->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/prerequis');


    }
}
