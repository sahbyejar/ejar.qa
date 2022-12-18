<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Produit;
use App\Models\Ville;
use App\Models\Vip;
use App\Models\category;
use App\Models\Produit_photo;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
class ProduitsController extends Controller
{

    /**
     * Display a listing of the produits.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {   

        if(Auth::user()->type == 'superadmin' ){
        $produits = Produit::where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->orderBy('premium', 'DESC')->paginate(5);
        }if(Auth::user()->type == 'admin' ){
            
$produits=new Collection();
        $produitsall = Produit::where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->orderBy('premium', 'DESC')->paginate(5);
        $citys = City::where('countre_id',Auth::user()->countries->id)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','Yes')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
        $produits = $produits->paginate(5);
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5'|| Auth::user()->type == 'campany6' || Auth::user()->type == 'campany7' || Auth::user()->type == 'campany8' || Auth::user()->type == 'campany9' || Auth::user()->type == 'seller'){
            $produits = Produit::where('DELETED','off')->where('accepted','Yes')->where('user_id',Auth::user()->id)->with('category','user','ville','city')->orderBy('premium', 'DESC')->paginate(20);
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

$vip3 = Vip::where('Produit_id',$value->id)->where('vip',3)->first();
if($vip3){
    $value->vip3_datestart = $vip3->date;
    $value->vip3_dateend = $vip3->dateend;
}
}





        return view('produits.index', compact('produits','cities'));
    }

    /**
     * Show the form for creating a new produit.
     *
     * @return Illuminate\View\View
     */
    public function create($id)
    {
        $villes = Ville::pluck('ville','id')->all();
$cities = City::where('countre_id',Auth::user()->city->countre_id)->pluck('name','id')->all();
 $category = category::findOrFail($id);
        $countries = DB::table('countries')->get();


        return view('produits.create', compact('villes','cities','id','category','countries'));
    }

