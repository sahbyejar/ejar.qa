<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Api\Controller;
use App\Models\Produit;
use App\Models\Vip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\Produit_photo;
use App\Models\Vu;
use Carbon\Carbon;
use DB;
use App\Models\User;
use Log;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\City;
use App\Models\favorite;


class ProduitsController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {

      $produits=new Collection();
     if($request->countre_id != null){
           $produitsall = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();
        $citys = City::where('countre_id',$request->countre_id)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
     }else{
        $produitsall = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();
        $citys = City::where('countre_id',174)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
     }

       // $produits = Produit::where('accepted','Yes')->with('ville','city')->get();
foreach ($produits as $key => $value) {
 






$value->linkshare = route('/listing',$value->id);
 $value->price_cautionnement = intval($value->price_cautionnement);


 $value->clique_whatsapp = intval($value->clique_whatsapp);
   

$vip1 ="";
$vip2="";
$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
$date = new Carbon;

if($vip1){
  if($date > $vip1->dateend)
{
  $value->vip1 = "off";
  $value->save();
    //its already expired

}else{
  $value->vip1 = "on";
  $value->save();
}
}

$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
   if($date > $vip2->dateend)
{
  $value->vip2 = "off";
  $value->save();
    //its already expired
} else{
  $value->vip2 = "on";
  $value->save();
}
}


 $value->category_id = intval($value->category_id);

 $value->price = intval($value->price);
 $value->phone = intval( $value->user->phone_code.$value->phone);
 $value->ville_id = intval($value->ville_id);
 $value->city_id = intval($value->city_id);
 $value->latitude = floatval($value->latitude);
 $value->longitude = floatval($value->longitude);

 $value->user_id = intval($value->user_id);
 $value->whatsapp =intval( $value->user->phone_code.$value->whatsapp);
 $value->espacer = intval($value->espacer);
 //$value->commission = intval($value->commission);
 $value->salon = intval($value->salon);
 $value->toilet = intval($value->toilet);
 $value->room = intval($value->room);
 $value->vupost = intval($value->vupost);
 $value->vuinsta = intval($value->vuinsta);
 $value->vufb = intval($value->vufb);
 $value->vuweb = intval($value->vuweb);

$value->Number_of_doors = intval($value->Number_of_doors);
 $value->Height = intval($value->Height);



if($vip1){
  if($date < $vip1->dateend)
{
   $value->vip1_date = null;
    $value->vip1_date = $vip1->dateend;
  }
}
if($vip2){
   
   if($date < $vip2->dateend)
{

  $value->vip2_date = null;
  $value->vip2_date = $vip2->dateend;
  }
}

if($value->accepted == "off")
        {$value->accepted = false;
    }else{
      $value->accepted = true;
        }

      if($value->rent_sale == "off")
        {$value->rent_sale = false;
    }else{
      $value->rent_sale = true;
        }
    if($value->chiket == "off")
        {$value->chiket = false;
    }else{
      $value->chiket = true;
        }
    if($value->cautionnement == "off")
        {$value->cautionnement = false;
    }else{
      $value->cautionnement = true;
        }
    if($value->wifi == "off")
        {$value->wifi = false;
    }else{
      $value->wifi = true;
        }
    if($value->route_principale == "off")
        {$value->route_principale = false;
    }else{
      $value->route_principale = true;
        }
    if($value->vip1 == "off")
        {$value->vip1 = false;
    }else{
      $value->vip1 = true;
        }
    if($value->vip2 == "off")
        {$value->vip2 = false;
    }else{
      $value->vip2 = true;
        }
    if($value->parking == "off")
        {$value->parking = false;
    }else{
      $value->parking = true;
        }
    if($value->Piscine == "off")
        {$value->Piscine = false;
    }else{
      $value->Piscine = true;
        }
    if($value->gym == "off")
        {$value->gym = false;
    }else{
      $value->gym = true;
        }
    if($value->firstsaken == "off")
        {$value->firstsaken = false;
    }else{
      $value->firstsaken = true;
        }
    if($value->officeoy == "off")
        {$value->officeoy = false;
    }else{
      $value->officeoy = true;
        }
    if($value->office == "off")
        {$value->office = false;
    }else{
      $value->office = true;
        }
    if($value->secretary == "off")
        {$value->secretary = false;
    }else{
      $value->secretary = true;
        }
    if($value->imprimerie == "off")
        {$value->imprimerie = false;
    }else{
      $value->imprimerie = true;
        }
    if($value->furnished == "off")
        {$value->furnished = false;
    }else{
      $value->furnished = true;
        }

    if($value->DELETED == "off")
        {$value->DELETED = false;
    }else{
      $value->DELETED = true;
        }


        if($value->kahramam == "off")
        {$value->kahramam = false;
    }else{
      $value->kahramam = true;
        }



        if($value->On_a_paved_road == "off")
        {$value->On_a_paved_road = false;
    }else{
      $value->On_a_paved_road = true;
        }


 if($value->commission == "off")
        {$value->commission = false;
    }else{
      $value->commission = true;
        }


         if($value->metro == "0")
        {$value->metro = false;
    }else{
      $value->metro = true;
        }



         if($value->family == "0")
        {$value->family = false;
    }else{
      $value->family = true;
        }



     $value->favorite = count(favorite::where('produit_id',$value->id)->get());




// if (Auth::guard('api')->check()) {
//     $user = Auth::guard('api')->user();
//            if(count(favorite::where('produit_id',$value->id)->where('user_id',$user->id)->get()) >0){
//   $value->isLiked = true;
// }else{
//   $value->isLiked = false;
// }
// }else{
//   $value->isLiked = false;
// }
if(count(favorite::where('produit_id',$value->id)->where('user_id',$request->user_id)->get()) >0){
  $value->isLiked = true;
}else{
  $value->isLiked = false;
}

