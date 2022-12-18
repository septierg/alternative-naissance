<?php

namespace App\Http\Controllers;

use App\Models\AccouchementPersonnesPrevues;
use App\Models\PreoccupationsAccouchement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PreoccupationsAccouchementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $preoccupationsAccouchement= PreoccupationsAccouchement::all();
        return view ('admin.preoccupations_accouchement.index', compact('preoccupationsAccouchement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.preoccupations_accouchement.create');
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
        PreoccupationsAccouchement::create($request->all());
        return redirect('/admin/preoccupations_accouchement');
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
        $preoccupationsAccouchement = PreoccupationsAccouchement::findOrFail($id);
        return view('admin.preoccupations_accouchement.edit', compact('preoccupationsAccouchement'));
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
        PreoccupationsAccouchement::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/preoccupations_accouchement');
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
        $preoccupationsAccouchement = PreoccupationsAccouchement::findOrFail($id);
        $preoccupationsAccouchement->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/preoccupations_accouchement');
    }
}
