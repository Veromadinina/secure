<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActuController extends Controller
{   // creation des methodes permettant de lister et d'editer
    public function index(){
    //creation de ma varible au pluriel pour lister les élements de ma base de donnée
        $actus = Actu::all();

        return view('admin.actu-lister',compact("actus"));
                    //blade

}
    public function editer(Actu $actu){

           
         
        

        return view('admin.actu-editer',compact('actu'));
                        //blade
    }
                //modifier les actus
        public function update(Request $request,Actu $actu){


            $validate = $request->validate(['titre'=>'required']); 

            //ajout des informations

            $actu->update(["titre"=>$request->titre,"description"=>$request->description]);

            
            
        //dd($actu);

                return back();



    }
            //creation d'une actu(ajouter)
        public function create(Request $request){
        
      

            // je verifie l'existence de mon titre car obligatoire
       $validate = $request->validate(['titre'=>'required']); 
            // pretpartion de l'instance d'enregistrement en base de donnéee
            $actu = new Actu;
            //je mets à jour les valeurs après la creation de mon instance je les prepare à mettre en base
        $actu->titre = $request->titre;
        $actu->description = $request->description;

            // je verifie l'existence de mon image
            if($request->hasFile("imageActu")){
                    /***************************************************************** 
                    ANCIENNE METHODE :
                    je recupère les informations de l'image à partir du formulaire
                    $image = $request->file("imageActu");
                   formatage du nom de mon image
                    $fileName = time().".".$image->getClientOriginalExtension();*/

               // dd($fileName);
                    // copie de l'image sur le serveur

                   // Image::make($image)->save(storage_path("/uploads/".$fileName));

                    // retourne le chemin d'accès de l'image

                    /****************************************************************/
                    $path = Storage::putFile('public', $request->file('imageActu'));
                   // enregistrement de l'image en base de donnée.
                    $actu->image = $path;
                   
                    //dd($path);
               // dd($image);

            }

      
      

       $actu->save();

        return back();



    }

            public function delete(Actu $actu){

                    //dd($actu);

                $actu->delete();


                return back();
            }


}