    /**
     * Store a new produit in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

      
        try {
            
            $data = $this->getData($request);
            
         $produit=   Produit::create($data);

         foreach ($request->photo as $value) {
            $path = Storage::disk('images')->put('produit', $value);
    // Save thumb
    $img = InterventionImage::make($value)->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
    //return($path);
 $produit->photo = $path;
 DB::insert('insert into produit_photos (produit_id, photo) values (?, ?)', [$produit->id, $path]);
         }
        $produit->save();
         if(Auth::user()->type == 'seller' ){
        $request->id = $produit->id;
      $hestory = (new historyController)->addproduit($request);
    }

         if(Auth::user()->type == "user"){
         return redirect()->route('produits.produit.notconfermid')->with('success_message', trans('produits.model_was_added'));
     }else{
        return redirect()->route('produits.produit.index')->with('success_message', trans('produits.model_was_added'));
     }

             
        } catch (Exception $exception) {
       //  dd($exception);

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('produits.unexpected_error')]);
        }
    }

    /**
     * Display the specified produit.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {

        $produit = Produit::with('category','user','ville','city')->findOrFail($id);
           
        $images = Produit_photo::where('produit_id',$id)->get();

$i = 0;
$v =0;
        foreach ($images as $key => $value) {

            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

$explodeImage = explode('.', url('/ejar/public/images/' . $value->photo));
$extension = end($explodeImage);
 //  dd( );
if(in_array($extension, $imageExtensions))
{
  $value->type = 'image';
  $value->i = $i;
  $i=$i+1;
}else
{
  $value->type = 'video';
  $value->v = $v;
  $v=$v+1;
    // Is not image 
}
        
        }
        return view('produits.showp', compact('produit','images'));
    }


 public function addphoto($id)
    {
     
        $produit = Produit::findOrFail($id);
        $images = Produit_photo::where('produit_id',$id)->get();
$i = 0;
$v =0;
        foreach ($images as $key => $value) {

            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

$explodeImage = explode('.', url('/ejar/public/images/' . $value->photo));
$extension = end($explodeImage);
 //  dd( );
if(in_array($extension, $imageExtensions))
{
  $value->type = 'image';
  $value->i = $i;
  $i=$i+1;
}else
{
  $value->type = 'video';
  $value->v = $v;
  $v=$v+1;
    // Is not image 
}
        
        }

        return view('produits.photo', compact('produit','images'));
    }





    public function addimage(Request $request)
    {

        try {
             foreach  ($request->file('fileimage') as $imagefile) {
          
       $path = Storage::disk('images')->put('produit', $imagefile);
    // Save thumb
    $img = InterventionImage::make($imagefile)->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
    //return($path);

 DB::insert('insert into produit_photos (produit_id, photo) values (?, ?)', [$request->produit, $path]);

        }
        } catch (Exception $e) {
          //  dd($e);
        }
     
     return redirect()->route('produits.produit.addphoto',$request->produit);

    }



     public function addvedio(Request $request)
    {
       

        if($request->file('file')){

            // $file = $request->file('file');
            // $filename = $file->getClientOriginalName();
            // $path = '/images/';
            $vedio = Storage::disk('images')->put('produit', $request->file('file'));
             DB::insert('insert into produit_photos (produit_id, photo) values (?, ?)', [$request->produit, $vedio ]);

        }
       
    return redirect()->route('produits.produit.addphoto',$request->produit);

    }


    public function deleteimage(Request $request)
    {


  DB::table('produit_photos')->where('id', $request->id)->delete();
   
return($request);

    }

public function refused(Request $request,$id)
    {
        $produit = Produit::findOrFail($id);
        $produit->accepted = "refused";
        $produit->save();

        $request->user_id = $produit->user_id;
          $request->message = "تم رفض العقار ".$produit->name ;
         $request->type = '2';


        $result = (new notificationController)->send($request);

          return redirect()->route('produits.produit.refusedlist')
                ->with('success_message', trans('produits.model_was_updated'));
    }


    public function accepted(Request $request,$id)
    {
        $produit = Produit::findOrFail($id);
        $produit->accepted = "Yes";
        $produit->save();

        $request->user_id = $produit->user_id;
          $request->message = "تم الموافق على  العقار ".$produit->name ;
         $request->type = '2';


       // $result = (new notificationController)->send($request);

          return redirect()->route('produits.produit.index')
                ->with('success_message', trans('produits.model_was_updated'));
    }



  public function vup($id)
    {
        $produit = Produit::findOrFail($id);
        $vips = Vip::where('Produit_id',$produit->id)->get();
      
        foreach ($vips as $item) {
            $item->day = Carbon::parse(now())->diffInDays($item->dateend, false);

            # code...
        }

        $type = "produit";
 return view('produits.vip', compact('produit','vips','type'));
        
         
    }





    /**
     * Show the form for editing the specified produit.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $villes = Ville::pluck('ville','id')->all();
$cities = City::pluck('name','id')->all();
$category = category::findOrFail($produit->category_id);
$idd = $produit->category_id;
   $countries = DB::table('countries')->get();

        return view('produits.edit', compact('produit','villes','cities','idd','countries'));
    }

    /**
     * Update the specified produit in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $produit = Produit::findOrFail($id);
            $produit->update($data);

            return redirect()->route('produits.produit.index')
                ->with('success_message', trans('produits.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('produits.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified produit from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $produit = Produit::findOrFail($id);
            $produit->delete_date =Carbon::now()->addDays(7);
            $produit->DELETED = "Yes";
            $produit->save();
               if(Auth::user()->type == 'seller' ){
        $request->id = $id;
      $hestory = (new historyController)->deleteproduit($request);
    }
            $vip = Vip::where('Produit_id',$id)->get();
            foreach ($vip as $value) {
                $value->delete();
                # code...
            }
            return redirect()->route('produits.produit.index')
                ->with('success_message', trans('produits.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('produits.unexpected_error')]);
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
                'name_ar' => 'string|min:1',
            'name' => 'string|min:1|max:255',
          
            'discription_ar' => 'string|min:1',
            'discription' => 'string|min:1',
            'price' => 'string|min:1',
            'phone' => 'string|min:1|nullable',
            'ville_id' => 'min:1',
            'city_id' => 'min:1',
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
            'vip1' => 'string|min:1|nullable',
            'vip2' => 'string|min:1|nullable',
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
            'metro' => 'string|min:1|nullable',
            'family' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        
        $data['category_id'] = $request->category;
        $data['user_id'] = Auth()->user()->id;
        
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
 
        
     if(Auth::user()->type == "user"){
        $data['accepted'] = "off";
     }else{
        $data['accepted'] = "Yes";
     }

        return $data;
    }


    public function notconfermid()
    {   
if(Auth::user()->type == 'superadmin' ){
        $produits = Produit::where('DELETED','off')->where('accepted','off')->with('category','user','ville','city')->paginate(5);
        }elseif(Auth::user()->type == 'admin' ){
        $produits = Produit::where('DELETED','off')->where('accepted','off')->with('category','user','ville','city')->paginate(5);
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'campany6' || Auth::user()->type == 'campany7' || Auth::user()->type == 'campany8' || Auth::user()->type == 'campany9' || Auth::user()->type == 'seller'){
            $produits = Produit::where('DELETED','off')->where('accepted','off')->where('user_id',Auth::user()->id)->with('category','user','ville','city')->paginate(20);
        }

     
      


$cities = City::pluck('name_ar','id')->all();
foreach ($produits as $key => $value) {



$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_date = $vip2->date;
}
}



        return view('produits.notconfermid', compact('produits','cities'));
    }











     public function refusedlist()
    {   

 if(Auth::user()->type == 'superadmin' ){
        $produits = Produit::where('DELETED','off')->where('accepted','refused')->with('category','user','ville','city')->paginate(5);
        }if(Auth::user()->type == 'admin' ){
            
$produits=new Collection();
        $produitsall = Produit::where('DELETED','off')->where('accepted','refused')->with('category','user','ville','city')->paginate(5);
        $citys = City::where('countre_id',Auth::user()->countries->id)->get();
        foreach ($citys as $keys) {
            foreach (Produit::where('DELETED','off')->where('city_id',$keys->id)->where('accepted','refused')->with('category','user','ville','city')->get() as  $va) {
                # code...
                $produits->push($va);
            }            
        }
        $produits = $produits->paginate(5);
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5'|| Auth::user()->type == 'campany6' || Auth::user()->type == 'seller'){
            $produits = Produit::where('DELETED','off')->where('accepted','Yes')->where('user_id',Auth::user()->id)->with('category','user','ville','city')->paginate(20);
        }
     
      


$cities = City::pluck('name_ar','id')->all();
foreach ($produits as $key => $value) {



$vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
if($vip1){
    $value->vip1_date = $vip1->date;
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
if($vip2){
    $value->vip2_date = $vip2->date;
}
}

        return view('produits.refused', compact('produits','cities'));
    }
 



    

   public function cherche(Request $search)
    {    $produit = Produit::where('DELETED','off')->where('accepted','Yes')->where('name','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('discription_ar','like','%'.$search->find.'%')->orWhere('discription','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('id','like','%'.$search->find.'%')->orWhere('ville_id',$search->ville_id)->orWhere('city_id',$search->city_id)->with('category','user','ville','city')->get();

 $produits = collect();
       if(Auth::user()->type == 'superadmin' ){
       foreach ($produit as  $values) {
          if($values->accepted =="Yes"){
             $produits->add($values);
          }



  $dateweb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datefb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $dateinstainstagrame=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datepost=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datewhatsapp=  array(0,0,0,0,0,0,0,0,0,0,0,0 );


$web =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','Web')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($web as $k => $v) {
                        $dateweb[$k-1] = $web[$k];
                        # code...
                    }
$whatsapps =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','whatsapp')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($whatsapps as $k => $v) {
                        $datewhatsapp[$k-1] = $whatsapps[$k];
                        # code...
                    }
$post =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','post')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($post as $k => $v) {
                        $datepost[$k-1] = $post[$k];
                        # code...
                    }
                  
$facebook =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','facebook')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($facebook as $k => $v) {
                        $datefb[$k-1] = $facebook[$k];
                        # code...
                    }
$instagrame =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','instagrame')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($instagrame as $k => $v) {
                        $dateinstainstagrame[$k-1] = $instagrame[$k];
                        # code...
                    }



$values->dateweb = $dateweb;
$values->datefb = $datefb;
$values->dateinstainstagrame = $dateinstainstagrame;
$values->datepost = $datepost;
$values->datewhatsapp = $datewhatsapp;
        } 
        }elseif(Auth::user()->type == 'admin' ){
       foreach ($produit as  $values) {
          if($values->accepted =="Yes"){
             $produits->add($values);
          }



  $dateweb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datefb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $dateinstainstagrame=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datepost=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datewhatsapp=  array(0,0,0,0,0,0,0,0,0,0,0,0 );


$web =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','Web')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($web as $k => $v) {
                        $dateweb[$k-1] = $web[$k];
                        # code...
                    }
$whatsapps =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','whatsapp')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($whatsapps as $k => $v) {
                        $datewhatsapp[$k-1] = $whatsapps[$k];
                        # code...
                    }
$post =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','post')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($post as $k => $v) {
                        $datepost[$k-1] = $post[$k];
                        # code...
                    }
                  
$facebook =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','facebook')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($facebook as $k => $v) {
                        $datefb[$k-1] = $facebook[$k];
                        # code...
                    }
$instagrame =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','instagrame')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($instagrame as $k => $v) {
                        $dateinstainstagrame[$k-1] = $instagrame[$k];
                        # code...
                    }



$values->dateweb = $dateweb;
$values->datefb = $datefb;
$values->dateinstainstagrame = $dateinstainstagrame;
$values->datepost = $datepost;
$values->datewhatsapp = $datewhatsapp;
        } 
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'seller' || Auth::user()->type == 'seller'){

           foreach ($produit as  $values) {
          if($values->accepted =="Yes" && $values->user_id ==Auth::user()->id){
             $produits->add($values);
          }
        } 
          
         
        }


        foreach ($produits as $key => $value) {
          

  $dateweb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datefb=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $dateinstainstagrame=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datepost=  array(0,0,0,0,0,0,0,0,0,0,0,0 );
             $datewhatsapp=  array(0,0,0,0,0,0,0,0,0,0,0,0 );


$web =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','Web')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($web as $k => $v) {
                        $dateweb[$k-1] = $web[$k];
                        # code...
                    }
$whatsapps =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','whatsapp')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($whatsapps as $k => $v) {
                        $datewhatsapp[$k-1] = $whatsapps[$k];
                        # code...
                    }
$post =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','post')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($post as $k => $v) {
                        $datepost[$k-1] = $post[$k];
                        # code...
                    }
                  
$facebook =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','facebook')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($facebook as $k => $v) {
                        $datefb[$k-1] = $facebook[$k];
                        # code...
                    }
$instagrame =  \DB::table('vus')
         ->select(\DB::raw('count(id) as total'), \DB::raw('MONTH(created_at) as month'))
         ->where('vu','instagrame')
         ->where('Produit_id',$values->id)
         ->groupBy('month')
         ->pluck('total','month');
         foreach ($instagrame as $k => $v) {
                        $dateinstainstagrame[$k-1] = $instagrame[$k];
                        # code...
                    }



$values->dateweb = $dateweb;
$values->datefb = $datefb;
$values->dateinstainstagrame = $dateinstainstagrame;
$values->datepost = $datepost;
$values->datewhatsapp = $datewhatsapp;



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

     
      return $produits;
}

    public function produitsvip1()
    {   

              $produits = collect(new Produit);
$vipget =Vip::where('vip',1)->get(); 
        if(Auth::user()->type == 'admin' || Auth::user()->type == 'superadmin' ){
          foreach ($vipget as $key => $values) {
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->first();
            $produits->add($produit);
          }
      
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'seller'){
       foreach ($vipget as $key => $values) {
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->where('user_id',Auth::user()->id)->with('category','user','ville','city')->first();
            if($produit){ $produits->add( $produit);}
           
          }
        }


        $villes = Ville::pluck('ville','id')->all();
$cities = City::pluck('name_ar','id')->all();

foreach ($produits as  $value) {



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

        return view('produits.vip1', compact('produits','cities'));
    }

    public function produitsvip2()
    {   
      $produits = collect();
$vipget =Vip::where('vip',2)->get(); 
        if(Auth::user()->type == 'admin'  || Auth::user()->type == 'superadmin' ){
          foreach ($vipget as $key => $values) {
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->first();
            $produits->add($produit);
          }
      
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'seller'){
           foreach ($vipget as $key => $values) {      
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->where('user_id',Auth::user()->id)->with('category','user','ville','city')->first();
           if($produit){ $produits->add( $produit);}
          }
        }


        $villes = Ville::pluck('ville','id')->all();
$cities = City::pluck('name_ar','id')->all();
foreach ($produits as $key => $value) {



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

        return view('produits.vip1', compact('produits','cities'));
    }



        public function produitsvip3()
    {   

              $produits = collect(new Produit);
$vipget =Vip::where('vip',3)->get(); 
        if(Auth::user()->type == 'admin' || Auth::user()->type == 'superadmin' ){
          foreach ($vipget as $key => $values) {
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->with('category','user','ville','city')->first();
            $produits->add($produit);
          }
      
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'seller'){
       foreach ($vipget as $key => $values) {
            $produit = Produit::where('id',$values->Produit_id)->where('DELETED','off')->where('accepted','Yes')->where('user_id',Auth::user()->id)->with('category','user','ville','city')->first();
            if($produit){ $produits->add( $produit);}
           
          }
        }


        $villes = Ville::pluck('ville','id')->all();
$cities = City::pluck('name_ar','id')->all();

foreach ($produits as  $value) {



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
$vip3 = Vip::where('Produit_id',$value->id)->where('vip',3)->first();
if($vip3){
    $value->vip3_datestart = $vip3->date;
    $value->vip3_dateend = $vip3->dateend;
}
}

        return view('produits.premium', compact('produits','cities'));
    }




  public function cherchenot(Request $search)
    {   


  if(Auth::user()->type == 'admin'  || Auth::user()->type == 'superadmin'  ){
       $produit = Produit::where('DELETED','off')->where('accepted','off')->where('name','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('discription_ar','like','%'.$search->find.'%')->orWhere('discription','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('id','like','%'.$search->find.'%')->orWhere('ville_id',$search->ville_id)->orWhere('city_id',$search->city_id)->with('category','user','ville','city')->get();
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'seller'){
          
            $produit = Produit::where('user_id',Auth::user()->id)->where('accepted','off')->where('DELETED','off')->where('name','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('discription_ar','like','%'.$search->find.'%')->orWhere('discription','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('id','like','%'.$search->find.'%')->orWhere('ville_id',$search->ville_id)->orWhere('city_id',$search->city_id)->with('category','user','ville','city')->get();
        }
 $produits = collect();
       foreach ($produit as  $values) {
          if($values->accepted =="off"){
             $produits->add($values);
          }
        } 
        
        foreach ($produits as $key => $value) {



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

     
      return $produits;
}






 public function chercheref(Request $search)
    {   


  if(Auth::user()->type == 'admin'  || Auth::user()->type == 'superadmin'  ){
       $produit = Produit::where('DELETED','off')->where('accepted','refused')->where('name','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('discription_ar','like','%'.$search->find.'%')->orWhere('discription','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('id','like','%'.$search->find.'%')->orWhere('ville_id',$search->ville_id)->orWhere('city_id',$search->city_id)->with('category','user','ville','city')->get();
        }elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3'|| Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5' || Auth::user()->type == 'seller'){
          
            $produit = Produit::where('user_id',Auth::user()->id)->where('accepted','refused')->where('DELETED','off')->where('name','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('discription_ar','like','%'.$search->find.'%')->orWhere('discription','like','%'.$search->find.'%')->orWhere('name_ar','like','%'.$search->find.'%')->orWhere('id','like','%'.$search->find.'%')->orWhere('ville_id',$search->ville_id)->orWhere('city_id',$search->city_id)->with('category','user','ville','city')->get();
        }
 $produits = collect();
       foreach ($produit as  $values) {
          if($values->accepted =="refused"){
             $produits->add($values);
          }
        } 
        
        foreach ($produits as $key => $value) {



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

     
      return $produits;
}






 public function premium(Request $request)
    {
       
        $produit = Produit::findOrFail($request->id);
        if ($produit->premium == 0) {

            $produit->premium = 1;
            $produit->save();
            return "save";
        } else {
            $produit->premium = 0;
            $produit->save();
            return "delete";
        }
    }
  
}