    $value->images = Produit_photo::where('produit_id',$value->id)->get();
    foreach ($value->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }
            $value->photo = 'ejar/public/images/'.$value->photo;
        }




         $produits = $produits->sortByDesc('updated_at')->sortByDesc('vip2')->values()->all();
        return response()->json($produits);
      
    }

    /**
     * Store a new produit in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);
            $user = User::find($data['user_id']);
            $produits = Produit::where('user_id',$data['user_id'])->count();
            if($produits >= 10){
              return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
            }
            if($user->type == 'seller'){
              $campany  = User::find($user->campany_id);
              if($campany->type = 'campany1' && count($campany->Produit) > 10){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany5' && count($campany->Produit) > 15){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany2' && count($campany->Produit) > 25){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany3' && count($campany->Produit) > 40){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany4' && count($campany->Produit) > 60){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany7' && count($campany->Produit) > 100){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany8' && count($campany->Produit) > 200){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }elseif($campany->type = 'campany9' && count($campany->Produit) > 300){
       return $this->errorResponse(['errors'=> 'تجاوزت ألحد المسموح بيه من عدد الإعلانات ']);
      }


            }


              $data['DELETED'] = "off";

        if($request->rent_sale == null)
        {$data['rent_sale'] = "off";}
    if($request->chiket == null)
        {$data['chiket'] = "off";}
    if($request->cautionnement == null)
        {$data['cautionnement'] = "off";}
    if($request->wifi == null)
        {$data['wifi'] = "off";}
    if($request->route_principale == null)
        {$data['route_principale'] = "off";}
    if($request->vip1 == null)
        {$data['vip1'] = "off";}
    if($request->vip2 == null)
        {$data['vip2'] = "off";}
    if($request->parking == null)
        {$data['parking'] = "off";}
    if($request->Piscine == null)
        {$data['Piscine'] = "off";}
    if($request->gym == null)
        {$data['gym'] = "off";}
    if($request->firstsaken == null)
        {$data['firstsaken'] = "off";}
    if($request->officeoy == null)
        {$data['officeoy'] = "off";}
    if($request->office == null)
        {$data['office'] = "off";}
    if($request->secretary == null)
        {$data['secretary'] = "off";}
    if($request->imprimerie == null)
        {$data['imprimerie'] = "off";}
    if($request->furnished == null)
        {$data['furnished'] = "off";}


    if($request->commission == null)
        {
            $data['commission'] = "off";
       }


    if($request->metro == null)
        {
            $data['metro'] = 0;
        }else{
             $data['metro'] = 1;
        }
    if($request->family == null)
        {
            $data['family'] = 0;
        }else{
             $data['family'] = 1;
        }

     

      if($request->On_a_paved_road == null)
        {$data['On_a_paved_road'] = "off";}

      $data['vupost']=0;
      $data['vuinsta']=0;
      $data['vufb']=0;
      $data['vuweb']=0;
      $data['clique_whatsapp']=0;
 

            
            $produit = Produit::create($data);
 $produit->category_id = intval($produit->category_id);
   $produit->price = intval($produit->price);
 $produit->phone = intval($produit->phone);
 $produit->ville_id = intval($produit->ville_id);
 $produit->city_id = intval($produit->city_id);
 $produit->latitude = floatval($produit->latitude);
 $produit->longitude = floatval($produit->longitude);  


 $produit->user_id = intval($produit->user_id);
 $produit->whatsapp = intval($produit->whatsapp);
 $produit->espacer = intval($produit->espacer);
 //$produit->commission = intval($produit->commission);
 $produit->salon = intval($produit->salon);
 $produit->toilet = intval($produit->toilet);
 $produit->room = intval($produit->room);

$produit->linkshare = route('/listing',$produit->id);
 $produit->vupost = intval($produit->vupost);
 $produit->vuinsta = intval($produit->vuinsta);
 $produit->vufb = intval($produit->vufb);
 $produit->vuweb = intval($produit->vuweb);
 $produit->clique_whatsapp = intval($produit->clique_whatsapp);


 $produit->price_cautionnement = intval($produit->price_cautionnement);

$produit->Number_of_doors = intval($produit->Number_of_doors);
 $produit->Height = intval($produit->Height);
if($produit->accepted == "off")
        {$produit->accepted = false;
    }else{
      $produit->accepted = true;
        }



      if($produit->rent_sale == "off")
        {$produit->rent_sale = false;
    }else{
      $produit->rent_sale = true;
        }
    if($produit->chiket == "off")
        {$produit->chiket = false;
    }else{
      $produit->chiket = true;
        }
    if($produit->cautionnement == "off")
        {$produit->cautionnement = false;
    }else{
      $produit->cautionnement = true;
        }
    if($produit->wifi == "off")
        {$produit->wifi = false;
    }else{
      $produit->wifi = true;
        }
    if($produit->route_principale == "off")
        {$produit->route_principale = false;
    }else{
      $produit->route_principale = true;
        }
    if($produit->vip1 == "off")
        {$produit->vip1 = false;
    }else{
      $produit->vip1 = true;
        }
    if($produit->vip2 == "off")
        {$produit->vip2 = false;
    }else{
      $produit->vip2 = true;
        }
    if($produit->parking == "off")
        {$produit->parking = false;
    }else{
      $produit->parking = true;
        }
    if($produit->Piscine == "off")
        {$produit->Piscine = false;
    }else{
      $produit->Piscine = true;
        }
    if($produit->gym == "off")
        {$produit->gym = false;
    }else{
      $produit->gym = true;
        }
    if($produit->firstsaken == "off")
        {$produit->firstsaken = false;
    }else{
      $produit->firstsaken = true;
        }
    if($produit->officeoy == "off")
        {$produit->officeoy = false;
    }else{
      $produit->officeoy = true;
        }
    if($produit->office == "off")
        {$produit->office = false;
    }else{
      $produit->office = true;
        }
    if($produit->secretary == "off")
        {$produit->secretary = false;
    }else{
      $produit->secretary = true;
        }
    if($produit->imprimerie == "off")
        {$produit->imprimerie = false;
    }else{
      $produit->imprimerie = true;
        }
    if($produit->furnished == "off")
        {$produit->furnished = false;
    }else{
      $produit->furnished = true;
        }

    if($produit->DELETED == "off")
        {$produit->DELETED = false;
    }else{
      $produit->DELETED = true;
        }


         if($produit->kahramam == "off")
        {$produit->kahramam = false;
    }else{
      $produit->kahramam = true;
        }

        if($produit->On_a_paved_road == "off")
        {$produit->On_a_paved_road = false;
    }else{
      $produit->On_a_paved_road = true;
        }
 if($produit->commission == "off")
        {$produit->commission = false;
    }else{
      $produit->commission = true;
        }



         if($produit->metro == 0)
        {$produit->metro = false;
    }else{
      $produit->metro = true;
        }



         if($produit->family == 0)
        {$produit->family = false;
    }else{
      $produit->family = true;
        }

          return response()->json($produit);
        } catch (Exception $exception) {
            return $this->errorResponse($exception);
        }
    }

    /**
     * Display the specified produit.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::with('ville','city')->findOrFail($id);
          $produit->photo = 'ejar/public/images/'.$produit->photo;
           $produit->images = Produit_photo::where('produit_id',$id)->get();
            foreach ($produit->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }

 $produit->category_id = intval($produit->category_id);
   $produit->price = intval($produit->price);
 $produit->phone = intval($produit->phone);
 $produit->ville_id = intval($produit->ville_id);
 $produit->city_id = intval($produit->city_id);
 $produit->latitude = floatval($produit->latitude);
 $produit->longitude = floatval($produit->longitude);  


 $produit->user_id = intval($produit->user_id);
 $produit->whatsapp = intval($produit->whatsapp);
 $produit->espacer = intval($produit->espacer);
 //$produit->commission = intval($produit->commission);
 $produit->salon = intval($produit->salon);
 $produit->toilet = intval($produit->toilet);
 $produit->room = intval($produit->room);

$produit->linkshare = route('/listing',$produit->id);
 $produit->vupost = intval($produit->vupost);
 $produit->vuinsta = intval($produit->vuinsta);
 $produit->vufb = intval($produit->vufb);
 $produit->vuweb = intval($produit->vuweb);
 $produit->clique_whatsapp = intval($produit->clique_whatsapp);


 $produit->price_cautionnement = intval($produit->price_cautionnement);

$produit->Number_of_doors = intval($produit->Number_of_doors);
 $produit->Height = intval($produit->Height);
if($produit->accepted == "off")
        {$produit->accepted = false;
    }else{
      $produit->accepted = true;
        }



      if($produit->rent_sale == "off")
        {$produit->rent_sale = false;
    }else{
      $produit->rent_sale = true;
        }
    if($produit->chiket == "off")
        {$produit->chiket = false;
    }else{
      $produit->chiket = true;
        }
    if($produit->cautionnement == "off")
        {$produit->cautionnement = false;
    }else{
      $produit->cautionnement = true;
        }
    if($produit->wifi == "off")
        {$produit->wifi = false;
    }else{
      $produit->wifi = true;
        }
    if($produit->route_principale == "off")
        {$produit->route_principale = false;
    }else{
      $produit->route_principale = true;
        }
    if($produit->vip1 == "off")
        {$produit->vip1 = false;
    }else{
      $produit->vip1 = true;
        }
    if($produit->vip2 == "off")
        {$produit->vip2 = false;
    }else{
      $produit->vip2 = true;
        }
    if($produit->parking == "off")
        {$produit->parking = false;
    }else{
      $produit->parking = true;
        }
    if($produit->Piscine == "off")
        {$produit->Piscine = false;
    }else{
      $produit->Piscine = true;
        }
    if($produit->gym == "off")
        {$produit->gym = false;
    }else{
      $produit->gym = true;
        }
    if($produit->firstsaken == "off")
        {$produit->firstsaken = false;
    }else{
      $produit->firstsaken = true;
        }
    if($produit->officeoy == "off")
        {$produit->officeoy = false;
    }else{
      $produit->officeoy = true;
        }
    if($produit->office == "off")
        {$produit->office = false;
    }else{
      $produit->office = true;
        }
    if($produit->secretary == "off")
        {$produit->secretary = false;
    }else{
      $produit->secretary = true;
        }
    if($produit->imprimerie == "off")
        {$produit->imprimerie = false;
    }else{
      $produit->imprimerie = true;
        }
    if($produit->furnished == "off")
        {$produit->furnished = false;
    }else{
      $produit->furnished = true;
        }

    if($produit->DELETED == "off")
        {$produit->DELETED = false;
    }else{
      $produit->DELETED = true;
        }


         if($produit->kahramam == "off")
        {$produit->kahramam = false;
    }else{
      $produit->kahramam = true;
        }

        if($produit->On_a_paved_road == "off")
        {$produit->On_a_paved_road = false;
    }else{
      $produit->On_a_paved_road = true;
        }



         if($produit->metro == "0")
        {$produit->metro = false;
    }else{
      $produit->metro = true;
        }

 if($value->commission == "off")
        {$value->commission = false;
    }else{
      $value->commission = true;
        }

         if($produit->family == "0")
        {$produit->family = false;
    }else{
      $produit->family = true;
        }

    $produit->vip1_date = null;
$produit->vip2_date = null;

$vip1 = Vip::where('Produit_id',$produit->id)->where('vip',1)->first();
if($vip1){
    $produit->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$produit->id)->where('vip',2)->first();
if($vip2){
    $produit->vip2_date = $vip2->date;
}
   

 return response()->json($produit);
    }

    /**
     * Update the specified produit in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);
            
            $produit = Produit::findOrFail($id);
            $produit->update($data);

            return $this->successResponse(
			    trans('produits.model_was_updated'),
			    $this->transform($produit)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('produits.unexpected_error'));
        }
    }

    /**
     * Remove the specified produit from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $produit = Produit::findOrFail($id);
            $produit->delete_date =Carbon::now()->addDays(7);
            $produit->DELETED = "Yes";
            $produit->save();

            return $this->successResponse(
			    trans('produits.model_was_deleted'),
			    $this->transform($produit)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('produits.unexpected_error'));
        }
    }
    
    /**
     * Gets a new validator instance with the defined rules.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Support\Facades\Validator
     */
    protected function getValidator(Request $request)
    {
        $rules = [
            'name_ar' => 'string|min:1|nullable',
            'name' => 'string|min:1|max:255|nullable',
          
            'discription_ar' => 'string|min:1|nullable',
            'discription' => 'string|min:1|nullable',
            'price' => 'string|min:1|nullable',
            'phone' => 'string|min:1|nullable',
            'ville_id' => 'nullable',
            'city_id' => 'nullable',
            'longitude' => 'string|min:1|nullable',
            'latitude' => 'string|min:1|nullable',
            'instagrame' => 'string|min:1|nullable',
            'facebook' => 'string|min:1|nullable',
            'siteweb' => 'string|min:1|nullable',
            'whatsapp' => 'string|min:1|nullable',
            'rent_sale' => 'string|min:1|nullable',
            'chiket' => 'string|min:1|nullable',
            'cautionnement' => 'string|min:1|nullable',
            'price_cautionnement' => 'string|min:1|nullable',
            'espacer' => 'string|min:1|nullable',
            'interface' => 'string|min:1|nullable',
            'wifi' => 'string|min:1|nullable',
            'kahramam' => 'string|min:1|nullable',
            'route_principale' => 'string|min:1|nullable',
            'commission' => 'string|min:1|nullable',
            
            'parking' => 'string|min:1|nullable',
            'Piscine' => 'string|min:1|nullable',
            'gym' => 'string|min:1|nullable',
            'firstsaken' => 'string|min:1|nullable',
            'salon' => 'string|min:1|nullable',
            'toilet' => 'string|min:1|nullable',
            'room' => 'string|min:1|nullable',
            'officeoy' => 'string|min:1|nullable',
            'office' => 'string|min:1|nullable',
            'secretary' => 'string|min:1|nullable',
            'imprimerie' => 'string|min:1|nullable',
            'DELETED' => 'string|min:1|nullable',
            'accepted' => 'string|min:1|nullable',
            'furnished' => 'string|min:1|nullable', 
              'Number_of_doors' => 'numeric|nullable',
            'Height' => 'string|min:1|nullable',
            'On_a_paved_road' => 'string|min:1|nullable', 
        ];



        return Validator::make($request->all(), $rules);
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
                'name_ar' => 'string|min:1|nullable',
            'name' => 'string|min:1|max:255|nullable',
             'photo' => 'string|min:1|nullable',
          
            'discription_ar' => 'string|min:1|nullable',
            'discription' => 'string|min:1|nullable',
            'price' => 'string|min:1|nullable',
            'phone' => 'string|min:1|nullable',
            'ville_id' => 'nullable',
            'city_id' => 'nullable',
            'longitude' => 'string|min:1|nullable',
            'latitude' => 'string|min:1|nullable',
            'instagrame' => 'string|min:1|nullable',
            'facebook' => 'string|min:1|nullable',
            'siteweb' => 'string|min:1|nullable',
            'whatsapp' => 'string|min:1|nullable',
            'rent_sale' => 'string|min:1|nullable',
            'chiket' => 'string|min:1|nullable',
            'cautionnement' => 'string|min:1|nullable',
            'price_cautionnement' => 'string|min:1|nullable',
            'espacer' => 'string|min:1|nullable',
            'interface' => 'string|min:1|nullable',
            'wifi' => 'string|min:1|nullable',
            'kahramam' => 'string|min:1|nullable',
            'route_principale' => 'string|min:1|nullable',
            'commission' => 'string|min:1|nullable',
            
            'parking' => 'string|min:1|nullable',
            'Piscine' => 'string|min:1|nullable',
            'gym' => 'string|min:1|nullable',
            'firstsaken' => 'string|min:1|nullable',
            'salon' => 'string|min:1|nullable',
            'toilet' => 'string|min:1|nullable',
            'room' => 'string|min:1|nullable',
            'officeoy' => 'string|min:1|nullable',
            'office' => 'string|min:1|nullable',
            'secretary' => 'string|min:1|nullable',
            'imprimerie' => 'string|min:1|nullable',
            'DELETED' => 'string|min:1|nullable',
            'accepted' => 'string|min:1|nullable',
            'furnished' => 'string|min:1|nullable', 
              'Number_of_doors' => 'numeric|nullable',
            'Height' => 'string|min:1|nullable',
            'On_a_paved_road' => 'string|min:1|nullable', 
            'metro' => 'nullable',
            'family' => 'nullable', 
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        
        $data['category_id'] = $request->category;
        $user = User::find($request->id);

        $data['user_id'] = $user->id;
        $data['accepted'] = "Yes";
        $data['DELETED'] = "off";

        if($request->rent_sale == 0)
        {$data['rent_sale'] = "off";}
    if($request->chiket == 0)
        {$data['chiket'] = "off";}
    if($request->cautionnement == 0)
        {$data['cautionnement'] = "off";}
    if($request->wifi == 0)
        {$data['wifi'] = "off";}
    if($request->route_principale == 0)
        {$data['route_principale'] = "off";}

        $data['vip1'] = "off";

        $data['vip2'] = "off";
    if($request->parking == 0)
        {$data['parking'] = "off";}
    if($request->Piscine == 0)
        {$data['Piscine'] = "off";}
    if($request->gym == 0)
        {$data['gym'] = "off";}
    if($request->firstsaken == 0)
        {$data['firstsaken'] = "off";}
    if($request->officeoy == 0)
        {$data['officeoy'] = "off";}
    if($request->office == 0)
        {$data['office'] = "off";}
    if($request->secretary == 0)
        {$data['secretary'] = "off";}
    if($request->imprimerie == 0)
        {$data['imprimerie'] = "off";}
    if($request->furnished == 0)
        {$data['furnished'] = "off";}

     

      if($request->On_a_paved_road == 0)
        {$data['On_a_paved_road'] = "off";}


      if($request->commission == 0)
        {$data['commission'] = "off";}



    if($request->metro == 0)
        {
            $data['metro'] = 0;
        }else{
             $data['metro'] = 1;
        }
    if($request->family == 0)
        {
            $data['family'] = 0;
        }else{
             $data['family'] = 1;
        }

      $data['vupost']=0;
      $data['vuinsta']=0;
      $data['vufb']=0;
      $data['vuweb']=0;
      $data['clique_whatsapp']=0;
     


  $base64_image =   $data['photo']; // your base64 encoded     
    @list($type, $file_data) = explode(';', $base64_image);
    @list(, $file_data) = explode(',', $file_data); 
    $imageName = Str::random(40).'.'.'png';   
           $path =  Storage::disk('images')->put('produit/'.$imageName, base64_decode($file_data));

     //Storage::disk('images')->put('produit',  base64_decode($image));
    // Save thumb
            
    $img = InterventionImage::make( base64_decode($file_data))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = 'produit/'.$imageName;
        

        return $data;
    }
  
   
    
    /**
     * Transform the giving produit to public friendly array
     *
     * @param App\Models\Produit $produit
     *
     * @return array
     */
    protected function transform(Produit $produit)
    {
        return [
            'id' => $produit->id,
          
            'user_id' => optional($produit->user)->name,
            'name_ar' => $produit->name_ar,
            'name' => $produit->name,
            'photo' => $produit->photo,
            'discription_ar' => $produit->discription_ar,
            'discription' => $produit->discription,
            'price' => $produit->price,
            'phone' => $produit->phone,
            'ville_id' => optional($produit->ville)->ville,
            'city_id' => optional($produit->city)->name,
            'longitude' => $produit->longitude,
            'latitude' => $produit->latitude,
            'vupost' => $produit->vupost,
            'instagrame' => $produit->instagrame,
            'vuinsta' => $produit->vuinsta,
            'facebook' => $produit->facebook,
            'vufb' => $produit->vufb,
            'siteweb' => $produit->siteweb,
            'vuweb' => $produit->vuweb,
            'linkshare' => route('/listing',$produit->id),
            'cliquephone' => $produit->cliquephone,
            'whatsapp' => $produit->whatsapp,
            'clique_whatsapp' => $produit->clique_whatsapp,
            'rent_sale' =>  $produit->rent_sale,
            'chiket' =>  $produit->chiket,
            'cautionnement' =>  $produit->cautionnement,
            'price_cautionnement' => $produit->price_cautionnement,
            'espacer' => $produit->espacer,
            'interface' => $produit->interface,
            'wifi' =>  $produit->wifi,
            'kahramam' => $produit->kahramam,
            'route_principale' =>  $produit->route_principale,
            'commission' =>  $produit->commission,
            'vip1' =>  $produit->vip1,
            'vip2' =>  $produit->vip2,
            'parking' =>  $produit->parking,
            'Piscine' =>  $produit->Piscine,
            'gym' =>  $produit->gym,
            'firstsaken' =>  $produit->firstsaken,
            'salon' => $produit->salon,
            'toilet' => $produit->toilet,
            'room' => $produit->room,
            'officeoy' =>  $produit->officeoy,
            'office' => $produit->office,
            'secretary' =>  $produit->secretary,
            'imprimerie' =>  $produit->imprimerie,
            'DELETED' =>  $produit->DELETED,
            'accepted' =>  "Yes",
            'furnished' =>  $produit->furnished,
        ];
    }



 public function vuweb($id)
    { 
        $response["success"] = false;
        $produit = Produit::find($id);
        if($produit){
             $produit->vuweb = $produit->vuweb + 1;
             $produit->save();
        $response["success"] = true;
        $vu = new Vu();
        $vu->vu = "web";
        $vu->date = Carbon::parse(Carbon::now());
        $vu->Produit_id = $id;
        $vu->save();
        }
       
         return response()->json( $response); 
    }

 public function clique_whatsapp($id)
    { 
        $response["success"] = false;
        $produit = Produit::find($id);
        if($produit){
             $produit->clique_whatsapp = $produit->clique_whatsapp + 1;
             $produit->save();
        $response["success"] = true;
        $vu = new Vu();
        $vu->vu = "whatsapp";
        $vu->date = Carbon::parse(Carbon::now());
        $vu->Produit_id = $id;
        $vu->save();
        }
         return response()->json( $response); 
    }


     public function vupost($id)
    { 
        $response["success"] = false;
        $produit = Produit::find($id);
        if($produit){
             $produit->vupost = $produit->vupost + 1;
             $produit->save();
             $vu = new Vu();
        $vu->vu = "post";
        $vu->date = Carbon::parse(Carbon::now());
        $vu->Produit_id = $id;
        $vu->save();
        $response["success"] = true;
        }
         return response()->json( $response); 
    }



     public function vufb($id)
    { 
        $response["success"] = false;
        $produit = Produit::find($id);
        if($produit){
             $produit->vufb = $produit->vufb + 1;
             $produit->save();
        $response["success"] = true;
        $vu = new Vu();
        $vu->vu = "facebook";
        $vu->date = Carbon::parse(Carbon::now());
        $vu->Produit_id = $id;
        $vu->save();
        }
         return response()->json( $response); 
    }



     public function vuinsta($id)
    { 
        $response["success"] = false;
        $produit = Produit::find($id);
        if($produit){
             $produit->vuinsta = $produit->vuinsta + 1;
             $produit->save();
        $response["success"] = true;
        $vu = new Vu();
        $vu->vu = "instagrame";
        $vu->date = Carbon::parse(Carbon::now());
        $vu->Produit_id = $id;
        $vu->save();
        }
         return response()->json( $response); 
    }




    

  public function produitbydestanse(Request $request)
    {
        $produits=new Collection();
     if($request->countre_id != null){
           $produitsall = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();
        $citys = City::where('countre_id',$request->countre_id)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
     }else{
        $produitsall = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();
        $citys = City::where('countre_id',174)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
     }
foreach ($produits as $key => $value) {
    $value->destanse = SQRT((
    POW(69.1 * ($value->latitude - $request->latitude), 2) +
    POW(69.1 * ($request->longitude - $value->longitude) * COS($value->latitude / 57.3), 2)) / 0.6214 );
 
 $value->category_id = intval($value->category_id);

  $value->price = intval($value->price);
 $value->phone = intval( $value->user->phone_code.$value->phone);
 $value->ville_id = intval($value->ville_id);
 $value->city_id = intval($value->city_id);
 $value->latitude = floatval($value->latitude);
 $value->longitude = floatval($value->longitude); 


 $value->user_id = intval($value->user_id);
 $value->whatsapp = intval( $value->user->phone_code.$value->whatsapp);
 $value->espacer = intval($value->espacer);
 //$value->commission = intval($value->commission);
 $value->salon = intval($value->salon);
 $value->toilet = intval($value->toilet);
 $value->room = intval($value->room);



 $value->vupost = intval($value->vupost);
 $value->vuinsta = intval($value->vuinsta);
 $value->vufb = intval($value->vufb);
 $value->vuweb = intval($value->vuweb);
 $value->clique_whatsapp = intval($value->clique_whatsapp);

 $value->price_cautionnement = intval($value->price_cautionnement);

$value->Number_of_doors = intval($value->Number_of_doors);
 $value->Height = intval($value->Height);



if($value->accepted == "off")
        {$value->accepted = false;
    }else{
      $value->accepted = true;
        }



      if($value->rent_sale == "off")
        {$value->rent_sale = false;
    }else{
      $value->rent_sale = true;
        }
    if($value->chiket == "off")
        {$value->chiket = false;
    }else{
      $value->chiket = true;
        }
    if($value->cautionnement == "off")
        {$value->cautionnement = false;
    }else{
      $value->cautionnement = true;
        }
    if($value->wifi == "off")
        {$value->wifi = false;
    }else{
      $value->wifi = true;
        }
    if($value->route_principale == "off")
        {$value->route_principale = false;
    }else{
      $value->route_principale = true;
        }
    if($value->vip1 == "off")
        {$value->vip1 = false;
    }else{
      $value->vip1 = true;
        }
    if($value->vip2 == "off")
        {$value->vip2 = false;
    }else{
      $value->vip2 = true;
        }
    if($value->parking == "off")
        {$value->parking = false;
    }else{
      $value->parking = true;
        }
    if($value->Piscine == "off")
        {$value->Piscine = false;
    }else{
      $value->Piscine = true;
        }
    if($value->gym == "off")
        {$value->gym = false;
    }else{
      $value->gym = true;
        }
    if($value->firstsaken == "off")
        {$value->firstsaken = false;
    }else{
      $value->firstsaken = true;
        }
    if($value->officeoy == "off")
        {$value->officeoy = false;
    }else{
      $value->officeoy = true;
        }
    if($value->office == "off")
        {$value->office = false;
    }else{
      $value->office = true;
        }
    if($value->secretary == "off")
        {$value->secretary = false;
    }else{
      $value->secretary = true;
        }
    if($value->imprimerie == "off")
        {$value->imprimerie = false;
    }else{
      $value->imprimerie = true;
        }
    if($value->furnished == "off")
        {$value->furnished = false;
    }else{
      $value->furnished = true;
        }

    if($value->DELETED == "off")
        {$value->DELETED = false;
    }else{
      $value->DELETED = true;
        }

     if($value->kahramam == "off")
        {$value->kahramam = false;
    }else{
      $value->kahramam = true;
        }


        if($value->On_a_paved_road == "off")
        {$value->On_a_paved_road = false;
    }else{
      $value->On_a_paved_road = true;
        }
        
 if($value->commission == "off")
        {$value->commission = false;
    }else{
      $value->commission = true;
        }
           if($value->metro == "0")
        {$value->metro = false;
    }else{
      $value->metro = true;
        }



         if($value->family == "0")
        {$value->family = false;
    }else{
      $value->family = true;
        }



         $value->favorite = count(favorite::where('produit_id',$value->id)->get());




// if (Auth::guard('api')->check()) {
//     $user = Auth::guard('api')->user();
//            if(count(favorite::where('produit_id',$value->id)->where('user_id',$user->id)->get()) >0){
//   $value->isLiked = true;
// }else{
//   $value->isLiked = false;
// }
// }else{
//   $value->isLiked = false;
// }
if(count(favorite::where('produit_id',$value->id)->where('user_id',$request->user_id)->get()) >0){
  $value->isLiked = true;
}else{
  $value->isLiked = false;
}


    $value->vip1_date = null;
$value->vip2_date = null;
$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_date = $vip2->date;
}
    $value->images = Produit_photo::where('produit_id',$value->id)->get();
    foreach ($value->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }
            $value->photo = 'ejar/public/images/'.$value->photo;
        }




        $produits = $produits->sortBy('destanse')->values()->all();
        return response()->json($produits);
      
    }

 public function indexuser(Request $request)
    {
        $produits = Produit::where('user_id',$request->id)->with('ville','city')->get();
foreach ($produits as $key => $value) {
 
 $value->category_id = intval($value->category_id);

 $value->price = intval($value->price);
 $value->phone = intval( $value->user->phone_code.$value->phone);
 $value->ville_id = intval($value->ville_id);
 $value->city_id = intval($value->city_id);
 $value->latitude = floatval($value->latitude);
 $value->longitude = floatval($value->longitude);

 $value->user_id = intval($value->user_id);
 $value->whatsapp = intval( $value->user->phone_code.$value->whatsapp);
 $value->espacer = intval($value->espacer);
 //$value->commission = intval($value->commission);
 $value->salon = intval($value->salon);
 $value->toilet = intval($value->toilet);
 $value->room = intval($value->room);
 $value->vupost = intval($value->vupost);
 $value->vuinsta = intval($value->vuinsta);
 $value->vufb = intval($value->vufb);
 $value->vuweb = intval($value->vuweb);

$value->Number_of_doors = intval($value->Number_of_doors);
 $value->Height = intval($value->Height);


$value->linkshare = route('/listing',$value->id);
 $value->price_cautionnement = intval($value->price_cautionnement);


 $value->clique_whatsapp = intval($value->clique_whatsapp);


if($value->accepted == "off")
        {$value->accepted = false;
    }else{
      $value->accepted = true;
        }

      if($value->rent_sale == "off")
        {$value->rent_sale = false;
    }else{
      $value->rent_sale = true;
        }
    if($value->chiket == "off")
        {$value->chiket = false;
    }else{
      $value->chiket = true;
        }
    if($value->cautionnement == "off")
        {$value->cautionnement = false;
    }else{
      $value->cautionnement = true;
        }
    if($value->wifi == "off")
        {$value->wifi = false;
    }else{
      $value->wifi = true;
        }
    if($value->route_principale == "off")
        {$value->route_principale = false;
    }else{
      $value->route_principale = true;
        }
    if($value->vip1 == "off")
        {$value->vip1 = false;
    }else{
      $value->vip1 = true;
        }
    if($value->vip2 == "off")
        {$value->vip2 = false;
    }else{
      $value->vip2 = true;
        }
    if($value->parking == "off")
        {$value->parking = false;
    }else{
      $value->parking = true;
        }
    if($value->Piscine == "off")
        {$value->Piscine = false;
    }else{
      $value->Piscine = true;
        }
    if($value->gym == "off")
        {$value->gym = false;
    }else{
      $value->gym = true;
        }
    if($value->firstsaken == "off")
        {$value->firstsaken = false;
    }else{
      $value->firstsaken = true;
        }
    if($value->officeoy == "off")
        {$value->officeoy = false;
    }else{
      $value->officeoy = true;
        }
    if($value->office == "off")
        {$value->office = false;
    }else{
      $value->office = true;
        }
    if($value->secretary == "off")
        {$value->secretary = false;
    }else{
      $value->secretary = true;
        }
    if($value->imprimerie == "off")
        {$value->imprimerie = false;
    }else{
      $value->imprimerie = true;
        }
    if($value->furnished == "off")
        {$value->furnished = false;
    }else{
      $value->furnished = true;
        }

    if($value->DELETED == "off")
        {$value->DELETED = false;
    }else{
      $value->DELETED = true;
        }


 if($value->commission == "off")
        {$value->commission = false;
    }else{
      $value->commission = true;
        }
        if($value->kahramam == "off")
        {$value->kahramam = false;
    }else{
      $value->kahramam = true;
        }



        if($value->On_a_paved_road == "off")
        {$value->On_a_paved_road = false;
    }else{
      $value->On_a_paved_road = true;
        }

   if($value->metro == "0")
        {$value->metro = false;
    }else{
      $value->metro = true;
        }



         if($value->family == "0")
        {$value->family = false;
    }else{
      $value->family = true;
        }


    


    $value->vip1_date = null;
$value->vip2_date = null;

$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_date = $vip2->date;
}
    $value->images = Produit_photo::where('produit_id',$value->id)->get();
    foreach ($value->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }
            $value->photo = 'ejar/public/images/'.$value->photo;
        }




         $produits = $produits->sortByDesc('updated_at')->sortByDesc('vip2')->values()->all();
        return response()->json($produits);
      
    }





 public function map(Request $request)
    {
        $produits=new Collection();
     if($request->countre_id != null){
           $produitsall = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();
        $citys = City::where('countre_id',$request->countre_id)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
     }else{
        $produitsall = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();
        $citys = City::where('countre_id',174)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
     }
foreach ($produits as $key => $value) {
    $value->destanse = SQRT((
    POW(69.1 * ($value->latitude - $request->latitude), 2) +
    POW(69.1 * ($request->longitude - $value->longitude) * COS($value->latitude / 57.3), 2)) / 0.6214 );
 
 $value->category_id = intval($value->category_id);

  $value->price = intval($value->price);
 $value->phone = intval( $value->user->phone_code.$value->phone);
 $value->ville_id = intval($value->ville_id);
 $value->city_id = intval($value->city_id);
 $value->latitude = floatval($value->latitude);
 $value->longitude = floatval($value->longitude); 


 $value->user_id = intval($value->user_id);
 $value->whatsapp = intval( $value->user->phone_code.$value->whatsapp);
 $value->espacer = intval($value->espacer);
 //$value->commission = intval($value->commission);
 $value->salon = intval($value->salon);
 $value->toilet = intval($value->toilet);
 $value->room = intval($value->room);



 $value->vupost = intval($value->vupost);
 $value->vuinsta = intval($value->vuinsta);
 $value->vufb = intval($value->vufb);
 $value->vuweb = intval($value->vuweb);
 $value->clique_whatsapp = intval($value->clique_whatsapp);

 $value->price_cautionnement = intval($value->price_cautionnement);

$value->Number_of_doors = intval($value->Number_of_doors);
 $value->Height = intval($value->Height);



if($value->accepted == "off")
        {$value->accepted = false;
    }else{
      $value->accepted = true;
        }



      if($value->rent_sale == "off")
        {$value->rent_sale = false;
    }else{
      $value->rent_sale = true;
        }
    if($value->chiket == "off")
        {$value->chiket = false;
    }else{
      $value->chiket = true;
        }
    if($value->cautionnement == "off")
        {$value->cautionnement = false;
    }else{
      $value->cautionnement = true;
        }
    if($value->wifi == "off")
        {$value->wifi = false;
    }else{
      $value->wifi = true;
        }
    if($value->route_principale == "off")
        {$value->route_principale = false;
    }else{
      $value->route_principale = true;
        }
    if($value->vip1 == "off")
        {$value->vip1 = false;
    }else{
      $value->vip1 = true;
        }
    if($value->vip2 == "off")
        {$value->vip2 = false;
    }else{
      $value->vip2 = true;
        }
    if($value->parking == "off")
        {$value->parking = false;
    }else{
      $value->parking = true;
        }
    if($value->Piscine == "off")
        {$value->Piscine = false;
    }else{
      $value->Piscine = true;
        }
    if($value->gym == "off")
        {$value->gym = false;
    }else{
      $value->gym = true;
        }
    if($value->firstsaken == "off")
        {$value->firstsaken = false;
    }else{
      $value->firstsaken = true;
        }
    if($value->officeoy == "off")
        {$value->officeoy = false;
    }else{
      $value->officeoy = true;
        }
    if($value->office == "off")
        {$value->office = false;
    }else{
      $value->office = true;
        }
    if($value->secretary == "off")
        {$value->secretary = false;
    }else{
      $value->secretary = true;
        }
    if($value->imprimerie == "off")
        {$value->imprimerie = false;
    }else{
      $value->imprimerie = true;
        }
    if($value->furnished == "off")
        {$value->furnished = false;
    }else{
      $value->furnished = true;
        }

    if($value->DELETED == "off")
        {$value->DELETED = false;
    }else{
      $value->DELETED = true;
        }

     if($value->kahramam == "off")
        {$value->kahramam = false;
    }else{
      $value->kahramam = true;
        }


        if($value->On_a_paved_road == "off")
        {$value->On_a_paved_road = false;
    }else{
      $value->On_a_paved_road = true;
        }
        
        
           if($value->metro == "0")
        {$value->metro = false;
    }else{
      $value->metro = true;
        }



         if($value->family == "0")
        {$value->family = false;
    }else{
      $value->family = true;
        }

 if($value->commission == "off")
        {$value->commission = false;
    }else{
      $value->commission = true;
        }
         $value->favorite = count(favorite::where('produit_id',$value->id)->get());




// if (Auth::guard('api')->check()) {
//     $user = Auth::guard('api')->user();
//            if(count(favorite::where('produit_id',$value->id)->where('user_id',$user->id)->get()) >0){
//   $value->isLiked = true;
// }else{
//   $value->isLiked = false;
// }
// }else{
//   $value->isLiked = false;
// }
if(count(favorite::where('produit_id',$value->id)->where('user_id',$request->user_id)->get()) >0){
  $value->isLiked = true;
}else{
  $value->isLiked = false;
}


    $value->vip1_date = null;
$value->vip2_date = null;
$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_date = $vip2->date;
}
    $value->images = Produit_photo::where('produit_id',$value->id)->get();
    foreach ($value->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }
            $value->photo = 'ejar/public/images/'.$value->photo;
        }
        $produits = $produits->sortBy('destanse')->values()->all();
        return response()->json($produits);
      
    }


    public function fulter(Request $request){

       $query = Produit::where('accepted','Yes')->with('category','user','ville','city')->get();


if($request->category_id != null){
        // This will only execute if you received any name
        $query = $query->where('category_id',$request->category_id);
    }

    if($request->cityId  != null){
        // This will only execute if you received any name
        $query = $query->where('city_id',$request->cityId);
    }
    if($request->townId != null){
        // This will only execute if you received any name
        $query = $query->where('ville_id',$request->townId);
    }

 if($request->status !=null){
    if($request->status ==0){
        // This will only execute if you received any name
         $query = $query->where('rent_sale','on');
    }elseif($request->status == 1){
       $query = $query->where('rent_sale','off');
    }}

    if($request->priceMax != null){
        // This will only execute if you received any name
        $query = $query->where('price','<=',$request->priceMax);
    }
    if($request->priceMin != null){
        // This will only execute if you received any name
        $query = $query->where('price','>=',$request->priceMin);
    }

    if($request->surfaceMin != null){
        // This will only execute if you received any name
        $query = $query->where('espacer','>=',$request->surfaceMin);
    }
    if($request->surfaceMax != null){
        // This will only execute if you received any name
        $query = $query->where('espacer','<=',$request->surfaceMax);
    }


 if($request->cheques != null){
    if($request->cheques == 1){
        // This will only execute if you received any name
        $query = $query->where('chiket','on');
    }elseif($request->cheques == 0){
       $query = $query->where('chiket','off');
    }
  }

  if($request->insurance != null){
    if($request->insurance == 1){
        // This will only execute if you received any name
        $query = $query->where('cautionnement','on');
    }elseif($request->insurance == "0"){
       $query = $query->where('cautionnement','off');
    }
  }
  if($request->pool != null){

    if($request->pool == 1){
        // This will only execute if you received any name
        $query = $query->where('Piscine','on');
    }elseif($request->pool == "0"){
       $query = $query->where('Piscine','off');
    }
  }



  if($request->gym != null){
    if($request->gym == 1){
        // This will only execute if you received any name
        $query = $query->where('gym','on');
    }elseif($request->gym == "0"){
       $query = $query->where('gym','off');
    }
  }



    if($request->firstInhabitant != null){
    if($request->firstInhabitant == 1){
        // This will only execute if you received any name
        $query = $query->where('firstsaken','on');
    }elseif($request->firstInhabitant == "0"){
       $query = $query->where('firstsaken','off');
    }
  }
    if($request->furnished != null){
    if($request->furnished== 1){
        // This will only execute if you received any name
        $query = $query->where('furnished','on');
    }elseif($request->furnished == "0"){
       $query = $query->where('furnished','off');
    }
     }
    if($request->nearMetro != null){
     if($request->nearMetro == 1){
        // This will only execute if you received any name
        $query = $query->where('metro','1');
    }elseif($request->nearMetro == "0"){
       $query = $query->where('metro','0');
    }
     }
    if($request->familial != null){
    if($request->familial== 1){
        // This will only execute if you received any name
        $query = $query->where('family','1');
    }elseif($request->familial == "0"){
       $query = $query->where('family','0');
    }
 }
    if($request->wifi != null){
    if($request->wifi== 1){
        // This will only execute if you received any name
        $query = $query->where('wifi','on');
    }elseif($request->wifi == "0"){
       $query = $query->where('wifi','off');
    }



  

 }
    if($request->waterElectricity != null){
    if($request->waterElectricity == 1){
        // This will only execute if you received any name
        $query = $query->where('kahramam','on');
    }elseif($request->waterElectricity == "0"){
       $query = $query->where('kahramam','off');
    }

 }
    if($request->fee != null){

    if($request->fee == 1){
        // This will only execute if you received any name
        $query = $query->where('commission','0');
    }elseif($request->fee == "0"){
       $query = $query->where('commission','1');
    }


 }
    if($request->parking != null){
    if($request->parking == 1){
        // This will only execute if you received any name
        $query = $query->where('parking','on');
    }elseif($request->parking == "0"){
       $query = $query->where('parking','off');
    }
}


       
    if($request->roomsCountMin  != null){
        // This will only execute if you received any name
        $query = $query->where('room','>=',$request->roomsCountMin);
    }
    if($request->roomsCountMax != null){
        // This will only execute if you received any name
        $query = $query->where('room','<=',$request->roomsCountMax);
    }



    if($request->bathroomsCountMin != null){
        // This will only execute if you received any name
        $query = $query->where('toilet','>=',$request->bathroomsCountMin);
    }
    if($request->bathroomsCountMax != null){
        // This will only execute if you received any name
        $query = $query->where('toilet','<=',$request->bathroomsCountMax);
    }
    if($request->salonsCountMin  != null){
        // This will only execute if you received any name
        $query = $query->where('salon','>=',$request->salonsCountMin);
    }
    if($request->salonsCountMax){
        // This will only execute if you received any name
        $query = $query->where('salon','<=',$request->salonsCountMax);
    }
     
    if($request->secretaryServices != null){
    if($request->secretaryServices  == 1){
        // This will only execute if you received any name
        $query = $query->where('secretary','on');
    }elseif($request->secretaryServices == "0"){
      $query = $query->where('secretary','off');
    }

    // if($request->teaServices){
    //     // This will only execute if you received any name
    //     $query = $query->where('teaServices','like',$request->teaServices);
    // }
 }
    if($request->printingServices != null){
    if($request->printingServices   == 1){
        // This will only execute if you received any name
        $query = $query->where('imprimerie','on');
     }elseif($request->printingServices == "0"){
      $query = $query->where('imprimerie','off');
    }


}
    if($request->mainInterfaceLengthMin  != null){
        // This will only execute if you received any name
        $query = $query->where('interface','>=',$request->mainInterfaceLengthMin);
    }
    if($request->mainInterfaceLengthMax != null){
        // This will only execute if you received any name
        $query = $query->where('interface','<=',$request->mainInterfaceLengthMax);
    }

 
    if($request->mainRoad != null){
    if($request->mainRoad == 1){
        // This will only execute if you received any name
        $query = $query->where('On_a_paved_road','on');
    }
}
  
    if($request->warehouseHeightMin  != null){
        // This will only execute if you received any name
        $query = $query->where('Height','>=',$request->warehouseHeightMin);
    }
    if($request->warehouseHeightMax != null){
        // This will only execute if you received any name
        $query = $query->where('Height','<=',$request->warehouseHeightMax);
    }
    if($request->doorsCountMin  != null){
        // This will only execute if you received any name
        $query = $query->where('Number_of_doors','>=',$request->doorsCountMin);
    }
    if($request->doorsCountMax != null){
        // This will only execute if you received any name
        $query = $query->where('Number_of_doors','<=',$request->doorsCountMax);
    }







      
    if($request->name){
        // This will only execute if you received any name
        $query = $query->where('name','like',$request->name);
    }

    if($request->name_ar){
        // This will only execute if you received any name
        $query = $query->where('name_ar','like',$request->name_ar);
    }
   





    foreach ($query as $key => $value) {
 
 $value->category_id = intval($value->category_id);

 $value->price = intval($value->price);
 $value->phone = intval( $value->user->phone_code.$value->phone);
 $value->ville_id = intval($value->ville_id);
 $value->city_id = intval($value->city_id);
 $value->latitude = floatval($value->latitude);
 $value->longitude = floatval($value->longitude);

 $value->user_id = intval($value->user_id);
 $value->whatsapp =intval( $value->user->phone_code.$value->whatsapp);
 $value->espacer = intval($value->espacer);
 //$value->commission = intval($value->commission);
 $value->salon = intval($value->salon);
 $value->toilet = intval($value->toilet);
 $value->room = intval($value->room);
 $value->vupost = intval($value->vupost);
 $value->vuinsta = intval($value->vuinsta);
 $value->vufb = intval($value->vufb);
 $value->vuweb = intval($value->vuweb);

$value->Number_of_doors = intval($value->Number_of_doors);
 $value->Height = intval($value->Height);


$value->linkshare = route('/listing',$value->id);
 $value->price_cautionnement = intval($value->price_cautionnement);


 $value->clique_whatsapp = intval($value->clique_whatsapp);


if($value->accepted == "off")
        {$value->accepted = false;
    }else{
      $value->accepted = true;
        }

      if($value->rent_sale == "off")
        {$value->rent_sale = false;
    }else{
      $value->rent_sale = true;
        }
    if($value->chiket == "off")
        {$value->chiket = false;
    }else{
      $value->chiket = true;
        }
    if($value->cautionnement == "off")
        {$value->cautionnement = false;
    }else{
      $value->cautionnement = true;
        }
    if($value->wifi == "off")
        {$value->wifi = false;
    }else{
      $value->wifi = true;
        }
    if($value->route_principale == "off")
        {$value->route_principale = false;
    }else{
      $value->route_principale = true;
        }
    if($value->vip1 == "off")
        {$value->vip1 = false;
    }else{
      $value->vip1 = true;
        }
    if($value->vip2 == "off")
        {$value->vip2 = false;
    }else{
      $value->vip2 = true;
        }
    if($value->parking == "off")
        {$value->parking = false;
    }else{
      $value->parking = true;
        }
    if($value->Piscine == "off")
        {$value->Piscine = false;
    }else{
      $value->Piscine = true;
        }
    if($value->gym == "off")
        {$value->gym = false;
    }else{
      $value->gym = true;
        }
    if($value->firstsaken == "off")
        {$value->firstsaken = false;
    }else{
      $value->firstsaken = true;
        }
    if($value->officeoy == "off")
        {$value->officeoy = false;
    }else{
      $value->officeoy = true;
        }
    if($value->office == "off")
        {$value->office = false;
    }else{
      $value->office = true;
        }
    if($value->secretary == "off")
        {$value->secretary = false;
    }else{
      $value->secretary = true;
        }
    if($value->imprimerie == "off")
        {$value->imprimerie = false;
    }else{
      $value->imprimerie = true;
        }
    if($value->furnished == "off")
        {$value->furnished = false;
    }else{
      $value->furnished = true;
        }

    if($value->DELETED == "off")
        {$value->DELETED = false;
    }else{
      $value->DELETED = true;
        }


        if($value->kahramam == "off")
        {$value->kahramam = false;
    }else{
      $value->kahramam = true;
        }


 if($value->commission == "off")
        {$value->commission = false;
    }else{
      $value->commission = true;
        }

        if($value->On_a_paved_road == "off")
        {$value->On_a_paved_road = false;
    }else{
      $value->On_a_paved_road = true;
        }

   if($value->metro == "0")
        {$value->metro = false;
    }else{
      $value->metro = true;
        }



         if($value->family == "0")
        {$value->family = false;
    }else{
      $value->family = true;
        }


    
 $value->favorite = count(favorite::where('produit_id',$value->id)->get());




// if (Auth::guard('api')->check()) {
//     $user = Auth::guard('api')->user();
//            if(count(favorite::where('produit_id',$value->id)->where('user_id',$user->id)->get()) >0){
//   $value->isLiked = true;
// }else{
//   $value->isLiked = false;
// }
// }else{
//   $value->isLiked = false;
// }
if(count(favorite::where('produit_id',$value->id)->where('user_id',$request->user_id)->get()) >0){
  $value->isLiked = true;
}else{
  $value->isLiked = false;
}


    $value->vip1_date = null;
$value->vip2_date = null;

$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_date = $vip2->date;
}
    $value->images = Produit_photo::where('produit_id',$value->id)->get();
    foreach ($value->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }
            $value->photo = 'ejar/public/images/'.$value->photo;
      
        }



     return response()->json($query->values()->all());
    }




    public function addphoto(Request $request){


// try{
   $base64_image =  $request->photo; // your base64 encoded     
    @list($type, $file_data) = explode(';', $base64_image);
    @list(, $file_data) = explode(',', $file_data); 
    $imageName = Str::random(40).'.'.'png';   
           $path =  Storage::disk('images')->put('produit/'.$imageName, base64_decode($file_data));

     //Storage::disk('images')->put('produit',  base64_decode($image));
    // Save thumb
            
    $img = InterventionImage::make( base64_decode($file_data))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = 'produit/'.$path;
        


         DB::insert('insert into produit_photos (produit_id, photo) values (?, ?)', [$request->id, 'produit/'.$imageName]);

         $response["success"] = true;
         return response()->json( $response); 
// }catch (Exception $exception){
// $response["success"] = false;
//          return response()->json( $exception); 
// }
 
    }


}
