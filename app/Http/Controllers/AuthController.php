<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Flasher\Prime\Notification\NotificationInterface;
use Flasher\Prime\FlasherInterface;
use GrahamCampbell\ResultType\Success;
use App\Http\Controllers\View;

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




            if (auth()->user()->role == 'admin') {



                return redirect()->route('dashboard');

            }else if (auth()->user()->role == 'manager') {

                return redirect()->route('dashboardman');

            }else{

                return redirect()->route('dashboarduser');

            }

        }else{

            notyf(" idenfiant incorrect ou utilisateur inexistant",\Flasher\Prime\Notification\NotificationInterface::ERROR);
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

