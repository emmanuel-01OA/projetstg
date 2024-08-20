<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ActiviteUserController extends Controller
{
    //


    public function indexMesactivites(){

     //   $matricul = DB::select('select matrcl from tblper where tblper.eml = ?', [auth()->user()->email]);

     //   $personne=DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct and tblper.etatp=1');

       // $personne =DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct');

    //   $personnelin = DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct and tblper.etatp=0');

        // $users = DB::table('users')
        //     ->select('name', 'email as user_email')
        //     ->get();


        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

    //    $matricul = DB::select('select matrcl from tblper where tblper.eml = ?', [auth()->user()->email]);
        $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
        $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);

        $activite = DB::select("select distinct travailler_sur.code_activite, travailler_sur.matrcl,tbltyac.libelle_activite,tblac.description,travailler_sur.date_debut,travailler_sur.date_fin from tblac, tbltyac,travailler_sur,users WHERE tblac.id_type_act = tbltyac.id_type_act and travailler_sur.code_activite = tblac.code_activite and travailler_sur.matrcl = ?", [$matricul->matrcl] );


        return view('collab.activites.indexact', compact('activite', 'fonctionin', 'matricul'));
    }
}
