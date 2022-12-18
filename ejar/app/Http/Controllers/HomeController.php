<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Produit;
use App\Models\Ville;
use App\Models\Vip;
use App\Models\Vu;
use App\Models\User;
use Auth;
use Carbon\Carbon;

use Raulr\GooglePlayScraper\Scraper;

class HomeController extends Controller
{

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//       $scraper = new Scraper();
// $app = $scraper->getApp('com.mojang.minecraftpe');
//  dd($app); 
        $user = 0;
        $company = 0;
        $vupost = 0;
        $vuinsta = 0;
        $vufb = 0;
        $vuweb = 0;
        $whatsapp = 0;
             $dateweb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datefb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $dateinstainstagrame=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datepost=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datewhatsapp=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $monthweb=  array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0  );
             $monthfb=  array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0  );
             $monthinstainstagrame=  array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0  );
             $monthpost=  array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0  );
             $monthwhatsapp=  array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0  );

        if(Auth::user()->type == 'admin' ||Auth::user()->type == 'superadmin' ){
            $produit = Produit::all();
           $produits = count($produit);
           $company = count( User::where('type','campany1')->orwhere('type','campany2')->orwhere('type','campany3')->orwhere('type','campany4')->orwhere('type','campany5')->orwhere('type','campany6')->orwhere('type','campany7')->orwhere('type','campany8')->orwhere('type','campany9')->get());
           $active = count(Produit::where('DELETED','off')->where('accepted','Yes')->get());
            $enatant = count(Produit::where('DELETED','off')->where('accepted','off')->get());
           $user = count( User::where('type','user')->get());
            

           foreach ($produit as  $value) {




         // ->whereMonth('created_at', date('m'))



              $vupost =  $vupost +$value->vupost ;
             $vuinsta =$vuinsta +$value->vuinsta ;
             $vufb =$vufb +$value->vufb ;
             $vuweb =$vuweb +$value->vuweb ;
             $whatsapp =$whatsapp +$value->clique_whatsapp ;
             
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


 $webmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','Web')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($webmonth as $k => $v) {
                        $monthweb[$k-1] = intval($webmonth[$k]);
                        # code...
}
$whatsappsmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','whatsapp')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($whatsappsmonth as $k => $v) {
                        $monthwhatsapp[$k-1] = intval($whatsappsmonth[$k]);
                        # code...
                    }
$postmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','post')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($postmonth as $k => $v) {
                        $monthpost[$k-1] = intval($postmonth[$k]);
                        # code...
                    }
                  
$facebookmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','facebook')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($facebookmonth as $k => $v) {
                        $monthfb[$k-1] = intval($facebookmonth[$k]);
                        # code...
                    }
$instagramemonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','instagrame')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($instagramemonth as $k => $v) {
                        $monthinstainstagrame[$k-1] = intval($instagramemonth[$k]);
                        # code...
                    }
           
             
      }     



        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3'|| Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5'  || Auth::user()->type == 'campany6' ||Auth::user()->type == 'campany7' ||Auth::user()->type == 'campany8' ||Auth::user()->type == 'campany9' || Auth::user()->type == 'seller' || Auth::user()->type == 'user'){
             $produit = Produit::where('user_id',Auth::user()->id)->get();
            $produits = count($produit);
            $active = count(Produit::where('user_id',Auth::user()->id)->where('DELETED','off')->where('accepted','Yes')->get());
            $enatant = count(Produit::where('user_id',Auth::user()->id)->where('DELETED','off')->where('accepted','off')->get());
            foreach ($produit as  $value) {

             $vupost =  $vupost +$value->vupost ;
             $vuinsta =$vuinsta +$value->vuinsta ;
             $vufb =$vufb +$value->vufb ;
             $vuweb =$vuweb +$value->vuweb ;
             $whatsapp =$whatsapp +$value->clique_whatsapp ;
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




 $webmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','Web')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($webmonth as $k => $v) {
                        $monthweb[$k-1] = intval($webmonth[$k]);
                        # code...
                    }

$whatsappsmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','whatsapp')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($whatsappsmonth as $k => $v) {
                        $monthwhatsapp[$k-1] = intval($whatsappsmonth[$k]);
                        # code...
                    }
$postmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','post')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($postmonth as $k => $v) {
                        $monthpost[$k-1] = intval($postmonth[$k]);
                        # code...
                    }
                  
$facebookmonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','facebook')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($facebookmonth as $k => $v) {
                        $monthfb[$k-1] = intval($facebookmonth[$k]);
                        # code...
                    }
$instagramemonth =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('Day(created_at) as month'))
         ->where('vu','instagrame')
         ->where('Produit_id',$value->id)
         ->whereMonth('created_at', date('m'))
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($instagramemonth as $k => $v) {
                        $monthinstainstagrame[$k-1] = intval($instagramemonth[$k]);
                        # code...
                    }                    
           

        }


             }  
                


        return view('home',compact('produits','company','user','vuweb','vupost','vuinsta','vufb','whatsapp','dateweb','datefb','dateinstainstagrame','datepost','datewhatsapp','active','enatant','monthweb','monthfb','monthinstainstagrame','monthpost','monthwhatsapp'));

    }


    public function gestion(){
      return view('gestion.index');
    }

}
