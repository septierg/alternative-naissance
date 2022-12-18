<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SourceDiffusion;
use Illuminate\Support\Facades\Session;

class SourceDiffusionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sourceDiffusion = SourceDiffusion::all();

        return view ('admin.source_diffusion.index', compact('sourceDiffusion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.source_diffusion.create');
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
        SourceDiffusion::create($request->all());
        return redirect('/admin/source_diffusion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
        $sourceDiffusion = SourceDiffusion::findOrFail($id);
        return view('admin.source_diffusion.edit', compact('sourceDiffusion'));
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
        SourceDiffusion::where('id', $id)->update([
        "nom" =>$input['nom'],
    ]);

        return redirect('/admin/source_diffusion');
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
        $sourceDiffusion = SourceDiffusion::findOrFail($id);
        //dd($prerequis);
        $sourceDiffusion->delete();
        Session::flash('message', 'Enregistrement bien supprimer!');

        return redirect('/admin/source_diffusion');
    }
}
