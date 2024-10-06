<?php

namespace App\Http\Controllers;

use App\Models\Tblper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CongesController extends Controller
{

    public function congescreate(){

        // sweetalert('Vous ne pouvez pas planifier votre cong&eacute; car votre remplaçant en a dejà effectu&eacute;.', $type=\Flasher\Prime\Notification\NotificationInterface::ERROR );

        return view('collab.conges.createcg');

    }
    //

    private function calculateLeaveDays($start_date, $end_date)
{
    $start = \Carbon\Carbon::parse($start_date);
    $end = \Carbon\Carbon::parse($end_date);

    return $end->diffInDays($start) + 1; // Inclut le jour de début
}


    public function planifcongescreate(Request $Request){

        try{

            $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();



            $matriculman = DB::select('select matrcl_man from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);


            $congeSolde =  DB::table('tblperdcg')->where('matrcl', $matricul->matrcl )->first();

           // dd( $congeid);


            $Request->validate([

               'datedc' => 'required|date|before:datefc',

               'datefc' => 'required|date|after:datedc',
            ]);

           // datedc = trim($Request.input('datedc'));
           // datefc = trim($Request.input('datefc'));

            $tbcritiques = DB::select('select * from tbdtcritq');
            $travailler_user =  DB::table('travailler_sur')->where('travailler_sur.matrcl', $matricul->matrcl )->get();


           // dd($request->libproj);

        // mon matricule utilisateur   ($matricul->matrcl)
        $matriculback = DB::table('dtbdesign_bak_mang')->where('matrcl_pers', $matricul->matrcl )->first();

          $matriculmana = DB::table('dtbdesign_bak_mang')->where('matrcl_pers', $matricul->matrcl )->first();

          //  $matriculman = DB::select('select matrcl_man from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);



          //   dd( $matriculback->matrcl_back );
       //   $backupconges = DB::select('select * from planifier where planifier.etatf = 2 and matrcl = ? ',[ $matriculback->matrcl_back ]);

          $backupconges = DB::table('planifier')->where('planifier.matrcl', $matriculback->matrcl_back )->where('planifier.etatf', 2)->first();

          dd( $backupconges );
           $Mnconges = DB::table('planifier')->where('planifier.matrcl', $matriculback->matrcl_pers )
           ->where('planifier.etatf', 2)->first();




         // dd($tbcritiques);
            $usercritique = false;
          foreach( $tbcritiques as  $tbcritique){
          //  notyf("Vous ne pouvez pas enregistrer planifier votre congés car vous êtes à une date critique",\Flasher\Prime\Notification\NotificationInterface::ERROR);


            foreach($travailler_user as $travailler_sur){




                  //   if($tbcritique->code_act == $travailler_sur->code_activite){
                   if(strcasecmp($tbcritique->code_act ,$travailler_sur->code_activite) === 0){


                   $dateDebutcritq = Carbon::parse($tbcritique->date_deb_crit);
                   $dateFincritq = Carbon::parse($tbcritique->date_fin_crit);
                   $datedb = Carbon::parse($Request->input('datedc'));


                     if(Carbon::parse($Request->datedc)->between($tbcritique->date_deb_crit, $tbcritique->date_fin_crit)){
                   if($datedb->between($dateDebutcritq,$dateFincritq) ){

                    //    dd($travailler_sur->code_activite);

                         $usercritique = true;
                         break 2;


                    }
                }
             }
        }
      }



              $userconge = false;
              foreach( $backupconges  as  $backupconge ){

                            foreach( $Mnconges  as  $Mconge ){


               if(Carbon::parse($Request->datedc)->between($Mnconges->date_depart, $Mnconges->date_arrive )){
                    if($datedb->between($backupconges ,$backupconges ) ){

                    //    dd($travailler_sur->code_activite);

                         $userconge = true;
                         break 2;

                            }

                     }



              }
            }



              if($userconge){
                sweetalert('Vous ne pouvez pas planifier votre cong&eacute; car votre remplaçant en a dejà effectu&eacute;.');
              }


              if($usercritique){

               // dd($usercritique);
                notyf("Vous ne pouvez pas enregistrer planifier votre congés car vous êtes à une date critique",\Flasher\Prime\Notification\NotificationInterface::ERROR);

              }

              // calcule le solde de congés

              $availableLeaves = 1 ;

              $congeSoldes = $congeSolde->taux_conges;

             // dd($congeSoldes);

             $requestedLeaveDays = $this->calculateLeaveDays( $Request->datedc,$Request->datefc);

              //   dd($requestedLeaveDays);

              if ($requestedLeaveDays > $congeSoldes ) {


                sweetalert('Vous ne pouvez pas planifier votre cong&eacute; car votre solde de cong&eacute; ne peut pas couvrir cette plage de cong&eacute; .');

              }

              if ($Request->datedc >$Request->datedc ) {


                sweetalert('La date de debut de conge est plus avanc&eacute; que la date finale de la planification conge .');

              }

              try {


                // Votre code d'insertion ici
           $conge =   DB::table('planifier')->insert([
                    'matrcl' => $matricul->matrcl,
                    'man_matricule' => $matriculmana->matrcl_man,
                    'idcg' => 1,
                    'etatvalidpl' => 1,
                    'taux_plcg' =>  $requestedLeaveDays,
                    'date_depart' => $Request->input('datedc'),
                    'date_arrive' => $Request->input('datefc'),
                ]);

                notyf("Planification cong&eacute; enregistr&eacute; avec success",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

                return redirect()->route('mescongesuser.create');

            } catch (Exception $e) {

                notyf("Une plage de congé est déjà saisie",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

              //  return redirect()->back()->with('error', 'la date de conges ' . $e->getMessage());
            }

                // if()

        }
        catch (Exception $e) {
            sweetalert('Vous n avez pas de solde congés');

        }

          // sweetalert('Echec de l insertion .');


    //  }
        return redirect()->route('mescongesuser.create');

      //  redirect()->back()->with("sucess","ttt");




}




    public function indexconges(){



        $etatp = 1;

        // les congés sont actifs
        // Dans notre cas ce sont les congés annuels
        $etatlbcgvld = 1;
        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();



        $conge = DB::table('tblcg')->where('etatc', $etatlbcgvld )->get();

        $tblperinfocg = DB::table('tblper')
        ->join('tblperdcg','tblperdcg.matrcl','=','tblper.matrcl')
        ->join('tblstentrp', 'tblstentrp.code_statut','=','tblper.code_statut')
        ->select('tblstentrp.*','tblper.*','tblperdcg.*')
        ->where([
            ['tblper.matrcl', '=', $matricul->matrcl ],

        ])
        ->get();

        $cgAtt = 1;

      //  dd($conge);

        $planifcg = DB::table('planifier')
        ->join('tblcg', 'planifier.idcg','=','tblcg.idcg')
        ->select('planifier.*','tblcg.*')
        ->where([
            ['planifier.matrcl', '=', $matricul->matrcl ],
            ['planifier.etatvalidpl', '=', $cgAtt ]

        ])
        ->get();

        // congés valide
        $cgval = 2;
        $cgref = 0;

        $planifcgval = DB::table('planifier')
        ->join('tblcg', 'planifier.idcg','=','tblcg.idcg')
        ->select('planifier.*','tblcg.*')
        ->where([
            ['planifier.matrcl', '=', $matricul->matrcl ],
            ['planifier.etatvalidpl', '=', $cgval ]


        ])
        ->get();



        $planifcgref = DB::table('planifier')
        ->join('tblcg', 'planifier.idcg','=','tblcg.idcg')
        ->select('planifier.*','tblcg.*')
        ->where([
            ['planifier.matrcl', '=', $matricul->matrcl ],
            ['planifier.etatvalidpl', '=', $cgref ]

        ])
        ->get();


      // dd($planifcg );


       // dd($tblperinfocg);
        // $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
        // $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);


        return view('collab.conges.indexcg', compact('matricul','conge', 'planifcg','tblperinfocg','planifcgref','planifcgval'));
    }


    public function indexCongespersonnel(){

        // A parametrer
        $etatp = 1;

        // conges valide
        $statutValidConge = 2;
        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        //    $matricul = DB::select('select matrcl from tblper where tblper.eml = ?', [auth()->user()->email]);
          //  $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
         //   $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);

           // $activite = DB::select("select distinct travailler_sur.code_activite, travailler_sur.matrcl,tbltyac.libelle_activite,tblac.description,travailler_sur.date_debut,travailler_sur.date_fin from tblac, tbltyac,travailler_sur,users WHERE tblac.id_type_act = tbltyac.id_type_act and travailler_sur.code_activite = tblac.code_activite and travailler_sur.matrcl = ?", [$matricul->matrcl] );


            $conges = DB::table('tblper')
             ->join('tblperdcg','tblperdcg.matrcl','=','tblper.matrcl')
             ->join('planifier','planifier.matrcl','=','tblper.matrcl')
             ->join('tblfonc','tblfonc.code_fonct','=','tblper.code_fonct')
             ->join('tblstentrp','tblstentrp.code_statut', '=','tblper.code_statut')
             ->select('*')
             ->where([
                ['tblper.etatp', '=', $etatp] ,
                ['planifier.etatvalidpl','=', $statutValidConge ]


                ])->get();


            //dd($conges);

        return view('managerviews.congesviews.indexcgpersonnel', compact('conges') );
    }



    public function indexDemCongespersonnel(){

        // statut de la demande de congés en Attente
        $StatutAttentdmdcg = 1;

        //statut de la demande de congé validé
        $StatutValidedmdcg = 2;

        // statut de la demande de congés refusé
        $StatutRefdmdcg = 0 ;
        // loin pour l'utilisateur concernant le login

        $etatp = 1;
        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        $matriculman = DB::select('select matrcl_man from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);




        $Dconges = DB::table('tblper')
        ->join('tblperdcg','tblperdcg.matrcl','=','tblper.matrcl')
        ->join('planifier','planifier.matrcl','=','tblper.matrcl')
        ->join('tblfonc','tblfonc.code_fonct','=','tblper.code_fonct')
        ->join('tblstentrp','tblstentrp.code_statut', '=','tblper.code_statut')
        ->select('*')
        ->where([
           ['tblper.etatp', '=', $etatp] ,
           ['planifier.etatvalidpl','=', $StatutAttentdmdcg ]

           ])->get();


$DcongesVal = DB::table('tblper')
->join('tblperdcg','tblperdcg.matrcl','=','tblper.matrcl')
->join('planifier','planifier.matrcl','=','tblper.matrcl')
->join('tblfonc','tblfonc.code_fonct','=','tblper.code_fonct')
->join('tblstentrp','tblstentrp.code_statut', '=','tblper.code_statut')
->select('*')
->where([
   ['tblper.etatp', '=', $etatp] ,
   ['planifier.etatvalidpl','=', $StatutValidedmdcg ]

   ])->get();


   ///
   ///
   ///
   ///


$DcongeRef = DB::table('tblper')
->join('tblperdcg','tblperdcg.matrcl','=','tblper.matrcl')
->join('planifier','planifier.matrcl','=','tblper.matrcl')
->join('tblfonc','tblfonc.code_fonct','=','tblper.code_fonct')
->join('tblstentrp','tblstentrp.code_statut', '=','tblper.code_statut')
->select('*')
->where([
   ['tblper.etatp', '=', $etatp] ,
   ['planifier.etatvalidpl','=', $StatutRefdmdcg ]

   ])->get();

   //dd($DcongeRef);
   ///
   ///
   ///
   ///
     return view('managerviews.congesviews.Demandecongepersonnel.demandconge', compact('Dconges' , 'DcongeRef','DcongesVal','StatutAttentdmdcg' , 'StatutValidedmdcg' , 'StatutRefdmdcg'));

    }


    public function ValiderCongeMan(Request $request, $id){

        try{

            $StatutAttentepass = 1;


            $matricul = DB::table('planifier')->where('planifier.id_p', $id)->first();



                // Check the passation status
                $passationetat = DB::select('SELECT valider.etatv FROM valider, tbldmdpasst WHERE tbldmdpasst.idpasst = valider.idpasst AND valider.etatv = ? AND tbldmdpasst.matrcl = ?', [$StatutAttentepass, $matricul->matrcl]);


                //  // Check if there are any records returned
                // if (count($passationetat) > 0) {
                //     // Since there are records, we can safely assume the status is pending
                //     sweetalert('Attention : La passation n\'a pas été totalement effectuée pour cet employé.');

                // }elseif(count($passationetat) == 0){



                    $Aceptcongeman = 2;

                    $RefusConge = DB::update('UPDATE planifier SET etatvalidpl = ? WHERE id_p = ?',[ $Aceptcongeman, $id] );


                    $etatp = 1;

                    $Solde = DB::table('planifier')
                               ->join('tblperdcg','tblperdcg.matrcl','=','planifier.matrcl')
                               ->select('*')
                               ->where([
                                    ['planifier.id_p', '=', $id ]
                                 ])->first();



                        $soldeprevisuelcg = $this->calculateLeaveDays( $Solde->date_depart , $Solde->date_arrive );

                        $Soldecg = $Solde->taux_rest - $Solde->taux_plcg;

                       // dd($Soldecg);



                        $RefusConge = DB::update('update tblperdcg set taux_rest = ? where matrcl = ? '  ,[ $Soldecg , $matricul->matrcl]);


                    notyf("La demande de cong&eacute; a &eacute;t&eacute; accept&eacute; avec succes ",\Flasher\Prime\Notification\NotificationInterface::SUCCESS );

                    // notification de validation ici

                 //   return redirect()->route('DemCongespersonnel.index');




                // }
                return redirect()->route('DemCongespersonnel.index');



}catch(Exception $e){
   // dd($e);
 }

}







            // $StatutAttentepass = 1;


            // $matricul = DB::table('planifier')->where('planifier.id_p', $id)->first();

            // $passationetat = DB::select('select valider.etatv from valider,tbldmdpasst where tbldmdpasst.idpasst = valider.idpasst and valider.etatv =? and tbldmdpasst.matrcl = ?',  [ $StatutAttentepass,  $matricul->matrcl ] );

            // foreach($passationetat as $passationId){


            // }
            //           // 0 pour refuser la demande de congé du personnel
            // $Aceptcongeman = 2;

            // $RefusConge = DB::update('UPDATE planifier SET etatvalidpl = ? WHERE id_p = ?',[ $Aceptcongeman, $id] );

            // notyf("La demande de cong&eacute; a &eacute;t&eacute; accept&eacute; avec succes ",\Flasher\Prime\Notification\NotificationInterface::SUCCESS );

            // // notification de validation ici

            // return redirect()->route('DemCongespersonnel.index');


            //     }
            //   //  if($passation)
                        // // 0 pour refuser la demande de congé du personnel
            // $Aceptcongeman = 2;

            // $RefusConge = DB::update('UPDATE planifier SET etatvalidpl = ? WHERE id_p = ?',[ $Aceptcongeman, $id] );

            // notyf("La demande de cong&eacute; a &eacute;t&eacute; accept&eacute; avec succes ",\Flasher\Prime\Notification\NotificationInterface::SUCCESS );

            // // notification de validation ici

            // return redirect()->route('DemCongespersonnel.index');


    //      }catch(Exception $e){
    //         dd($e);
    //      }

  // }




    public function RefuserCongeMan(Request $request, $id){

        try{

            // 0 pour refuser la demande de congé du personnel
            $Refuscongeman = 0;

            $RefusConge = DB::update('UPDATE planifier SET etatvalidpl = ? WHERE id_p = ?',[$Refuscongeman, $id] );

            notyf("La demande de cong&eacute; a &eacute;t&eacute; refus&eacute;e ",\Flasher\Prime\Notification\NotificationInterface::INFO);


            // notification de refus ici

            return redirect()->route('DemCongespersonnel.index');


         }catch(Exception $e){
        //    dd($e);
         }

    }




}
