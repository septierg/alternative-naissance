<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatutAccompagnantes;
use Illuminate\Support\Facades\Session;

class StatutAccompagnantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statutAccompagnantes= StatutAccompagnantes::all();
        return view ('admin.statut_accompagnantes.index', compact('statutAccompagnantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.statut_accompagnantes.create');
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
        StatutAccompagnantes::create($request->all());
        return redirect('/admin/statut_accompagnante');
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
        $statutAccompagnantes= StatutAccompagnantes::findOrFail($id);
        return view('admin.statut_accompagnantes.edit', compact('statutAccompagnantes'));
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
        StatutAccompagnantes::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/statut_accompagnante');
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
        $statutAccompagnantes= StatutAccompagnantes::findOrFail($id);
        $statutAccompagnantes->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/statut_accompagnante');
    }
}
