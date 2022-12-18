<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferencesDonnees;
use Illuminate\Support\Facades\Session;

class ReferenceDonneesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $referenceDonnees = ReferencesDonnees::all();
        return view ('admin.reference_donnees.index',compact('referenceDonnees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.reference_donnees.create');
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
        ReferencesDonnees::create($request->all());
        return redirect('/admin/references_donnees');
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
        $referenceDonnees= ReferencesDonnees::findOrFail($id);
        return view('admin.reference_donnees.edit', compact('referenceDonnees'));
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
        ReferencesDonnees::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/references_donnees');


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
        $referenceDonnees= ReferencesDonnees::findOrFail($id);
        $referenceDonnees->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/references_donnees');
    }
}
