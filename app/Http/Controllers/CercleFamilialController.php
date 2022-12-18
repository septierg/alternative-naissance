<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CercleFamilial;
use Illuminate\Support\Facades\Session;

class CercleFamilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cercleFamilial = CercleFamilial::all();
        return view ('admin.cercle_familial.index', compact('cercleFamilial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cercle_familial.create');
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
        CercleFamilial::create($request->all());
        return redirect('/admin/cercle_familial');
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

        $cercleFamilial = CercleFamilial::findOrFail($id);
        return view('admin.cercle_familial.edit', compact('cercleFamilial'));
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
        CercleFamilial::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/cercle_familial');
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
        $cercleFamilial = CercleFamilial::findOrFail($id);
        $cercleFamilial->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/cercle_familial');
    }
}
