<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccouchementPersonnesPrevues;
use Illuminate\Support\Facades\Session;

class AccouchementPersonnesPrevuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accouchementPersonnesPrevues = AccouchementPersonnesPrevues::all();

        return view ('admin.accouchement_personnes_prevues.index', compact('accouchementPersonnesPrevues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.accouchement_personnes_prevues.create');
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
        AccouchementPersonnesPrevues::create($request->all());
        return redirect('/admin/accouchement_personnes_prevues');
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
        $accouchementPersonnesPrevues = AccouchementPersonnesPrevues::findOrFail($id);
        return view('admin.accouchement_personnes_prevues.edit', compact('accouchementPersonnesPrevues'));
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
        AccouchementPersonnesPrevues::where('id', $id)->update([
            "nom" =>$input['nom'],
        ]);

        return redirect('/admin/accouchement_personnes_prevues');
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
        $accouchementPersonnesPrevues = AccouchementPersonnesPrevues::findOrFail($id);

        $accouchementPersonnesPrevues->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/accouchement_personnes_prevues');
    }
}
