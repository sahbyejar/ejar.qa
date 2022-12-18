<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Exception;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class sellerController extends Controller
{
    
    /**
     * Display a listing of the seller.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
       // dd("nnn");
        $users = User::where('type','seller')->where('campany_id',Auth::user()->id)->with('ville','city')->paginate(5000);

        return view('seller.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $villes = Ville::pluck('ville','id')->all();
$cities = City::all();
      $countries = DB::table('countries')->where('stat',1)->get();
   
        return view('seller.create', compact('villes','cities','countries'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            if($request->password != null){
        $request->password = Hash::make($request->password);
            }
            $data = $this->getData($request);
            
            User::create($data);

            return redirect()->route('seller.seller.index')
                ->with('success_message', 'User was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::with('ville','city')->findOrFail($id);

        return view('seller.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $villes = Ville::pluck('created_at','id')->all();
$cities = City::all();
 $countries = DB::table('countries')->where('stat',1)->get();
        return view('seller.edit', compact('user','villes','cities','countries'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

 
        try {
            $user = User::findOrFail($id);
            if($request->password != null){
        $request->password = Hash::make($request->password);
            }else{
                $request->password = $user->password;
            }
            $data = $this->getData1($request);
            
            
            $user->update($data);

            return redirect()->route('seller.seller.index')
                ->with('success_message', 'User was successfully updated.');
        } catch (Exception $exception) {
        	dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('seller.seller.index')
                ->with('success_message', 'User was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
                'name' => 'required|string|min:1|max:255',
            'user_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            'password' => 'required|string|min:1|max:255',
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

        ];
        
        $data = $request->validate($rules);
$data['password'] = bcrypt($data['password']);

        $data['type'] =  'seller';
       $data['campany_id'] = Auth::user()->id;
 if ($request->hasFile('photo')) {
             $path = Storage::disk('images')->put('slider', $request->file('photo'));
    // Save thumb
            
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = $path;
        }

        return $data;
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
        ];
        
        $data = $request->validate($rules);
    $data['campany_id'] = Auth::user()->id;
 if ($request->hasFile('photo')) {
             $path = Storage::disk('images')->put('user_photo', $request->file('photo'));
    // Save thumb
            
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = $path;
        }

        return $data;
    }




     public function updateprofile($id, Request $request)
    {


        try {
            $user = User::findOrFail($id);
            if($request->password != null){
        $request->password = Hash::make($request->password);
            }else{
                $request->password = $user->password;
            }
            $data = $this->getData1($request);
            
     
            $user->update($data);

            return redirect()->route('profile')
                ->with('success_message', 'تم تحديث الملف الشخصي بنجاح.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }


}
