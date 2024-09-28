<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Flasher\Prime\Notification\NotificationInterface;
use Flasher\Prime\FlasherInterface;
use GrahamCampbell\ResultType\Success;
use App\Http\Controllers\View;

use function Laravel\Prompts\alert;

class AuthController extends Controller

{




    // la fonction retourne une vue nommée auth
    public function login() {
        return view('auth.login');
    }





    // public function handlerLogin(AuthRequest $request){

       //  dd($request -> only("email","password"));
      //   $credentials = $request -> only("email","password");

    //     if(Auth::attempt($credentials = $request -> only("email","password"))){


    //        return redirect()->route('dashboard');

    //     }else{



    //         notyf("utilisateur inexistant",\Flasher\Prime\Notification\NotificationInterface::ERROR);

    //         return redirect()-> back()->with('error_ms','utilisateurs inexistant');


    //     }



    // }



     public function handlerLogin(AuthRequest $request){

      //  dd($request -> only("email","password"));
     //   $credentials = $request -> only("email","password");



        if(Auth::attempt($credentials = $request -> only("email","password"))){




       if (Auth::attempt($credentials)) {
                // Check user role and redirect accordingly
                switch (auth()->user()->role) {
                    case 'admin':
                        return redirect()->route('dashboard');
                    case 'manager':
                        return redirect()->route('dashboardman');
                    default:
                        return redirect()->route('dashboarduser');
                }

            }




            // if (Auth::attempt($credentials)) {
            //     // Check user role and redirect accordingly
            //     switch (auth()->user()->role) {
            //         case 'admin':
            //             return redirect()->route('dashboard');
            //         case 'manager':
            //             return redirect()->route('dashboardman');
            //         default:
            //             return redirect()->route('dashboarduser');
            //     }



        }else{


 // Flash error message
               notyf("Identifiant incorrect ou utilisateur inexistant", \Flasher\Prime\Notification\NotificationInterface::ERROR);

 // Redirect back to login with input
               return redirect()->route('login');

               }

        }





    public function logout()
        {
            Auth::logout();

           notyf("deconnexion avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
            return redirect()->route('login');

        }


    }
