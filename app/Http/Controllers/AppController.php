<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{


    public function adminHome()
    {

        return view('dashboardadmin');

    }
    public function managerHome() {


        return view('dashboardmanager');

    }

    public function user()

    {

        $totalpassationac = DB::table('tbldmdpasst')->count();
        $totaldemdcg = DB::table('tblcg')->count();

        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        $totaldemdcgs = DB::table('planifier')
        ->where('matrcl', $matricul->matrcl )
        ->where('etatf', 1)
        ->count();


        $totaldemdpas = DB::table('tbldmdpasst')
        ->where('matrcl', $matricul->matrcl )
        ->where('etatd', 1)
        ->count();

       // dd($totaldemdpas);
        return view('dashboarduser',compact('totaldemdcgs','totaldemdpas'));

    }

    //

    public function index(){

       $totalUtilisateur = User::all()->count();
       $totalpersonnel =  10;
       $totalpassationac = DB::table('tbldmdpasst')->count();
       $totaldemdcg = DB::table('tblcg')->count();
        return view('dashboardadmin', compact('totalUtilisateur', 'totalpersonnel', 'totalpassationac', 'totaldemdcg'));




    }

/// fonction permettant d'avoir la vue des utilisateurs personnel ingenieur
    public function indexe(){



        $totalpassationac = DB::table('tbldmdpasst')->count();
        $totaldemdcg = DB::table('tblcg')->count();

        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        $totaldemdcgs = DB::table('planifier')
        ->where('matrcl', $matricul->matrcl )
        ->where('etatf', 1)
        ->count();


        $totaldemdpas = DB::table('tbldmdpasst')
        ->where('matrcl', $matricul->matrcl )
        ->where('etatd', 1)
        ->count();

       // dd($totaldemdpas);
        // $totaldemdcgs = DB::table('planifier')->where('')
        // ->count();

         return view('dashboarduser', compact('totalpassationac', 'totaldemdcg', 'totaldemdcgs', 'totaldemdpas'));

     }

     /// fonction permettant d'avoir la vue des utilisateurs manager

     public function indexes(){


        $totalpersonnel =  10;
        $totalpassationac = DB::table('tbldmdpasst')->count();
        $totaldemdcg = DB::table('tblcg')->count();



         return view('dashboardmanager', compact( 'totalpersonnel', 'totalpassationac', 'totaldemdcg'));
     }
}
