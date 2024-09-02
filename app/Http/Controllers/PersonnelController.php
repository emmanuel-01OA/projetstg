<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PersonnelController extends Controller
{
    //

    public function create(){

        return view('personnel.create');
    }

    public function index(){

        $person = DB::table('tblper')->get();

        $personne=DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct and tblper.etatp=1');

       // $personne = DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct');

       $personnelin = DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct and tblper.etatp=0');

        // $users = DB::table('users')
        //     ->select('name', 'email as user_email')
        //     ->get();

        return view('personnel.index', compact('personne', 'personnelin'));
    }

    public function edite($user){

        return view('personnel.edite', compact('user'));
    }
}
