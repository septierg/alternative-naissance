<?php

namespace App\Http\Controllers;

use App\Models\SourceRevenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SourceRevenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $source_revenu = SourceRevenu::all();
        //dd($statuscitoyen);

        return view ('admin.source_revenu.index', compact('source_revenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.source_revenu.create');
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
        SourceRevenu::create($request->all());
        return redirect('/admin/source_revenu');
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
        $source_revenu = SourceRevenu::findOrFail($id);
        return view('admin.source_revenu.edit', compact('source_revenu'));
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
        SourceRevenu::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/source_revenu');
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
        $source_revenu = SourceRevenu::findOrFail($id);
        $source_revenu->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/source_revenu');
    }
}
