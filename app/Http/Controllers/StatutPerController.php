<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatutPerController extends Controller
{
    //

    public function allstatut(){

        $actifstat = 1;
        $actifInactif = 0;

       // $statut = DB::table('tblstentrp')->get();

       // requete pour la base de donnees concernant la table status
        $statut = DB::select('select * from tblstentrp where etatst = ?', [1]);
        $statutin = DB::select('select * from tblstentrp where etatst = ?', [0]);

        return view('statutentreprise.allstatut', compact('statut', 'statutin'));
    }


}
