<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PassationActController extends Controller
{

    private $filePath = 'activites.json';

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
          ->join('tbldmdpasst', 'valider.idpasst','=', 'tbldmdpasst.idpasst')
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
              ['valider.matrclman', '=', $matricule->matrcl ],
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
              ['valider.matrclman', '=', $matricule->matrcl ],
              ['valider.etatpassman', '=', $StatutRefpassMan ],
              ['etatd', '=', $EtatdmdpassMan ],
          ])->orderBy('tbldmdpasst.datedmd')
          //->where('valider.matrcl_back','=', $matriculer->matrcl)
          ->get();

            // dd($ActivitpassAttente);


            return view('managerviews.Demandepassation.indexDemandepassation', compact('ActivitpassAttente', 'ActivitpassRefuser', 'ActivitpassValider', 'EtatdmdpassMan','StatutRefpassMan','StatutValpassMan','StatutAttentepassMan'));

          }

          //





          //// ajouter les passations de l utilisateur

          public function createuserPassation(){

            // attente de validation pour toutes les demandes chez
            // le manger, le backup
            $StatutAttentepassMan = 1;

            // etat de personnel toujour actif
            // personnel actif 1 ; personnel inactif 0
            $etatp = 1;

            $statutpers = 1;

            // role du manager
            $roleManage = 1;

            // role du backup
            $rolebackup = 0;

            // etat de la demande est toujour en attente
            $StatutAttenteDemandepassation = 1;

            $person = DB::table('tblper')->get();

             // requete pour la base de donnees concernant la table status

             // mon matricule utilisateur   ($matricul->matrcl)
          $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();


          //  dd($matricul->matrcl);
          // selectionne les matriculee des managers

            $manag = DB::table('tblper')
            ->join('users', 'tblper.eml', '=', 'users.email')
            ->select('tblper.*','users.*')
            ->where([
              ['users.role', '=', $roleManage ],
              ['tblper.etatp', '=', $etatp ],
          ])
          ->get();



            $backcup = DB::table('tblper')
            ->join('users', 'tblper.eml', '=', 'users.email')
            ->select('tblper.*','users.*')
            ->where([
              ['users.role', '=', $rolebackup ],
              ['tblper.etatp', '=', $etatp ],
          ])
          ->get();



          $activitep = DB::select('select tblper.* ,travailler_sur.* from travailler_sur,tblper where  tblper.etatp=1 and tblper.matrcl = ?', [$matricul->matrcl] );

        //  dd($activitep);

        //  $activitep = DB::table('travailler_sur')
        // ->join('tblper', 'tblper.matrcl', '=', 'travailler_sur.matrcl')
        // ->select('tblper.*', 'travailler_sur.*')
        // ->where([
        //     ['tblper.etatp', '=', $etatp],
        //     ['tblper.matrcl', '=', $matricul],
        // ])
        // ->get();


        //   foreach ($activitep as $users) {
        //     dd($activitep);

        //     }


         //dd($activitep);

        //   foreach ($matriculback as $users) {
        //  dd($users->matrcl);
        // }
        //  dd($matriculback);
        //   $matriculback->each(function($post) {
        //    dd($post->email);
        // });


            return view('collab.passation.ajoutpassationActivite', compact('matricul', 'backcup', 'manag','activitep'));

          }



          public function postuserPassation(Request $request){


   try{

        // mon matricule utilisateur   ($matricul->matrcl)
        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        // activitep , Descrip , libellepassation , descrippasst , pourcenteff , libproj

        $validator = Validator::make($request->all(), [

       // 'activitep' => 'required|date|before:datefin',
        // 'datefin' => 'required|date|after:datedeb',
      //  'datedmd' => 'required|date',
        'activitep' => 'required|string',
        'Descrip' => 'required|string',
        'libellepassation' => 'required|string',
        'descrippasst' => 'required|string',
        'pourcenteff'=> 'required|string',
        'libproj'=> 'required|string'
          ]);

// dd($request->libproj);
 $matriculback = DB::select('select * from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);


// $matriculback = DB::table('dtbdesign_bak_mang')->where('matrcl_pers ',[ $matricul->matrcl ])->first() ;

// dd(  $matriculback);

 $matriculman = DB::select('select matrcl_man from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);



//  foreach ($matriculback as $matriculbacks) {
//     dd($matriculbacks->matrcl_back);
// }
//$activite['datedmd'] = now(); // Ajoutez la date actuelle


if ($validator->fails()) {

    return redirect()->back()->withErrors($validator)->withInput();
}



$tblpass = DB::table('tbldmdpasst')->insert([

'matrcl' => $matricul->matrcl,
'code_activite' => $request->activitep,
'libpasst'=> $request->libellepassation,
'pourcen_travail_eff'=> $request->pourcenteff,
'etatd' => 1,  // demande en attente
'attach' => null,
'descption' => $request->descrippasst

  ]);

$tbldppasid = DB::select('select idpasst from tbldmdpasst where matrcl = ? and code_activite = ? and libpasst = ? and descption = ?', [ $matricul->matrcl ,$request->activitep , $request->libellepassation , $request->descrippasst]);
//   $tblpass = DB::table('tbldmdpasst')->insert([
//dd($tbldppasid );
//     'matrcl' => $request->matrcl,
//     'code_activite' => $request->l,

// 'libpasst'=> $request->l,
// 'pourcen_travail_eff'=> $request->l,
// 'datedmd' => $request->l,
// 'description' => $request->l,
// 'etatd' => $request ->l ,
// 'attach' => $request ->

$tblpassTblvalid = DB::table('tbldmdpasst')->insert([

    'matrcl_back' => $matricul->matrcl,
    'idpasst' => $tbldppasid,
    'matrclman' =>  $matriculman,
    'idvalid'=> 1,
    'etatpassman'=> 1,
    'etatpassbackup' => 1, // en attente
    'etatv' => 1,  // validation eest en attente

      ]);
// dd($matricul);
// ]);

// $tempscritique = DB::table('tbldmdpasst')->insert([

//     'code_act' => $request->activity,
//     'lib_crit' => $request->libAct,
//     'date_deb_crit' => $request->datedeb,
//     'date_fin_crit' => $request->datefin,
//     'etatcrip' => 1
// ]);

notyf("Ajout des informations de la passation effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

return redirect()->back();

          }catch(Exception $exp){

//dd($exp);
          }


          // fonction pour les paramètres d affichages
           ///




    }

           // validation des parametres des passations
          public function AccepterPassationMan(Request $request, $id){

         try{

            // 2 pour accepter la passation
            $ValidpassMan = 2;

            $AccepterMan = DB::update('update valider set etatpassman = ? , date_validman = now() where valider.idpasst = ?',[$ValidpassMan , $id] );

            //     table('valider')->where(['idpasst' => $id ])
            // ->update(
            //     ['etatpassman', , $ValidpassMan ],
            //     ['date_validman', '=',date('Y-m-d H:i:s')] );


            // validation de l 'etat passation du manager

            notyf("passation accept&eacute;e avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

            return redirect()->route('demandeManpassation.index');


         }catch(Exception $e){
            dd($e);
         }

        }


        public function RefuserPassationMan(Request $request, $id){

            try{

               // 2 pour accepter la passation
               $RefuserpassMan = 0;

               $AccepterMan = DB::update('update valider set etatpassman = ? , date_validman = now() where valider.idpasst = ?',[$RefuserpassMan, $id] );

               //     table('valider')->where(['idpasst' => $id ])
               // ->update(
               //     ['etatpassman', , $ValidpassMan ],
               //     ['date_validman', '=',date('Y-m-d H:i:s')] );


               // validation de l 'etat passation du manager

               notyf("passation refus&eacute;e avec succes",\Flasher\Prime\Notification\NotificationInterface::INFO);

               return redirect()->route('demandeManpassation.index');


            }catch(Exception $e){
               dd($e);
            }

           }




        public function AccepterPassationBack(Request $request, $id){

            try{

                // 2 pour accepter la passation backup
                $ValidpassBack = 2;

                $AccepterMan = DB::update('update valider set  date_validpassback = now(),etatpassbackup = ? where valider.idpasst = ?',[$ValidpassBack, $id] );

                notyf("passation accept&eacute;e avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

                return redirect()->route('mesActivitespassations.index');


             }catch(Exception $e){
                dd($e);
             }

        }


        public function RefuserPassationBack(Request $request, $id){

            try{

                // 0 pour refuser la passation backup
                $RefuspassBack = 0;

                $AccepterMan = DB::update('update valider set etatpassbackup = ? , date_validpassback = now() where valider.idpasst = ?',[$RefuspassBack , $id] );

                notyf("passation refus&eacute;e avec succes",\Flasher\Prime\Notification\NotificationInterface::INFO);

                return redirect()->route('mesActivitespassations.index');


             }catch(Exception $e){
                dd($e);
             }

        }







        }
