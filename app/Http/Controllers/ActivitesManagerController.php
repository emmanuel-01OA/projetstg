<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\DBAL\ArrayParameters\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ActivitesManagerController extends Controller
{


    // activite est actif
public int $EtatActiviteActf = 1;


// activite est inactif
public int $EtatActiviteInactif = 0;





    public function indexLesactivites(){


        $ActiviteActif = DB::select('select * from tblac, tbltyac where tblac.id_type_act = tbltyac.id_type_act and etatac = ?', [$this->EtatActiviteActf]);


        $Activiteinactif = DB::select('select * from tblac, tbltyac where tblac.id_type_act = tbltyac.id_type_act and etatac = ?', [$this->EtatActiviteInactif ]);

        // $statutac =

        // if(){
//
     //   }
  //    dd($ActiviteActif);

        return view("managerviews.Activiteviews.indexactiviteman", compact('ActiviteActif' , 'Activiteinactif'));

    }


    public function Actcreate(){

        $EtattypeActif = 1;
        $TypeAct = DB::select('select * from tbltyac where etatyac=?', [$EtattypeActif]);

        return view('managerviews.Activiteviews.create', compact('TypeAct'));
    }

public function CreateActivite(Request $request){

    try{


        $validator = Validator::make($request->all(), [

            'codeAct' => 'required|string',
            'libAct'=>  'required|string',
            'status'=> 'required|string',
             'activit'=> 'required|int' ,
             "descip"=> 'required|string',
            'datedeb' => 'required|date|before:datefin',
           'datefin' => 'required|date|after:datedeb'


          ]);

          if($validator->fails()){

            notyf("Echec de l'Ajout de l'activit&eacute; le code activité existe déja ",\Flasher\Prime\Notification\NotificationInterface::ERROR);


            return redirect()->back()->withErrors($validator)->withInput();
          };

          $statuts = DB::table('tblac')->insert([

            'code_activite' => $request->codeAct,
            'id_type_act' => $request->activit,
            'description' => $request->descrip,
            'etatac' => 1,
            'date_deb' =>  $request->datedeb,
            'datefin' => $request->datefin,
            'statutac' =>  $request->status,
            'lib_act' =>  $request->libAct,

        ]);


        notyf("Ajout de l' activit&eacute; effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
        return redirect()->route('LesActivites.index');


    }catch(Exception $excep){

        notyf("Echec de l'Ajout de l'activit&eacute; ",\Flasher\Prime\Notification\NotificationInterface::ERROR);
        return redirect()->back();


    }

}



}
