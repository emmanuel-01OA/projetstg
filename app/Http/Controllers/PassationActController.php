<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PassationActController extends Controller
{
    //
    public function indexMespassations(){


        // les états de validation de demande de passation

            // 0 pour valider
            // 1 pour en attente de validation
            // 2 pour validation

        $etatAttente = 1;
        $etatValider = 2;
        $etatRefuser = 0;

          // requete pour la base de donnees concernant la table status
          $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

          $dmdpasstAttente = DB::select('select tbldmdpasst.idpasst , tbldmdpasst.code_activite , tblac.description , tbldmdpasst.libpasst, tbldmdpasst.pourcen_travail_eff,tbldmdpasst.datedmd , tbldmdpasst.etatd  from tbldmdpasst,tblac where tblac.code_activite = tbldmdpasst.code_activite and tbldmdpasst.matrcl = ? and tbldmdpasst.etatd= ?', [$matricul->matrcl, $etatAttente]);

          $dmdpasstValider = DB::select('select tbldmdpasst.idpasst , tbldmdpasst.code_activite , tblac.description , tbldmdpasst.libpasst, tbldmdpasst.pourcen_travail_eff,tbldmdpasst.datedmd , tbldmdpasst.etatd  from tbldmdpasst,tblac where tblac.code_activite = tbldmdpasst.code_activite and tbldmdpasst.matrcl = ? and tbldmdpasst.etatd=?', [$matricul->matrcl,$etatValider]);

          $dmdpasstRefuser = DB::select('select tbldmdpasst.idpasst , tbldmdpasst.code_activite , tblac.description , tbldmdpasst.libpasst, tbldmdpasst.pourcen_travail_eff,tbldmdpasst.datedmd , tbldmdpasst.etatd  from tbldmdpasst,tblac where tblac.code_activite = tbldmdpasst.code_activite and tbldmdpasst.matrcl = ? and tbldmdpasst.etatd=?', [$matricul->matrcl,$etatRefuser]);


       //   $passation = DB::select('select * ')

          return view('collab.passation.indexpasst', compact('dmdpasstAttente','dmdpasstValider','dmdpasstRefuser','etatAttente','etatValider','etatRefuser'));



        }

        public function indexMesActivitespassation(){

          $Etatdmdpassback= 1;
          $StatutValpassback = 2;
          $StatutRefpassback = 0;
          $StatutAttentepassback = 1;

          $matriculer = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();



          // les acivités de la passation du backup

        //  $Activitpass = DB::table('valider')->get();

        //   $Activitpass = DB::table('valider')
        //     ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
        //     ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
        //     ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
        //     ->select('valider.*','tbldmdpasst.*', 'tblac.*', 'tblper.*')
        //     ->where('valider.matrcl_back','=', 'ABS11906')
        //     ->get();


        // les passation s qui sont en attentes de validation par le backcup

        // jointure de plusieurs tables

        $ActivitpassAttente = DB::table('valider')
        ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
        ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
        ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
        ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
        ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
        ->select('valider.*','tbldmdpasst.*', 'tblac.*', 'tbltyac.*','tblper.*','travailler_sur.*')
        ->where([
            ['valider.matrcl_back', '=', $matriculer->matrcl ],
            ['valider.etatpassbackup', '=', $StatutAttentepassback ],
            ['etatd', '=', $Etatdmdpassback ],
        ])->orderBy('tbldmdpasst.datedmd')
        ->get();


        // les passations qui sont validées par le backup

        $ActivitpassValider = DB::table('valider')
        ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
        ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
        ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
        ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
        ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
        ->select('valider.*','tbldmdpasst.*', 'tblac.*','tbltyac.*','tblper.*','travailler_sur.*')
        ->where([
            ['valider.matrcl_back', '=', $matriculer->matrcl ],
            ['valider.etatpassbackup', '=', $StatutValpassback ],
            ['etatd', '=', $Etatdmdpassback ],
        ])->orderBy('tbldmdpasst.datedmd')
        ->get();


        // les passation qui sont refusés par le backup
        // jointure de plusieurs tables

        $ActivitpassRefuser = DB::table('valider')
        ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
        ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
        ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
        ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
        ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
        ->select('valider.*','tbldmdpasst.*', 'tblac.*','tbltyac.*', 'tblper.*','travailler_sur.*')
        ->where([
            ['valider.matrcl_back', '=', $matriculer->matrcl ],
            ['valider.etatpassbackup', '=', $StatutRefpassback ],
            ['etatd', '=', $Etatdmdpassback ],
        ])->orderBy('tbldmdpasst.datedmd')
        //->where('valider.matrcl_back','=', $matriculer->matrcl)
        ->get();






          // dd($ActivitpassAttente);


          return view('collab.passation.indexMesactivitespass', compact('ActivitpassAttente', 'ActivitpassRefuser', 'ActivitpassValider', 'Etatdmdpassback','StatutRefpassback','StatutValpassback','StatutAttentepassback'));




        }




        /// passation concernant la reception chez le manager



        public function indexDemandepassation(){

            // valeur de la passation du manager

            // 0 pour valider
            // 1 pour en attente de validation
            // 2 pour validation

            $EtatdmdpassMan = 1;
            $StatutValpassMan = 2;
            $StatutRefpassMan = 0;
            $StatutAttentepassMan = 1;



            $matricule = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

          //  dd($matricule);


            // les acivités de la passation du Manup

          //  $Activitpass = DB::table('valider')->get();

          //   $Activitpass = DB::table('valider')
          //     ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
          //     ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
          //     ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
          //     ->select('valider.*','tbldmdpasst.*', 'tblac.*', 'tblper.*')
          //     ->where('valider.matrcl_back','=', 'ABS11906')
          //     ->get();










          // les passation s qui sont en attentes de validation par le Mancup

          // jointure de plusieurs tables

          $ActivitpassAttente = DB::table('valider')
          ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
          ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
          ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
          ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
          ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
          ->select('valider.*','tbldmdpasst.*', 'tblac.*', 'tbltyac.*','tblper.*','travailler_sur.*')
          ->where([
              ['valider.matrclman', '=', $matricule->matrcl ],
              ['valider.etatpassman', '=', $StatutAttentepassMan ],
              ['etatd', '=', $EtatdmdpassMan ],
          ])->orderBy('tbldmdpasst.datedmd')
          ->get();


          // les passations qui sont validées par le Manager

          $ActivitpassValider = DB::table('valider')
          ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
          ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
          ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
          ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
          ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
          ->select('valider.*','tbldmdpasst.*', 'tblac.*','tbltyac.*','tblper.*','travailler_sur.*')
          ->where([
              ['valider.matrcl_back', '=', $matricule->matrcl ],
              ['valider.etatpassman', '=', $StatutValpassMan ],
              ['etatd', '=', $EtatdmdpassMan ],
          ])->orderBy('tbldmdpasst.datedmd')
          ->get();


          // les passation qui sont refusés par le manager
          // jointure de plusieurs tables

          $ActivitpassRefuser = DB::table('valider')
          ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
          ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
          ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
          ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
          ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
          ->select('valider.*','tbldmdpasst.*', 'tblac.*','tbltyac.*', 'tblper.*','travailler_sur.*')
          ->where([
              ['valider.matrcl_back', '=', $matricule->matrcl ],
              ['valider.etatpassman', '=', $StatutRefpassMan ],
              ['etatd', '=', $EtatdmdpassMan ],
          ])->orderBy('tbldmdpasst.datedmd')
          //->where('valider.matrcl_back','=', $matriculer->matrcl)
          ->get();

            // dd($ActivitpassAttente);


            return view('managerviews.Demandepassation.indexDemandepassation', compact('ActivitpassAttente', 'ActivitpassRefuser', 'ActivitpassValider', 'EtatdmdpassMan','StatutRefpassMan','StatutValpassMan','StatutAttentepassMan'));

          }

        }
