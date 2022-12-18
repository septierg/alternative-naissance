<?php

namespace App\Http\Controllers;

use App\Models\Requetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RequettesFavoriController extends Controller
{
    //
    public function index(){
        $requetes= DB::table('requetes')->where('favori', 1)->orderBy('nom', 'ASC')->get();

        return view('admin.requetes_favori.index', compact('requetes'));

    }
}
