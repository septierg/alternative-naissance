<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatutMembre;
use Illuminate\Support\Facades\Session;

class StatutMembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statutMembre = StatutMembre::all();
        return view ('admin.statut_membre.index', compact('statutMembre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.statut_membre.create');
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
        StatutMembre::create($request->all());
        return redirect('/admin/statut_membre');
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
        $statutMembre = StatutMembre::findOrFail($id);
        return view('admin.statut_membre.edit', compact('statutMembre'));
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
        StatutMembre::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/statut_membre');
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
        $statutMembre = StatutMembre::findOrFail($id);
        $statutMembre->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/statut_membre');
    }
}
