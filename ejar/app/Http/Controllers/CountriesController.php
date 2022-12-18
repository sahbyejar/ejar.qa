<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\countries;
use Illuminate\Http\Request;
use Exception;

class CountriesController extends Controller
{

    /**
     * Display a listing of the countries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $countriesObjects = countries::with('user')->paginate(2000);
      

        return view('countries.index', compact('countriesObjects'));
    }


    public function saveedituser(Request $request){
        
          try {
            $countrie = countries::find($request->id);
        $countrie->produit_user = $request->produit_user;
        $countrie->save();


        return ("success");
            
        } catch (Exception $e) {
           return ("failed"); 
        }
    }

   
    public function update( Request $request)
    {
        try {
            
       
            
            $countries = countries::findOrFail($request->id);
            if($countries->stat == 0){
                $countries->stat = 1;
            }else{
                $countries->stat = 0;
            }
            $countries->save();
            return "success";
           

           
        } catch (Exception $exception) {

          return "faild";
        }        
    }

   
   

}
