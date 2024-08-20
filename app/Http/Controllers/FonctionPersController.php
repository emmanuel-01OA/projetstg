<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FonctionPersController extends Controller
{
    //

    public function allfonction(){


        // $statut = DB::table('tblstentrp')->get();

        // requete pour la base de donnees concernant la table status
         $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
         $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);

         return view('fonction.allfonction', compact('fonction', 'fonctionin'));
     }

}
