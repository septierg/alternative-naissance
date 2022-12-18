<?php

namespace App\Http\Controllers;

use App\Models\LieuxFormation;
use Illuminate\Http\Request;
use App\Models\Soignants;
use Illuminate\Support\Facades\Session;

class SoignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $soignants = Soignants::all();

        return view ('admin.soignant.index', compact('soignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.soignant.create');
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
        Soignants::create($request->all());
        return redirect('/admin/soignants');
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
        $soignants = Soignants::findOrFail($id);
        return view('admin.soignant.edit', compact('soignants'));
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
        Soignants::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/soignants');
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
        $soignants = Soignants::findOrFail($id);
        //dd($prerequis);
        $soignants->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/soignants');
    }
}
