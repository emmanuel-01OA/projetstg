<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\ArrayParameters\Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Tblac;

class TempsCritiqueActivitesController extends Controller
{
    //
public int $TmpActiviteActf= 1;

//
public int $TmpActiviteInactif = 0 ;

    public function indexTempsCritiqueactivites(){


        $TmpActactif = DB::select("select * from tbdtcritq,tblac,tbltyac where tbdtcritq.code_act = tblac.code_activite and ( tblac.statutac = '1' or tblac.statutac = '0') and tblac.id_type_act = tbltyac.id_type_act and etatcrip= ?" , [ $this->TmpActiviteActf ]);

        $TmpActInactif = DB::select("select * from tbdtcritq,tblac,tbltyac where tbdtcritq.code_act = tblac.code_activite and ( tblac.statutac = '1' or tblac.statutac = '0') and etatcrip= ?" , [$this->TmpActiviteInactif]);


       // dd($TmpActactif);

        return view('managerviews.Activiteviews.Tempscritique.indexTempscritiqueAct', compact('TmpActInactif','TmpActactif'));
    }


    public function TempsCritiqActivitescreat(){

        $Activite = DB::select("select * from tblac where tblac.etatac = 1 and (tblac.statutac ='1' or tblac.statutac ='2') ");

       // dd($Activites);
       return view('managerviews.Activiteviews.Tempscritique.tempscritiqcreate' , compact('Activite'));
    }


    // public function DetailActiviteSelect($CodeActivite){

    //    $Activite = DB::select("select * from tblac where tblac.etatac = 1 and (tblac.statutac ='1' or tblac.statutac ='2') and  code_activite = ?", [$CodeActivite]);

    //     if (empty($activite)) {
    //         return response()->json(['message' => 'Aucune activité'], 404);
    //     }
    //     // Assuming there's only one activity per ID
    //     $activit = $activite[0];


    //     // Convert date fields to the desired format
    //     $startDate = \Carbon\Carbon::parse($activit->date_deb)->format('d/m/Y');
    //     $endDate = \Carbon\Carbon::parse($activit->datefin)->format('d/m/Y');

    //     return response()->json([

    //         'code_activite' =>  $activit->code_activite,
    //         'libelle' => $activit->lib_act,
    //         'start_date' =>  $startDate,
    //         'end_date' =>  $endDate,
    //     ]);
    // }

    public function TempsCritiqActivitescreate(Request $request){


        try{


            $validator = Validator::make($request->all(), [

                'libAct'=>  'required|string',
                'activity'=> 'required|string',
                'datedeb' => 'required|date|before:datefin',
                'datefin' => 'required|date|after:datedeb'

              ]);


              if($validator->fails()){

                notyf("Echec de l'Ajout de l'activit&eacute; le code activité existe déja ",\Flasher\Prime\Notification\NotificationInterface::ERROR);


           // return redirect()->back()->withErrors($validator)->withInput();
              };

              $tempscritique = DB::table('tbdtcritq')->insert([

                'code_act' => $request->activity,
                'lib_crit' => $request->libAct,
                'date_deb_crit' => $request->datedeb,
                'date_fin_crit' => $request->datefin,
                'etatcrip' => 1
         ]);





       notyf("Ajout de la planification temps critique de l' activit&eacute; effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
       return redirect()->route('TempsCritiqActivites.index');

         }catch(Exception $excep){

        notyf("Echec de l'Ajout de la planification du temps critique ",\Flasher\Prime\Notification\NotificationInterface::ERROR);
        return redirect()->back();
       }



     }

}
