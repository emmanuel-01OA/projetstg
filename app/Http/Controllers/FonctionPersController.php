<?php

namespace App\Http\Controllers;

use App\Models\Tblfonc;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FonctionPersController extends Controller
{
    //

    public function allfonction(){


        // $statut = DB::table('tblstentrp')->get();

        // requete pour la base de donnees concernant la table status
         $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
         $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);

         return view('fonction.allfonction', compact('fonction', 'fonctionin'));
     }

     public function create(){

        return view("fonction.create");
     }


     public function store(Request $request){



//        // dd($request);
   try{

    $request->validate([
        'codefonct' => 'required|string',
        'libellefonct' => 'required|string',
         ]);

        Tblfonc::create([
        "code_fonct" => $request->codefonct,
        "libelle_fonct" => $request->libellefonct,
        "etatf" =>1,

    ]);

// //

   notyf("Ajout de fonction effectu&eacute; avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

    return redirect()->route('fonction.allfonction');

     }catch(Exception $e){
        notyf("Echec lors de l'insertion de la fonction , le code de la fonction existe d&eacute;ja ",\Flasher\Prime\Notification\NotificationInterface::ERROR);
        return redirect()->back();
                       }

     }

}
