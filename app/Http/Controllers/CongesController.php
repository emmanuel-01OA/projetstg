<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CongesController extends Controller
{
    //

    public function indexconges(){

        $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
        $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);


        return view('collab.conges.indexcg', compact('fonction', 'fonctionin'));
    }


    public function indexCongespersonnel(){

        // A parametrer
        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        //    $matricul = DB::select('select matrcl from tblper where tblper.eml = ?', [auth()->user()->email]);
            $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
            $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);

            $activite = DB::select("select distinct travailler_sur.code_activite, travailler_sur.matrcl,tbltyac.libelle_activite,tblac.description,travailler_sur.date_debut,travailler_sur.date_fin from tblac, tbltyac,travailler_sur,users WHERE tblac.id_type_act = tbltyac.id_type_act and travailler_sur.code_activite = tblac.code_activite and travailler_sur.matrcl = ?", [$matricul->matrcl] );



        return view('managerviews.congesviews.indexcgpersonnel', compact('activite', 'fonctionin', 'matricul') );
    }



}
