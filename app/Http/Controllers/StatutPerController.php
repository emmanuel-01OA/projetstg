<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class StatutPerController extends Controller
{
    //

    public function allstatut(){

        $actifstat = 1;
        $actifInactif = 0;

       // $statut = DB::table('tblstentrp')->get();

       // requete pour la base de donnees concernant la table status
        $statut = DB::select('select * from tblstentrp where etatst = ?', [1]);
        $statutin = DB::select('select * from tblstentrp where etatst = ?', [0]);

        return view('statutentreprise.allstatut', compact('statut', 'statutin'));
    }


    public function createStatutpers(){

        return View('statutentreprise.create');
    }

    public function editeStatut(){



        return View('statutentreprise.edite', compact('status'));
    }


    public function store(Request $Request){


        try{

            $Request -> validate([

                'code' => 'required|integer',

               'libelle' => 'required|string',

            ]);



          $statuts = DB::table('tblstentrp')->insert([
                'code_statut' => $Request->code,
                 'type_statut' => $Request->libelle,
                 'etatst'=>1,

            ]);

            notyf("Ajout du statut effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

            return redirect()->route('statutpers.allstatut');



        }catch(Exception $excep){
            // dd($excep);
            notyf("Echec de l'Ajout du statut effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::ERROR);
            return redirect()->back();
        }


    }


}
