<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Doctrine\DBAL\ArrayParameters\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class AttributionBackupController extends Controller
{
    //

// index

    public function indexAttributionbackup(){


        $attribbackup = DB::table('dtbdesign_bak_mang')
        ->join('tblper', 'tblper.matrcl', '=', 'dtbdesign_bak_mang.matrcl_pers')
        ->join('tblman', 'tblman.matrcl', '=', 'dtbdesign_bak_mang.matrcl_man')
        ->join('tblbackp', 'tblbackp.matrcl', '=', 'dtbdesign_bak_mang.matrcl_back')
        ->join('tblfonc as fonction_per', 'fonction_per.code_fonct', '=', 'tblper.code_fonct')
        ->join('tblfonc as fonction_back', 'fonction_back.code_fonct', '=', 'tblbackp.code_fonct')
        ->select('dtbdesign_bak_mang.*', 'tblper.nam as nompers', 'tblper.renam as renompers',
                 'tblman.nam as nomana', 'tblman.renam as renomana', 'tblbackp.nam as nomback',
                 'tblbackp.renam as renomback', 'fonction_per.libelle_fonct as fonction_per_libelle',
                 'fonction_back.libelle_fonct as fonction_back_libelle')
        ->distinct()
        ->get();

        return view('managerviews.AttribBackup.indexAttribbackup', compact('attribbackup'));

    }



    // create
    public function attribbackcreat(){


        $attribbackup = DB::table('dtbdesign_bak_mang')
        ->join('tblper', 'tblper.matrcl', '=', 'dtbdesign_bak_mang.matrcl_pers')
        ->join('tblman', 'tblman.matrcl', '=', 'dtbdesign_bak_mang.matrcl_man')
        ->join('tblbackp', 'tblbackp.matrcl', '=', 'dtbdesign_bak_mang.matrcl_back')
        ->join('tblfonc as fonction_per', 'fonction_per.code_fonct', '=', 'tblper.code_fonct')
        ->join('tblfonc as fonction_back', 'fonction_back.code_fonct', '=', 'tblbackp.code_fonct')
        ->select('dtbdesign_bak_mang.*', 'tblper.nam as nompers', 'tblper.renam as renompers',
                 'tblman.nam as nomana', 'tblman.renam as renomana', 'tblbackp.nam as nomback',
                 'tblbackp.renam as renomback', 'fonction_per.libelle_fonct as fonction_per_libelle',
                 'fonction_back.libelle_fonct as fonction_back_libelle')
        ->distinct()
        ->get();



        return view('managerviews.AttribBackup.AttribbackupCreate' , compact('attribbackup'));
    }

    public function AttributionbackupStore(Request $request){

        try{

        $validator = Validator::make($request->all(), [

            'matrclpers'=> 'required|string',

            'matrclback' =>'required|string'

          ]);

          if($validator->fails()){

            notyf("Echec de l'Ajout de l'activit&eacute; le code activité existe déja ",\Flasher\Prime\Notification\NotificationInterface::ERROR);


       // return redirect()->back()->withErrors($validator)->withInput();
          };



          $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();



          $Attribback = DB::table('dtbdesign_bak_mang')->insert([

            'matrcl_pers'=> $request->matrclpers,
            'matrcl_back'=> $request->matrclback,
            'matrcl_man'=> $matricul->matrcl
        ]);


        notyf("Attribution du backup effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
        return redirect()->route('Attributionbackup.index');


      }catch(Exception $excep){

        notyf("Echec de l'Ajout de l'attribution du backup ",\Flasher\Prime\Notification\NotificationInterface::ERROR);
        return redirect()->back();


     }

    }




}
