<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreoccupationsBebe;
use Illuminate\Support\Facades\Session;

class PreoccupationsBebeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $preocuppationsBebe = PreoccupationsBebe::all();
        return view ('admin.preoccupations_bebe.index', compact('preocuppationsBebe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.preoccupations_bebe.create');
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
        PreoccupationsBebe::create($request->all());
        return redirect('/admin/preoccupations_bebe');
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
        $preocuppationsBebe = PreoccupationsBebe::findOrFail($id);
        return view('admin.preoccupations_bebe.edit', compact('preocuppationsBebe'));
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
        PreoccupationsBebe::where('id', $id)->update([
            "nom" =>$input['nom'],

        ]);
        return redirect('/admin/preoccupations_bebe');
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
        $preocuppationsBebe = PreoccupationsBebe::findOrFail($id);
        $preocuppationsBebe->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/preoccupations_bebe');

    }
}
