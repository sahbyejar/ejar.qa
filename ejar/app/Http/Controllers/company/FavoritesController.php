<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Vip;
use App\Models\Produit_photo;
use App\Models\Vu;
use App\Models\City;
use App\Models\Ville;
use Carbon\Carbon;
use App\Models\User;
use App\Models\category;
class FavoritesController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
 $collection = new \Illuminate\Database\Eloquent\Collection();
        $favoritess = favorite::with('produit')->where('user_id',$request->user_id)->get();

        foreach ($favoritess as $favorite) {
       
            if($favorite->produit == null){
                $favorite->delete();
            }}
 $favorites = favorite::with('produit')->where('user_id',$request->user_id)->get();
 foreach ($favorites as $favorite) {
         $favorite->produit->photo = 'ejar/public/images/'.$favorite->produit->photo;
         
 $favorite->produit->category_id = intval($favorite->produit->category_id);
   $favorite->produit->price = intval($favorite->produit->price);
 $favorite->produit->phone = intval($favorite->produit->phone);
 $favorite->produit->ville_id = intval($favorite->produit->ville_id);
 $favorite->produit->city_id = intval($favorite->produit->city_id);
 $favorite->produit->latitude = floatval($favorite->produit->latitude);
 $favorite->produit->longitude = floatval($favorite->produit->longitude);  

$favorite->produit->user = User::find($favorite->produit->user_id);
$favorite->produit->category = category::find($favorite->produit->category_id);

 $favorite->produit->user_id = intval($favorite->produit->user_id);
 $favorite->produit->whatsapp = intval($favorite->produit->whatsapp);
 $favorite->produit->espacer = intval($favorite->produit->espacer);
 $favorite->produit->commission = intval($favorite->produit->commission);
 $favorite->produit->salon = intval($favorite->produit->salon);
 $favorite->produit->toilet = intval($favorite->produit->toilet);
 $favorite->produit->room = intval($favorite->produit->room);

$favorite->produit->linkshare = route('/listing',$favorite->produit->id);
 $favorite->produit->vupost = intval($favorite->produit->vupost);
 $favorite->produit->vuinsta = intval($favorite->produit->vuinsta);
 $favorite->produit->vufb = intval($favorite->produit->vufb);
 $favorite->produit->vuweb = intval($favorite->produit->vuweb);
 $favorite->produit->clique_whatsapp = intval($favorite->produit->clique_whatsapp);


 $favorite->produit->price_cautionnement = intval($favorite->produit->price_cautionnement);

$favorite->produit->Number_of_doors = intval($favorite->produit->Number_of_doors);
 $favorite->produit->Height = intval($favorite->produit->Height);
if($favorite->produit->accepted == "off")
        {$favorite->produit->accepted = false;
    }else{
      $favorite->produit->accepted = true;
        }



      if($favorite->produit->rent_sale == "off")
        {$favorite->produit->rent_sale = false;
    }else{
      $favorite->produit->rent_sale = true;
        }
    if($favorite->produit->chiket == "off")
        {$favorite->produit->chiket = false;
    }else{
      $favorite->produit->chiket = true;
        }
    if($favorite->produit->cautionnement == "off")
        {$favorite->produit->cautionnement = false;
    }else{
      $favorite->produit->cautionnement = true;
        }
    if($favorite->produit->wifi == "off")
        {$favorite->produit->wifi = false;
    }else{
      $favorite->produit->wifi = true;
        }
    if($favorite->produit->route_principale == "off")
        {$favorite->produit->route_principale = false;
    }else{
      $favorite->produit->route_principale = true;
        }
    if($favorite->produit->vip1 == "off")
        {$favorite->produit->vip1 = false;
    }else{
      $favorite->produit->vip1 = true;
        }
    if($favorite->produit->vip2 == "off")
        {$favorite->produit->vip2 = false;
    }else{
      $favorite->produit->vip2 = true;
        }
    if($favorite->produit->parking == "off")
        {$favorite->produit->parking = false;
    }else{
      $favorite->produit->parking = true;
        }
    if($favorite->produit->Piscine == "off")
        {$favorite->produit->Piscine = false;
    }else{
      $favorite->produit->Piscine = true;
        }
    if($favorite->produit->gym == "off")
        {$favorite->produit->gym = false;
    }else{
      $favorite->produit->gym = true;
        }
    if($favorite->produit->firstsaken == "off")
        {$favorite->produit->firstsaken = false;
    }else{
      $favorite->produit->firstsaken = true;
        }
    if($favorite->produit->officeoy == "off")
        {$favorite->produit->officeoy = false;
    }else{
      $favorite->produit->officeoy = true;
        }
    if($favorite->produit->office == "off")
        {$favorite->produit->office = false;
    }else{
      $favorite->produit->office = true;
        }
    if($favorite->produit->secretary == "off")
        {$favorite->produit->secretary = false;
    }else{
      $favorite->produit->secretary = true;
        }
    if($favorite->produit->imprimerie == "off")
        {$favorite->produit->imprimerie = false;
    }else{
      $favorite->produit->imprimerie = true;
        }
    if($favorite->produit->furnished == "off")
        {$favorite->produit->furnished = false;
    }else{
      $favorite->produit->furnished = true;
        }

    if($favorite->produit->DELETED == "off")
        {$favorite->produit->DELETED = false;
    }else{
      $favorite->produit->DELETED = true;
        }


         if($favorite->produit->kahramam == "off")
        {$favorite->produit->kahramam = false;
    }else{
      $favorite->produit->kahramam = true;
        }

        if($favorite->produit->On_a_paved_road == "off")
        {$favorite->produit->On_a_paved_road = false;
    }else{
      $favorite->produit->On_a_paved_road = true;
        }



 if($favorite->produit->metro == "0")
        {$favorite->produit->metro = false;
    }else{
      $favorite->produit->metro = true;
        }



         if($favorite->produit->family == "0")
        {$favorite->produit->family = false;
    }else{
      $favorite->produit->family = true;
        }

$favorite->produit->ville = Ville::findOrFail($favorite->produit->ville_id);
$favorite->produit->city = City::findOrFail($favorite->produit->city_id);

    $favorite->produit->vip1_date = null;
$favorite->produit->vip2_date = null;

$vip1 = Vip::where('Produit_id',$favorite->produit->id)->where('vip',1)->first();
if($vip1){
    $favorite->produit->vip1 = true;
}else{

$favorite->produit->vip1 = false;
}
$vip2 = Vip::where('Produit_id',$favorite->produit->id)->where('vip',2)->first();
if($vip2){
     $favorite->produit->vip2 = true;
}else{
     $favorite->produit->vip2 = false;
}
    $favorite->produit->images = Produit_photo::where('produit_id',$favorite->produit->id)->get();
    foreach ($favorite->produit->images as $key) {
        $key->photo = 'ejar/public/images/'.$key->photo;
    }
           



 $collection->add($favorite->produit);
         
        }

       return response()->json($collection);
    }

    /**
     * Store a new favorite in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $favorite = favorite::where('produit_id',$request->produit_id)->where('user_id',$request->user_id)->first();
            if(!$favorite){

                $validator = $this->getValidator($request);

            if ($validator->fails()) {
                    $response["success"] = false;
              //  return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);
            
            $favorite = favorite::create($data);
            $response["success"] = true;
        }else{
            

            $response["success"] = false;
            
            }
         return response()->json( $response);
        } catch (Exception $exception) {
              $response["success"] = false;
            
            
         return response()->json( $response);
            return $this->errorResponse(trans('favorites.unexpected_error'));
        }
    }

    /**
     * Display the specified favorite.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorite = favorite::with('produit','user')->findOrFail($id);

        return $this->successResponse(
		    trans('favorites.model_was_retrieved'),
		    $this->transform($favorite)
		);
    }

    /**
     * Update the specified favorite in the storage.
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
            
            $favorite = favorite::findOrFail($id);
            $favorite->update($data);

            return $this->successResponse(
			    trans('favorites.model_was_updated'),
			    $this->transform($favorite)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('favorites.unexpected_error'));
        }
    }

    /**
     * Remove the specified favorite from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $favorite = favorite::where('produit_id',$request->produit_id)->where('user_id',$request->user_id)->first();
            if($favorite ){
            $favorite->delete();
            $response["success"] = true;
        }else{
            $response["success"] = false;
        }
            

         return response()->json( $response);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('favorites.unexpected_error'));
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
            'produit_id' => 'nullable',
            'user_id' => 'nullable', 
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
                'produit_id' => 'nullable',
            'user_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    /**
     * Transform the giving favorite to public friendly array
     *
     * @param App\Models\favorite $favorite
     *
     * @return array
     */
    protected function transform(favorite $favorite)
    {
        return [
            'id' => $favorite->id,
            'produit_id' => optional($favorite->produit),
            'user_id' => optional($favorite->user),
        ];
    }


}
