<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(){

        $actus = Actu::all();

        return view('actu-client',compact('actus'));
    }

    public function detail(Actu $actu){


        return view('actudetail',compact('actu'));

    }
    //
}
