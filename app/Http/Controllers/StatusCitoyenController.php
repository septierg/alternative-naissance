<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusCitoyen;
use Illuminate\Support\Facades\Session;

class StatusCitoyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statuscitoyen = StatusCitoyen::all();
        //dd($statuscitoyen);

        return view ('admin.status_citoyen.index', compact('statuscitoyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.status_citoyen.create');
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
        StatusCitoyen::create($request->all());
        return redirect('/admin/statut_citoyen');
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
        $statuscitoyen = StatusCitoyen::findOrFail($id);
        return view('admin.status_citoyen.edit', compact('statuscitoyen'));
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
        StatusCitoyen::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/statut_citoyen');
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
        $statuscitoyen = StatusCitoyen::findOrFail($id);
        $statuscitoyen->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/statut_citoyen');
    }
}
