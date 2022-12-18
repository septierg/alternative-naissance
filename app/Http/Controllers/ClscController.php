<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clsc;
use Illuminate\Support\Facades\Session;

class ClscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clscs = Clsc::all();

        //dd($clscs);
        return view('admin.clsc.index', compact('clscs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.clsc.create');
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
        Clsc::create($request->all());
        return redirect('/admin/clsc');
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
        $clscs = Clsc::findOrFail($id);
        return view('admin.clsc.edit', compact('clscs'));
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
        Clsc::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/clsc');
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
        $clscs = Clsc::findOrFail($id);
        $clscs->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/clsc');
    }
}
