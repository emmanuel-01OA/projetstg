<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class DataCongesController extends Controller
{
    //


    public function indexVisualisationConges(){


        $etatvalidcg = 2;
        $etatf = 1;

        $conges = DB::select('select * from planifier where etatvalidpl = ? and etatf = ?',[$etatvalidcg , $etatf ]);

      //  dd($conges);

        $data = [];

        $monthsInFrench = [
            'January' => 'Janvier',
            'February' => 'Février',
            'March' => 'Mars',
            'April' => 'Avril',
            'May' => 'Mai',
            'June' => 'Juin',
            'July' => 'Juillet',
            'August' => 'Août',
            'September' => 'Septembre',
            'October' => 'Octobre',
            'November' => 'Novembre',
            'December' => 'Décembre',
        ];


        foreach ($monthsInFrench as $month) {
            $data[$month] = 0; // Initialiser à 0
        }

        // for ($i = 0; $i < 12; $i++) {
        //     $month = Carbon::now()->subMonths($i)->format('F');
        //     $data[$month] = 0; // Initialiser à 0
        // }


        foreach ($conges as $conge) {

            $start = Carbon::parse($conge->date_depart);
            $end = Carbon::parse($conge->date_arrive);
            $days = $start->diffInDays($end) + 1; // Inclure le jour de fin

            $month = $start->format('F');
            // if (isset($data[$month])) {
            //     $data[$month] += $days; // Ajouter les jours de congé
            // }


            while ($start <= $end) {
                $month = $start->format('F'); // Récupérer le nom du mois en anglais
                if (isset($monthsInFrench[$month])) {
                    $data[$monthsInFrench[$month]]++; // Incrémenter le jour de congé pour ce mois
                }
                $start->addDay(); // Passer au jour suivant
            }



        //     if (isset($monthsInFrench[$month])) {


        //         $data[$monthsInFrench[$month]] += $days; // Ajouter les jours de congé
        //     }
        }

          // Inverser les clés pour avoir les mois de janvier à décembre
          $months = array_keys($data);
          $counts = array_values($data);


          $matrcletat = 2;


          $tasks = DB::table('planifier')
          ->join('tblper', 'tblper.matrcl','=','planifier.matrcl')
          ->select('*')
          ->where([
            ['planifier.etatvalidpl', '=', $matrcletat ],

        ])
        ->get();

     //   dd($tasks);
        //   return view('gantt.index', compact('tasks'));


        //   if ($request->has('employee_name') && $request->has('date')) {
        //     $leaves = Leave::where('employee_name', $request->employee_name)
        //                    ->whereDate('start_date', '<=', $request->date)
        //                    ->whereDate('end_date', '>=', $request->date)
        //                    ->get();
        // }

        return view("managerviews.Dataviews.VisualisationPlannConges", compact('months', 'counts', 'tasks'));
    }






}
