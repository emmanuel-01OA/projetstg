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

            // 0 pour refuser
            // 1 pour en attente de validation
            // 2 pour validation

        $etatAttente = 1;
        $etatValider = 2;
        $etatRefuser = 0;

          // requete pour la base de donnees concernant la table status
          $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

          $dmdpasstAttente = DB::select('select tbldmdpasst.idpasst , tbldmdpasst.code_activite , tblac.description , tbldmdpasst.libpasst, tbldmdpasst.pourcen_travail_eff,tbldmdpasst.datedmd , valider.etatv from tbldmdpasst,tblac,valider where tblac.code_activite = tbldmdpasst.code_activite and valider.idpasst = tbldmdpasst.idpasst and tbldmdpasst.matrcl = ? and valider.etatv = ?', [$matricul->matrcl, $etatAttente]);


          $dmdpasstValider = DB::select('select tbldmdpasst.idpasst , tbldmdpasst.code_activite , tblac.description , tbldmdpasst.libpasst, tbldmdpasst.pourcen_travail_eff,tbldmdpasst.datedmd , valider.etatv from tbldmdpasst,tblac,valider where tblac.code_activite = tbldmdpasst.code_activite and valider.idpasst = tbldmdpasst.idpasst and tbldmdpasst.matrcl = ? and valider.etatv = ?', [$matricul->matrcl,$etatValider]);

          $dmdpasstRefuser = DB::select('select tbldmdpasst.idpasst , tbldmdpasst.code_activite , tblac.description , tbldmdpasst.libpasst, tbldmdpasst.pourcen_travail_eff,tbldmdpasst.datedmd , valider.etatv from tbldmdpasst,tblac,valider where tblac.code_activite = tbldmdpasst.code_activite and valider.idpasst = tbldmdpasst.idpasst and tbldmdpasst.matrcl = ? and valider.etatv = ?', [$matricul->matrcl,$etatRefuser]);




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
        ->distinct()
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
        ->distinct()
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
        ->distinct()
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
          // ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')

          ->join('travailler_sur', function($join) {
            $join->on('travailler_sur.matrcl', '=', 'tbldmdpasst.matrcl');
                //  ->on('travailler_sur.code_activite', '=', 'tblac.code_activite');
        })
          ->join('tblfonc', 'tblfonc.code_fonct', '=','tblper.code_fonct')
          ->select('valider.*','tbldmdpasst.*', 'tblac.code_activite','tblac.lib_act','tblac.*' ,'tblfonc.libelle_fonct', 'tbltyac.libelle_activite','tblper.*','travailler_sur.*')
          ->distinct()
          ->where([
              ['valider.matrclman', '=', $matricule->matrcl ],
              ['valider.etatpassman', '=', $StatutAttentepassMan ],
              ['etatd', '=', $EtatdmdpassMan ],
          ])->orderBy('tbldmdpasst.datedmd')
          ->get();



        // dd(  $ActivitpassAttente);
    //       $ActivitpassAttente = DB::table('valider')
    // ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
    // ->join('tblper', 'tblper.matrcl', '=', 'tbldmdpasst.matrcl')
    // ->join('tblac', 'tblac.code_activite', '=', 'tbldmdpasst.code_activite')
    // ->join('tbltyac', 'tbltyac.id_type_act', '=', 'tblac.id_type_act')
    // ->join('travailler_sur', 'travailler_sur.matrcl', '=', 'tbldmdpasst.matrcl')
    // ->select('valider.idpasst', 'tbldmdpasst.*', 'tblac.code_activite', 'tbltyac.libelle_activite AS type_activity', 'tblper.*', 'travailler_sur.matrcl')
    // ->distinct()
    // ->where([
    //     ['valider.matrclman', '=', $matricule->matrcl],
    //     ['valider.etatpassman', '=', $StatutAttentepassMan],
    //     ['etatd', '=', $EtatdmdpassMan],
    // ])
    // ->orderBy('tbldmdpasst.datedmd')
    // ->get();


        // dd(  $ActivitpassAttente);
          // les passations qui sont validées par le Manager

          $ActivitpassValider = DB::table('valider')
          ->join('tbldmdpasst', 'valider.idpasst', '=', 'tbldmdpasst.idpasst')
          ->join('tblper', 'tblper.matrcl', '=','tbldmdpasst.matrcl')
          ->join('tblac', 'tblac.code_activite', '=','tbldmdpasst.code_activite')
          ->join('tblfonc', 'tblfonc.code_fonct', '=','tblper.code_fonct')
          ->join('tbltyac', 'tbltyac.id_type_act', '=','tblac.id_type_act')
          ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
          ->select('valider.*','tbldmdpasst.*', 'tblac.*','tbltyac.*','tblfonc.libelle_fonct','tblper.*','travailler_sur.*')
          ->distinct()
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
          ->join('tblfonc', 'tblfonc.code_fonct', '=','tblper.code_fonct')
          ->join('travailler_sur', 'travailler_sur.matrcl', '=','tbldmdpasst.matrcl')
          ->select('valider.*','tbldmdpasst.*', 'tblac.*','tbltyac.*','tblfonc.libelle_fonct', 'tblper.*','travailler_sur.*')
          ->distinct()
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
            ->distinct()
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


          $matriculback = DB::table('dtbdesign_bak_mang')->where('matrcl_pers', $matricul->matrcl )->first();


        //  dd($matricul->matrcl);
          $activitep = DB::select('select tblper.* ,travailler_sur.* from travailler_sur,tblper where  tblper.etatp=1 and tblper.matrcl = ?', [$matricul->matrcl] );

        //  dd($activitep);
        $attribbackup = DB::table('dtbdesign_bak_mang')
        ->join('tblper', 'tblper.matrcl', '=', 'dtbdesign_bak_mang.matrcl_pers')
        ->join('tblman', 'tblman.matrcl', '=', 'dtbdesign_bak_mang.matrcl_man')
        ->join('tblbackp', 'tblbackp.matrcl', '=', 'dtbdesign_bak_mang.matrcl_back')
        ->join('tblfonc as fonction_man', 'fonction_man.code_fonct', '=', 'tblman.code_fonct')
        ->join('tblfonc as fonction_per', 'fonction_per.code_fonct', '=', 'tblper.code_fonct')
        ->join('tblfonc as fonction_back', 'fonction_back.code_fonct', '=', 'tblbackp.code_fonct')
        ->select('dtbdesign_bak_mang.*', 'tblper.nam as nompers', 'tblper.renam as renompers',
                 'tblman.nam as nomana', 'tblman.renam as renomana', 'tblbackp.nam as nomback',
                 'tblbackp.renam as renomback', 'fonction_per.libelle_fonct as fonction_per_libelle',
                 'fonction_back.libelle_fonct as fonction_back_libelle' , 'fonction_man.libelle_fonct as fonction_man_libelle')
                 ->where('dtbdesign_bak_mang.matrcl_pers', $matricul->matrcl )
        ->distinct()
        ->get();



        // dd($activitep);

        //   foreach ($matriculback as $users) {
        //  dd($users->matrcl);
        // }
        //  dd($matriculback);
        //   $matriculback->each(function($post) {
        //    dd($post->email);
        // });


            return view('collab.passation.ajoutpassationActivite', compact('matricul', 'backcup', 'manag','activitep','attribbackup'));

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
        'libproj'=> 'required|string',
        'file' => 'required|file|mimes:zip,rar|max:2048'

          ]);

          $path = $request->file('file')->store('compressed_files');




