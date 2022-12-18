<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LieuxFormation;
use Illuminate\Support\Facades\Session;

class LieuxFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lieuxformation = LieuxFormation::all();
        return view ('admin.lieux_formation.index', compact('lieuxformation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lieux_formation.create');
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
        LieuxFormation::create($request->all());
        return redirect('/admin/lieux_formation');
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
        $lieuxformation = LieuxFormation::findOrFail($id);
        return view('admin.lieux_formation.edit', compact('lieuxformation'));
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
        $lieuxformation= LieuxFormation::where('id', $id)->update([
        "nom" =>$input['nom'],

    ]);
        return redirect('/admin/lieux_formation');
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
        $lieuxformation = LieuxFormation::findOrFail($id);
        //dd($prerequis);
        $lieuxformation->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/lieux_formation');
    }
}
