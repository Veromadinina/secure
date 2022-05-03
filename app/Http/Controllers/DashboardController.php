<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{ 
    
        public function index(){
                //message d'erreur concernant l'accès administrateur
            if (! Gate::allows('access-admin')) {
                abort(403);
            
            }

            return view('dashboard');

        }
    //
}
