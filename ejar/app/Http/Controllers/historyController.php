<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Produit;
use App\Models\Ville;
use App\Models\Vip;
use App\Models\category;
use App\Models\Produit_photo;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use DB;
use Carbon\Carbon;
use App\Models\history;
use Auth;
use App\Models\User;
use App\Models\Order_rent;
use App\Models\Order_sele;
class historyController extends Controller
{
    
    public function addproduit(Request $request){
    	$history = new history();

        $history->produit = Produit::with('category','user','ville','city')->findOrFail($request->id);
        $history->action = 'add';
      $history->user_id = Auth()->user()->id ;
      $history->save();
     
     return "history has been saved!";
  }


  public function deleteproduit(Request $request){
      $history = new history();

        $history->produit = Produit::with('category','user','ville','city')->findOrFail($request->id);
        $history->action = 'delete';
      $history->user_id = Auth()->user()->id ;
      $history->save();
     return "history has been deleted!";
  }







   public function addvip1(Request $request){
    	$history = new history();
$vip =  Vip::find($request->id);
 $produit = Produit::find($vip->Produit_id);
$vip->name = $produit->name ." ". $produit->name_ar;
        $history->vip1 = $vip ;

        $history->action = 'add';
      $history->user_id = Auth()->user()->id ;
      $history->save();
      

     return "vip1 has been saved!";
  }


  public function deletevip1(Request $request){
      $history = new history();
$vip =  Vip::find($request->id);
 $produit = Produit::find($vip->Produit_id);
$vip->name = $produit->name ." ". $produit->name_ar;
        $history->vip1 = $vip ;
        $history->action = 'delete';
      $history->user_id = Auth()->user()->id ;
      dd($history);
      $history->save();
     return "vip1 has been deleted!";
  }




   public function addvip2(Request $request){
    	$history = new history();

     $vip =  Vip::find($request->id);
 $produit = Produit::find($vip->Produit_id);
$vip->name = $produit->name ." ". $produit->name_ar;
        $history->vip2 = $vip ;
        $history->action = 'add';
      $history->user_id = Auth()->user()->id ;
     // dd($history);
      $history->save();
      

     return "vip2 has been saved!";
  }


  public function deletevip2(Request $request){
      $history = new history();

      $vip =  Vip::find($request->id);
 $produit = Produit::find($vip->Produit_id);
$vip->name = $produit->name ." ". $produit->name_ar;
        $history->vip2 = $vip ;
        $history->action = 'delete';
      $history->user_id = Auth()->user()->id ;
      $history->save();
     return "vip2 has been deleted!";
  }




  public function historyproduit($id){
  	$historys = history::where('user_id',$id)->where('produit','!=',null)->get();
  	$produits =collect();

  	foreach ($historys as $key => $history) {
  		 $produit = new Produit();
  		
      $produit->fill($history->produit);
      $produit->action = $history->action;
      $produits->add($produit);
        	}
  	
        $villes = Ville::pluck('ville','id')->all();
$cities = City::pluck('name_ar','id')->all();
foreach ($produits as $key => $value) {



  $dateweb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datefb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $dateinstainstagrame=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datepost=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datewhatsapp=  array(0,0,0,0,0,0,0,0,0,0,0,0 );


$web =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','Web')
         ->where('Produit_id',$value->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($web as $k => $v) {
                        $dateweb[$k-1] = intval($web[$k]);
                        # code...
                    }
$whatsapps =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','whatsapp')
         ->where('Produit_id',$value->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($whatsapps as $k => $v) {
                        $datewhatsapp[$k-1] = intval($whatsapps[$k]);
                        # code...
                    }
$post =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','post')
         ->where('Produit_id',$value->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($post as $k => $v) {
                        $datepost[$k-1] = intval($post[$k]);
                        # code...
                    }
                  
$facebook =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','facebook')
         ->where('Produit_id',$value->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($facebook as $k => $v) {
                        $datefb[$k-1] = intval($facebook[$k]);
                        # code...
                    }
$instagrame =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','instagrame')
         ->where('Produit_id',$value->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($instagrame as $k => $v) {
                        $dateinstainstagrame[$k-1] = intval($instagrame[$k]);
                        # code...
                    }



$value->dateweb = $dateweb;
$value->datefb = $datefb;
$value->dateinstainstagrame = $dateinstainstagrame;
$value->datepost = $datepost;
$value->datewhatsapp = $datewhatsapp;

$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_datestart = $vip1->date;
    $value->vip1_dateend = $vip1->dateend;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_datestart = $vip2->date;
    $value->vip2_dateend = $vip2->dateend;
}
}

        return view('history.indexproduit', compact('produits','cities'));

  }

 public function index($id){
      return view('history.index',compact('id'));
    }



     public function OrderRents($id){
     	      $orderRents = Order_rent::where('user_id', $id)->paginate(25);   

      return view('history.OrderRents',compact('orderRents'));
    }

     public function OrderSeles($id){
     	$orderSeles = Order_sele::where('user_id', $id)->paginate(25);
      return view('history.OrderSeles',compact('orderSeles'));
    }



  public function historyvip1($id){
  	$historyproduit = history::where('user_id',$id)->where('produit','!=',null)->get();
  	$produits =collect();

  	
     	    $user = User::findOrFail($id);
        $name = $user->name ." ". $user->name_ar;
        $vips = collect();

$historys = history::where('user_id',$id)->where('vip1','!=',null)->get();
  	$vips =collect();

  	foreach ($historys as $key => $history) {
  		 $vip = new Vip();

      $vip->fill(json_decode($history->vip1,true));
      
        $vip->name =json_decode($history->vip1,true)['name'];
      $vip->action = $history->action;
      $vips->add($vip);
        	}


 
        foreach ($vips as $item) {
            $item->day = Carbon::parse(now())->diffInDays($item->dateend, false);

            # code...
        }

$type = "Company";
 return view('history.vip1', compact('name','vips','type'));

    }

     public function historyvip2($id){
     	$historyproduit = history::where('user_id',$id)->where('produit','!=',null)->get();
  	$produits =collect();

  	
     	    $user = User::findOrFail($id);
        $name = $user->name ." ". $user->name_ar;
        $vips = collect();

$historys = history::where('user_id',$id)->where('vip2','!=',null)->get();
  	$vips =collect();
//dd($history->vip2);
  	foreach ($historys as $key => $history) {
 
  		 $vip = new Vip();

    
       $vip->fill(json_decode($history->vip2,true));
       $vip->name = json_decode($history->vip2,true)['name']; 
    //   foreach ($historyproduit as $key => $s) {
  		//  $produit = new Produit();
  		
  		// if($vip->Produit_id ==$s->produit['id']){
  		// 	 $produit->fill($s->produit);
  		// 	  break;
  		// }
     
    //     	}
    //     $vip->name = $produit->name ." ". $produit->name_ar;
      $vip->action = $history->action;
      $vips->add($vip);
        	}


 
        foreach ($vips as $item) {
            $item->day = Carbon::parse(now())->diffInDays($item->dateend, false);

            # code...
        }

$type = "Company";
 return view('history.vip1', compact('name','vips','type'));

    
    }



}