// dd($request->libproj);
// $matriculback = DB::select('select * from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);

   // mon matricule utilisateur   ($matricul->matrcl)
   $matriculback = DB::table('dtbdesign_bak_mang')->where('matrcl_pers', $matricul->matrcl )->first();


// $matriculback = DB::table('dtbdesign_bak_mang')->where('matrcl_pers ',[ $matricul->matrcl ])->first() ;

// dd(  $matriculback);


 $matriculman = DB::table('dtbdesign_bak_mang')->where('matrcl_pers', $matricul->matrcl )->first();




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
'attach' => $path,
'descption' => $request->descrippasst

  ]);



$tbldppasid = DB::table('tbldmdpasst')
->where('matrcl', $matricul->matrcl )
->where('code_activite', $request->activitep )
->where('libpasst', $request->libellepassation )
->where('descption', $request->descrippasst )
->where('pourcen_travail_eff', $request->pourcenteff )
->first();





//   $tblpass = DB::table('tbldmdpasst')->insert([dd($tbldppasid );
//     'matrcl' => $request->matrcl,
//     'code_activite' => $request->l,

// 'libpasst'=> $request->l,
// 'pourcen_travail_eff'=> $request->l,
// 'datedmd' => $request->l,
// 'description' => $request->l,
// 'etatd' => $request ->l ,
// 'attach' => $request ->
// dd( $tbldppasid);


$tblpassTblvalid = DB::table('valider')->insert([

    'matrcl_back' => $matriculback->matrcl_back,
    'idpasst' => $tbldppasid->idpasst,
    'matrclman' =>  $matriculman->matrcl_man,
    'idvalid'=> 1,
    'etatpassman'=> 1,
    'etatpassbackup' => 1, // en attente
    'etatv' => 1 // validation est en attente

      ]);




notyf("Ajout des informations de la passation effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

return redirect()->back();

          }catch(Exception $exp){

dd($exp);
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

                $AccepterMan = DB::update('update valider set date_validpassback = now() , etatpassbackup = ?  where valider.idpasst = ?',[$RefuspassBack , $id] );

                notyf("passation refus&eacute;e avec succes",\Flasher\Prime\Notification\NotificationInterface::INFO);

                return redirect()->route('mesActivitespassations.index');


             }catch(Exception $e){
                dd($e);
             }

        }







        }
