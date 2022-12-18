<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Api\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\Settings;
use DB;
class UsersController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('ville','city')->get();

     
        foreach ($users as $key => $value) {
            $value->photo = 'ejar/public/images/'.$value->photo;
        }

        return response()->json($users);
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->name);
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);
            
            $user = User::create($data);

            $users = User::Where('email',$request->email)->first();
             $users->photo = 'ejar/public/images/'.$user->photo;
  return Response::json(array('success' => true,'user'=>$users->id, 'error' => null));

        } catch (Exception $exception) {
            return Response::json(array('success' => false,'user'=>null , 'error' => $exception->errorInfo));
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('ville','city')->findOrFail($id);
         $user->photo = 'ejar/public/images/'.$user->photo;
         $user->phone = intval($user->phone);
         $user->whats = intval($user->whats);


        return response()->json($user);
    }

      public function Settings()
    {
        
      $Settings = Settings::take(1)->get();
        return response()->json($Settings);
    }

    /**
     * Update the specified user in the storage.
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
            
            $user = User::findOrFail($id);
            $user->update($data);

            return $this->successResponse(
			    'User was successfully updated.',
			    $this->transform($user)
			);
        } catch (Exception $exception) {
            return $this->errorResponse('Unexpected error occurred while trying to process your request.');
        }
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return $this->successResponse(
			    'User was successfully deleted.',
			    $this->transform($user)
			);
        } catch (Exception $exception) {
            return $this->errorResponse('Unexpected error occurred while trying to process your request.');
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
            'name' => 'required|string|min:1|max:255',
            'user_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            'password' => 'required|string|min:1|max:255',
            'phone' => 'nullable|string|min:0|max:255',
            'photo' => ['file','nullable'],
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
            'remember_token' => 'nullable|string|min:0|max:100',
            'phone_code' => 'nullable|string|min:0|max:255', 
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
                'name' => 'required|string|min:1|max:255',
            'user_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            
            'password' => 'required|string|min:1|max:255',
            'phone' => 'nullable|string|min:0|max:255',
            'photo' => ['file','nullable'],
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
            'remember_token' => 'nullable|string|min:0|max:100',
            'phone_code' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);
         if ($request->hasFile('photo')) {
             $path = Storage::disk('images')->put('user_photo', $request->file('photo'));
    // Save thumb
            
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = $path;
        }
        $data['type']= 'user';
        $data['password'] = bcrypt($request->password);


        return $data;
    }

    /**
     * Transform the giving user to public friendly array
     *
     * @param App\Models\User $user
     *
     * @return array
     */
    protected function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'user_name' => $user->user_name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'password' => $user->password,
            'phone' => $user->phone,
            'photo' => $user->photo,
            'rating' => $user->rating,
            'siteweb' => $user->siteweb,
            'facebook' => $user->facebook,
            'instagram' => $user->instagram,
            'youtube' => $user->youtube,
            'twitter' => $user->twitter,
            'whats' => $user->whats,
            'type' => $user->type,
            'ville_id' => optional($user->ville)->created_at,
            'city_id' => optional($user->city)->name,
            'remember_token' => $user->remember_token,
            'phone_code' => $user->phone_code,
        ];
    }



    public function produituser(Request $request){
       
        try{
             $user = User::find( $request->id);
$countries = DB::table('countries')->where('id',$user->city->countre_id)->first();
    $data['dispo']= $countries->produit_user - count($user->Produit);
       return response()->json($data);
        } catch (Exception $exception) {

    $data['dispo']= 0;
       return response()->json($data);

        }
    
    }



}
