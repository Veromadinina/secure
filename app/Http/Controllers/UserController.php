<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{        public function index(){

    $users = User::all();

            return view('admin.user',compact("users"));

} 
    //gestion des droits administrateur(management admin right)
        public function manageRight(User $user){


            /*Methode findorfail permet de trouver l'identifiant existant 
            et de mettre un message d'erreur si l'utilisateur n'existe pas*/

         // $user = User::findorfail($id);

           /* if (isset($user)){

                echo $user->name;

            }
           
            else{

                abort(403);

            }*/
            // changement d'etat de user et admin (methode 1)
            /*if ($user->admin==0){

                $user->admin=1;
            }
            else{

                $user->admin=0;

            }*/
           // Changement d'etat de user et admin (methode 2)

            $user->admin = !$user->admin;

            //pour modifier
            $user->update();

            // retoune a affichage principale.
            return back();
        }
    //
}
