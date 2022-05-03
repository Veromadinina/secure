<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoncompteController extends Controller
{ 
        //point d'entrée de ma classe=constructeur 
        public function __construct(){
                
            //sécurise toutes les pages de mon controlleur
            //$this->middleware("auth");

            // securise avec une exception
           // $this->middleware("auth")->except("panier");


        } 
        public function index(){

                return view("moncompte");

}
        public function panier(){

                return view("panier");
}
    //
}
