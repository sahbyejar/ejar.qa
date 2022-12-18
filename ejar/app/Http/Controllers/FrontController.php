<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Produit;
use App\Models\Ville;
use App\Models\Vip;
use App\Models\User;
use App\Models\category;
use App\Models\Produit_photo;
use Auth;
use App\Models\favorite;
use Mail;
use App\Models\Slider;
use Carbon\Carbon;
use App\Models\Settings;
class FrontController extends Controller
{
    
    public function index(){
    	$categories = category::all();
        $date = new Carbon;
    	$sliders = Slider::get();
        $setting = Settings::first();
              $produits1 = collect(new Produit);
$vipget =Vip::where('vip',1)->get(); 



            $produits1 = Produit::where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->get();
          // dd($produit1);

            $produits2 = collect(new Produit);
$vipget2 =Vip::where('dateend','<',$date)->where('date','>=',$date)->where('vip',2)->get(); 
       
          foreach ($vipget2 as $key => $values) {
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->first();
            $produits2->add($produit);
          }
      
       
  $produits3 = Produit::where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->orderBy('created_at', 'desc')->take(6)->get();
      
  if(Auth::user()){
        foreach ($produits1 as  $value) {
           $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$value->id)->first();
           if($favorite){
            $value->favorite = $favorite->id;
           }else{
            $value->favorite = null;
           }
          
        }
         foreach ($produits2 as  $value) {
           $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$value->id)->first();
           if($favorite){
            $value->favorite = $favorite->id;
           }else{
            $value->favorite = null;
           }
          
        }
         foreach ($produits3 as  $value) {
           $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$value->id)->first();
           if($favorite){
            $value->favorite = $favorite->id;
           }else{
            $value->favorite = null;
           }
          
        }
      }

    	    return view('welcome',compact('categories','produits1','produits2','produits3','sliders','setting'));
    }


public function listingcategory($category){
      $setting = Settings::first();
    	$category = category::where('id',$category)->first();
    	$categories = category::all();
    	$produits = Produit::where('category_id',$category->id)->where('accepted','Yes')->with('category','user','ville','city')->paginate(10);
      //  dd($produits);
      if(Auth::user()){
        foreach ($produits as  $value) {
           $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$value->id)->first();
           if($favorite){
            $value->favorite = $favorite->id;
           }else{
            $value->favorite = null;
           }
          
        }
      }
    	
    	    return view('front.produit',compact('produits','category','categories','setting'));
    }



    


public function vendor($vendor){
          $setting = Settings::first();
      
$categories = category::all();
$vendor = User::find($vendor);
$produits = Produit::where('user_id',$vendor->id)->where('accepted','Yes')->with('category','user','ville','city')->paginate(10);
   if(Auth::user()){
        foreach ($produits as  $value) {
           $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$value->id)->first();
           if($favorite){
            $value->favorite = $favorite->id;
           }else{
            $value->favorite = null;
           }
          
        }
      }
          return view('front.vendor',compact('categories','vendor','produits','setting'));

    }

public function listing($produit){
          $setting = Settings::first();
      $produit = Produit::Where('id',$produit)->with('category','user','ville','city')->first();
      $categories = category::all();
       $images = Produit_photo::where('produit_id',$produit->id)->get();
       $image = new Produit_photo();
       $image->photo = $produit->photo;
       $image->produit_id = $produit->id;

       $images->add($image);
            $produits = Produit::where('category_id',$produit->category_id)->where('accepted','Yes')->with('category','user','ville','city')->get()->take(3);
 if(Auth::user()){
   $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$produit->id)->first();
     if($favorite){
            $produit->favorite = $favorite->id;
           }else{
            $produit->favorite = null;
           }
        foreach ($produits as  $value) {
           $favorite = favorite::where('user_id',Auth::user()->id)->where('produit_id',$value->id)->first();
           if($favorite){
            $value->favorite = $favorite->id;
           }else{
            $value->favorite = null;
           }
          
        }
      }
          return view('front.produitshow',compact('produit','categories','images','produits','setting'));
    }


    
    public function contact(){
          $setting = Settings::first();
      $user = User::find(1);
$categories = category::all();

          return view('front.contact',compact('categories','user','setting'));

    }

    public function Filter(Request $request){
            $setting = Settings::first();
      // dd($request);
       if ($request->category != '0') {
         # code...\
                $category = category::where('id',$request->category)->first();
         $produits = Produit::where('category_id',$category->id)->where('accepted','Yes')->where('price','<',$request->pricemax)->where('price','>',$request->pricemin)->with('category','user','ville','city')->paginate(10);

       }else{
                $category = category::where('id',1)->first();
        $category->id = 0 ;
       
         $produits = Produit::where('accepted','Yes')->where('price','<',$request->pricemax)->where('price','>',$request->pricemin)->with('category','user','ville','city')->paginate(10);
       }
       
      $categories = category::all();
     
      
          return view('front.produit',compact('produits','category','categories','setting'));
     
    }




    public function favorites(Request $request)
    {
        try {
            $favorite = favorite::where('produit_id',$request->produit_id)->where('user_id',$request->user_id)->first();
            if(!$favorite){

           

            $data = $this->getDatafavorites($request);
            
            $favorite = favorite::create($data);
            $response["success"] = true;
        }else{

          $favorite->delete();
            

            $response["success"] = false;
            
            }
         return response()->json( $response);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('favorites.unexpected_error'));
        }
    }

     protected function getDatafavorites(Request $request)
    {
        $rules = [
                'produit_id' => 'nullable',
            'user_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function basic_email(Request $request) {
            $setting = Settings::first();
      $data = array('name'=>$request->name,'Subject'=>$request->Subject,'Message'=>$request->Message,'email'=>$request->lemail);
   
     Mail::send('front.mail', $data, function ($message) use ($data) {
        $message->subject($data['Subject']);
        $message->to('qonligne@gmail.com', 'Ejar');
           $message->from($data['email'],$data['name']);
});
     return redirect()->route('/contact')->with('success_message', 'success_message','setting');
   }

   public function android(){
    return redirect()->to('https://play.google.com/store/apps/details?id=qa.ejar');
   }

public function ios(){
    return redirect()->to('https://apps.apple.com/app/id1601125715?fbclid=IwAR3itlRR8hzCceFERVVJNNUOeZwjSoHaDSDgTr0GOJKMzZGWJgKJYsWOhJo');
   }
}
