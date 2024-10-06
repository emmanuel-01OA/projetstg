<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\AuthRequest;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use \Flasher\Prime\Notification\NotificationInterface;
use Flasher\Prime\FlasherInterface;


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



            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {

                    notyf("Identifiant incorrect ou utilisateur inexistant", \Flasher\Prime\Notification\NotificationInterface::ERROR);

            }else{



            $token = $user->createToken('MyApp')->plainTextToken;

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


        public function listTokens(Request $request)
        {
            return response()->json($request->user()->tokens);
        }


        public function revokeToken(Request $request, $tokenId)
        {
            $token = $request->user()->tokens()->find($tokenId);
            if ($token) {
                $token->delete();
             //   return response()->json(['message' => 'Token révoqué avec succès']);
            }

           // return response()->json(['message' => 'Token non trouvé'], 404);
        }



    public function logout(Request $request)
        {
            Auth::logout();

        //    notyf("deconnexion avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);
        //     return redirect()->route('login');

       // $request->user()->currentAccessToken()->delete();
        notyf("deconnexion avec succes",\Flasher\Prime\Notification\NotificationInterface::SUCCESS);

        return redirect()->route('logout');
        }


    }
