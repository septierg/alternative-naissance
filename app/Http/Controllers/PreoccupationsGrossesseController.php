<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreoccupationsGrossesses;
use Illuminate\Support\Facades\Session;

class PreoccupationsGrossesseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $preocuppationsGrossesse= PreoccupationsGrossesses::all();
        return view ('admin.preoccupations_grossesse.index', compact('preocuppationsGrossesse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.preoccupations_grossesse.create');
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
        PreoccupationsGrossesses::create($request->all());
        return redirect('/admin/preoccupations_grossesse');
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
        $preocuppationsGrossesse = PreoccupationsGrossesses::findOrFail($id);
        return view('admin.preoccupations_grossesse.edit', compact('preocuppationsGrossesse'));
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
        PreoccupationsGrossesses::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/preoccupations_grossesse');
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
        $preocuppationsGrossesse = PreoccupationsGrossesses::findOrFail($id);
        //dd($prerequis);
        $preocuppationsGrossesse->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/preoccupations_grossesse');
    }
}
