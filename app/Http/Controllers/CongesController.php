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

        return view('collab.conges.createcg');


    }
    //



    public function planifcongescreate(Request $Request){

        try{

            $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();



            $matriculman = DB::select('select matrcl_man from dtbdesign_bak_mang where matrcl_pers = ?',[ $matricul->matrcl ]);



            $Request->validate([

               'datedc' => 'required|date|before:datefc',

               'datefc' => 'required|date|after:datedc',
            ]);

// datedc = trim($Request.input('datedc'));
// datefc = trim($Request.input('datefc'));

            $tbcritiques = DB::select('select * from tbdtcritq');
            $travailler_user =  DB::table('travailler_sur')->where('travailler_sur.matrcl', $matricul->matrcl )->get();


 // dd($tbcritiques);
            $usercritique = false;
          foreach( $tbcritiques as  $tbcritique){
          //  notyf("Vous ne pouvez pas enregistrer planifier votre congés car vous êtes à une date critique",\Flasher\Prime\Notification\NotificationInterface::ERROR);


            foreach($travailler_user as $travailler_sur){




             //   if($tbcritique->code_act == $travailler_sur->code_activite){
                   if(strcasecmp($tbcritique->code_act ,$travailler_sur->code_activite) === 0){


                //  $dateDebutcritq = Carbon::parse($tbcritique->date_deb_crit);
                //  $dateFincritq = Carbon::parse($tbcritique->date_fin_crit);
                //  $datedb = Carbon::parse($Request->input('datedc'));


                     if(Carbon::parse($Request->datedc)->between($tbcritique->date_deb_crit, $tbcritique->date_fin_crit) ){
                   // if($datedb->between($dateDebutcritq,$dateFincritq) ){

                       // dd($travailler_sur->code_activite);

                         $usercritique = true;
                         break 2;
                    }
                }
             }

              }


              if($usercritique){

               // dd($usercritique);
                notyf("Vous ne pouvez pas enregistrer planifier votre congés car vous êtes à une date critique",\Flasher\Prime\Notification\NotificationInterface::ERROR);

              }


        }catch(Exception $e){
            dd($e);

        }
        return redirect()->route('mescongesuser.create');

      //  redirect()->back()->with("sucess","ttt");

    }

    public function indexconges(){

        $etatp = 1;

        // les congés sont actifs
        // Dans notre cas ce sont les congés annuels
        $etatlbcgvld = 1;
        $matricul = DB::table('tblper')->where('tblper.eml', auth()->user()->email)->first();

       // $statutentrep = DB::table('tblstentrp')->where('');

       // $statutentrep = DB::table('tblstentrp')->where('');

        $conge = DB::table('tblcg')->where('etatc', $etatlbcgvld )->get();

        $tblperinfocg = DB::table('tblper')
        ->join('tblperdcg','tblperdcg.matrcl','=','tblper.matrcl')
        ->join('tblstentrp', 'tblstentrp.code_statut','=','tblper.code_statut')
        ->select('tblstentrp.*','tblper.*','tblperdcg.*')
        ->where([
            ['tblper.matrcl', '=', $matricul->matrcl ],

        ])
        ->get();

      //  dd($conge);

        $planifcg = DB::table('planifier')
        ->join('tblcg', 'planifier.idcg','=','tblcg.idcg')
        ->select('planifier.*','tblcg.*')
        ->where([
            ['planifier.matrcl', '=', $matricul->matrcl ],
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
            ['planifier.etatvalidpl', '=', $cgval ],

        ])
        ->get();



        $planifcgref = DB::table('planifier')
        ->join('tblcg', 'planifier.idcg','=','tblcg.idcg')
        ->select('planifier.*','tblcg.*')
        ->where([
            ['planifier.matrcl', '=', $matricul->matrcl ],
            ['planifier.etatvalidpl', '=', $cgref ],

        ])
        ->get();


       // dd($planifcgref);


       // dd($tblperinfocg);
        // $fonction = DB::select('select * from tblfonc where etatf = ?', [1]);
        // $fonctionin = DB::select('select * from tblfonc where etatf = ?', [0]);


        return view('collab.conges.indexcg', compact('matricul','conge', 'planifcg','tblperinfocg','planifcgref','planifcgval'));
    }


    public function indexCongespersonnel(){

        // A parametrer
        $etatp = 1;

        // conges valide
        $statutValidConge = 1;
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


  //      $Conge = DB::table('users')->;

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

// dd($Dconges);

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

   ///
   ///
   ///
     return view('managerviews.congesviews.Demandecongepersonnel.demandconge', compact('Dconges' , 'StatutAttentdmdcg' , 'StatutValidedmdcg' , 'StatutRefdmdcg'));

    }



}
