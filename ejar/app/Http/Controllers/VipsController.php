<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Vip;
use Illuminate\Http\Request;
use Exception;
use Auth;
class VipsController extends Controller
{

  
    /**
     * Store a new vip in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
          
            $data = $this->getData($request);
            if(Vip::where([['Produit_id','=',$request->Produit_id],['vip','=',$request->vip]])->first()){
                $vip = Vip::where([['Produit_id','=',$request->Produit_id],['vip','=',$request->vip]])->first();
                $vip->update($data);
            }else{
                 $vip =  Vip::create($data);
            }
          $produit = Produit::findOrFail($vip->Produit_id);
          if ($vip->vip == 1) {
            $produit->vip1 = "on"; 
            if(Auth::user()->type == 'seller' ){
        $request->id = $vip->id;
      $hestory = (new historyController)->addvip1($request);
    }

          }elseif ($vip->vip == 2) {
            if(Auth::user()->type == 'seller' ){
        $request->id = $vip->id;

      $hestory = (new historyController)->addvip2($request);

    }
            $produit->vip2 = "on";
          }

          $produit->save();
      


$request->request->add(['user_id' => $produit->user_id]);
$request->request->add(['message' => "العقار ".$produit->name ." هو Vip".$vip->vip." حتى ". $request->date ]);
$request->request->add(['type' => '1']);


        $result = (new notificationController)->send($request);
 



          return ("success" );
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'vip' => 'string|min:1|nullable|numeric',
                'date' => 'string|min:1|nullable',
                'dateend' => 'string|min:1|nullable',
                'Produit_id' => 'nullable', 
        ];

        $data = $request->validate($rules);


        return $data;
    }

public function delete(Request $request)
    {
        try {
            
          
            if(Vip::where([['Produit_id','=',$request->Produit_id],['vip','=',$request->vip]])->first()){
                $vip = Vip::where([['Produit_id','=',$request->Produit_id],['vip','=',$request->vip]])->first();
               if ($vip->vip == 1) {
          
            if(Auth::user()->type == 'seller' ){
        $request->id = $vip->id;
      $hestory = (new historyController)->deletevip1($request);
    }
          }elseif ($vip->vip == 2) {
           
            if(Auth::user()->type == 'seller' ){
        $request->id = $vip->id;
      $hestory = (new historyController)->deletevip2($request);
    }
          }



                $vip->delete();
            }
          $produit = Produit::findOrFail($vip->Produit_id);
          if ($vip->vip == 1) {
            $produit->vip1 = "off"; 

          }elseif ($vip->vip == 2) {
            $produit->vip2 = "off";
          }
          $produit->save();
         $request->user_id = $produit->user_id;
         // $request->message = "le Produit ".$produit->name ." est Vip".$vip->vip." jusqu'a ". $request->date ;


         //   $result = (new notificationController)->send($request);
          return ("success" );
        } catch (Exception $exception) {
dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('vips.unexpected_error')]);
        }
    }


}
