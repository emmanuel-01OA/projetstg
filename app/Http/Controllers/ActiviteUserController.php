<?php

namespace App\Http\Controllers;

use App\Models\TravaillerSur;
use Doctrine\DBAL\ArrayParameters\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ActiviteUserController extends Controller
{
    //


    public function indexMesactivites(){

     //   $matricul = DB::select('select matrcl from tblper where tblper.eml = ?', [auth()->user()->email]);

     //   $personne=DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct and tblper.etatp=1');

       // $personne =DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct');

    //   $personnelin = DB::select('select matrcl,nam,renam,eml,conta,tblfonc.libelle_fonct,ty_user,tblper.code_statut from tblper,tblfonc,tblstentrp where tblper.code_statut=tblstentrp.code_statut and tblper.code_fonct = tblfonc.code_fonct and tblper.etatp=0');

        // $users = DB::table('users')
        //     ->select('name', 'email as user_email')
        //     ->get();


        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

        $StatutuserAct = 1;
    //    $matricul = DB::select('select matrcl from tblper where tblper.eml = ?', [auth()->user()->email]);
        $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
        $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);

        $activite = DB::select("select distinct travailler_sur.code_activite, travailler_sur.matrcl,  travailler_sur.idtrav , travailler_sur.etattrs,tbltyac.libelle_activite,tblac.description ,travailler_sur.descrip,travailler_sur.date_debut,travailler_sur.date_fin from tblac, tbltyac,travailler_sur,users WHERE tblac.id_type_act = tbltyac.id_type_act and travailler_sur.code_activite = tblac.code_activite and travailler_sur.matrcl = ? and travailler_sur.etattrs = ? ", [$matricul->matrcl , $StatutuserAct] );



        return view('collab.activites.indexact', compact('activite', 'fonctionin', 'matricul','StatutuserAct'));
    }


    public function create(){


        $activite = DB::select('select distinct * from tblac where etatac = 1');


        return view('collab.activites.Ajoutactive', compact('activite') );
    }

    public function postMesActivites(Request $Request ){

        $activite = DB::select('select distinct * from tblac where etatac = 1');

       // dd($activite);
        try{

            $validator = Validator::make($Request->all(), [

                'datedeb' => 'required|date|before:datefin',
                'datefin' => 'required|date|after:datedeb',
                'descrip' => 'required|string',
                'activit' => 'required|string'




        ]);
     //   notyf("Ajout du statut effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
    //  [
    //     'datedeb.before' => 'La date de début doit être avant la date de fin.',
    //     'datefin.after' => 'La date de fin doit être après la date de début.',
    //     'descrip.required' => 'La description est obligatoire.',
    //     'activit.string' => 'L\'activité doit être une chaîne de caractères.',
    // ]

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }


            // état de l activité
            $etatactif = 1;


            $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();


          $statuts = DB::table('travailler_sur')->insert([

                 'matrcl' => $matricul->matrcl,
                 'code_activite'=> $Request->activit,
                 'date_debut' => $Request->datedeb,
                 'date_fin' => $Request->datefin,
                 'descrip' => $Request->descrip,
                 'etattrs'=> $etatactif,

            ]);

        //  TravaillerSur::create([
        //     'matrcl' => $matricul,
        //     'code_activite' => $Request->activit,
        //     'date_debut' => $Request->datedeb,
        //     'date_fin' => $Request->datefin,
        //     'descrip' => $Request->descrip,
        //     'etattrs' => 1
        // ]);
          //  dd( $statuts);

            notyf("Ajout de la planifiaction de l'activit&eacute; effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
            return redirect()->route('mesactivites.index');



        }catch(Exception $excep){
            // dd($excep);
            notyf("Echec de l'Ajout de la planification de l' activit&eacute; ",\Flasher\Prime\Notification\NotificationInterface::ERROR);
            return redirect()->back();
        }




    }
}
