<?php

namespace App\Http\Controllers;

use App\Models\TravaillerSur;
use Illuminate\Http\Request;

class DataActiviteController extends Controller
{

    public function indexDataAct(){

// activité en nombre de jour

//$matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

//$StatutuserAct = 1;
// DB::select("select distinct tblper.nam , tblper.renam, tblper.matrcl , travailler_sur.code_activite, travailler_sur.matrcl,  travailler_sur.idtrav , travailler_sur.etattrs,tbltyac.libelle_activite,tblac.description ,travailler_sur.descrip,travailler_sur.date_debut,travailler_sur.date_fin from tblac, tbltyac,travailler_sur,users WHERE tblac.id_type_act = tbltyac.id_type_act and travailler_sur.code_activite = tblac.code_activite and travailler_sur.matrcl = ? and travailler_sur.etattrs = ? ", [$matricul->matrcl , $StatutuserAct] );


       $Activiteplanifier = TravaillerSur::select('*')->where('etattrs', 1)->get();
        // Préparer les données pour le graphique



           $labels = $Activiteplanifier->pluck('code_activite');
           $startDates = $Activiteplanifier->pluck('date_debut');
           $endDates = $Activiteplanifier->pluck('date_fin');


           // Calculer la durée en jours entre les dates

           $durations = $startDates->zip($endDates)->map(function ($dates) {
            return \Carbon\Carbon::parse($dates[1])->diffInDays(\Carbon\Carbon::parse($dates[0]));
        });


        /// activité en

        //$matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

//$StatutuserAct = 1;
// DB::select("select distinct tblper.nam , tblper.renam, tblper.matrcl , travailler_sur.code_activite, travailler_sur.matrcl,  travailler_sur.idtrav , travailler_sur.etattrs,tbltyac.libelle_activite,tblac.description ,travailler_sur.descrip,travailler_sur.date_debut,travailler_sur.date_fin from tblac, tbltyac,travailler_sur,users WHERE tblac.id_type_act = tbltyac.id_type_act and travailler_sur.code_activite = tblac.code_activite and travailler_sur.matrcl = ? and travailler_sur.etattrs = ? ", [$matricul->matrcl , $StatutuserAct] );


        return view('collab.Dataview.indexActData', [
            'labels' => $labels,
            'durations' => $durations,
            'startDates' => $startDates,
            'endDates' => $endDates
        ]);



    }


    public function indexVisualisationActivites(){

        return view("managerviews.Dataviews.VisualisationPlannActivite");
    }

}
