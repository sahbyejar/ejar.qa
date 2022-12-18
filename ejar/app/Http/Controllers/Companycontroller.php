<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use App\Models\Produit;
use App\Models\Ville;
use App\Models\Vip;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Exception;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
class Companycontroller extends Controller
{
     public function campanystore(Request $request)
    {
        $user1 = User::where('phone',$request->phone_code.$request->phone)->orWhere('phone',$request->phone)->first();

        if($user1){
            //dd(User::where('phone',$request->phone_code.$request->phone)->first());
           $user1->type = $request->type;
           $user1->email = $request->email;
           $user1->phone = $request->phone;
        $user1->password = bcrypt($request->password);
        $user1->save();
            return ("success");
        }
       
            $id = User::latest()->first()->id;
       
        $id = $id + 1;
        try {
             $user = new User();
        $user->name = 'campany'.$id;
        $user->user_name = 'campany'.$id;

        if($request->auto == "on"){
        $user->email = $request->email;
        
        $user->password = bcrypt($request->password);
        }else if($request->auto == "off"){
        $user->email = 'campany'.$id.'@ejar.qa';
        $user->password = bcrypt('password');
         }
        $user->type = $request->type;
        $user->phone = $request->phone_code.$request->phone;
        $user->photo = 'LOGO.png';
        $user->city_id = '17';
        $user->ville_id = '12';
        $user->expert = $request->expert;
        $user->save();

        return ("success");
            
        } catch (Exception $e) {
           return ("failed"); 
        }
       
        // return response()->json($request->name);
       }


        public function campanyeditdate(Request $request)
    {
       
           
        
        $user =  User::find($request->id);
      
        $user->expert = $request->expert;
        $user->save();

        return ("success");
        // return response()->json($request->name);
       }


         public function updatecampany($id,Request $request)
    {

 
        try {
            $user = User::findOrFail($id);
           
            if($request->password != null){

        $request->password = Hash::make($request->password);
            }
            $data = $this->getData1($request);
            //  dd($request->password );
            
            $user->update($data);
  // dd($request->password );
            return redirect()->route('campany')
                ->with('success_message', 'Company was successfully updated.');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

     public function editcampany($id)
    {
        $user = User::findOrFail($id);
        $villes = Ville::pluck('created_at','id')->all();
        $cities = City::all();
   $countries = DB::table('countries')->get();
        return view('campany.edit', compact('user','villes','cities','countries'));
    }

 public function campany()
    {

              $countries = DB::table('countries')->where('stat',1)->get();

        $users = User::where('type','campany1')->orwhere('type','campany2')->orwhere('type','campany3')->orwhere('type','campany4')->orwhere('type','campany5')->orwhere('type','campany6')->orwhere('type','campany7')->orwhere('type','campany8')->orwhere('type','campany9')->with('ville','city')->paginate(500000);
        foreach ($users as $item) {
            $item->day = Carbon::parse($item->expert)->diffInDays(Carbon::now());
//dd(Carbon::parse(Carbon::now())->diffInDays($item->expert));
            # code...
        }

        return view('campany.index', compact('users','countries'));
    }

  public function showcampany($id)
    {
        $user = User::with('ville','city')->findOrFail($id);

        return view('campany.show', compact('user'));
    }
    public function destroycampany($id)
    {
        try {
            $user = User::findOrFail($id);
           $user->delete_date =Carbon::now()->addDays(7);
            $user->DELETED = "Yes";
            $user->save();

            return redirect()->route('campany')
                ->with('success_message', 'User was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }
 protected function getData1(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:255',
            'user_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            
            'phone' => 'nullable|string|min:0|max:255',
            'photo' => 'nullable|file|min:0|max:255',
            'rating' => 'nullable|string|min:0|max:255',
            'siteweb' => 'nullable|string|min:0|max:255',
            'facebook' => 'nullable|string|min:0|max:255',
            'instagram' => 'nullable|string|min:0|max:255',
            'youtube' => 'nullable|string|min:0|max:255',
            'twitter' => 'nullable|string|min:0|max:255',
            'whats' => 'nullable|string|min:0|max:255',
            'type' => 'nullable|string|min:0|max:255',
            'ville_id' => 'nullable',
            'city_id' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'remember_token' => 'nullable|string|min:0|max:100',
            'phone_code' => 'nullable|string|min:0|max:255', 
            'CommercialRecord' => 'nullable',
        ];
        
        $data = $request->validate($rules);

 if ($request->hasFile('photo')) {
             $path = Storage::disk('images')->put('user_photo', $request->file('photo'));
    // Save thumb
            
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = $path;
        }

        return $data;
    }


    public function vup($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name ." ". $user->name_ar;
        $vips = collect();
        $produits = Produit::where('user_id',$id)->get();
        foreach($produits as $produit){
            foreach(Vip::where('Produit_id',$produit->id)->get() as $vip){
                $vip->name = $produit->name ." ". $produit->name_ar;
 $vips->push($vip);
            }
           
        }
 
        foreach ($vips as $item) {
            $item->day = Carbon::parse(now())->diffInDays($item->dateend, false);

            # code...
        }

$type = "Company";
 return view('produits.vip', compact('name','vips','type'));
        
         
    }


}
