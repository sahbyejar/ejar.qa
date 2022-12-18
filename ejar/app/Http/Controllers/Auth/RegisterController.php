<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
 protected function redirectTo()
    {
         if ( Auth::user()->type == 'user' ) {
          
             return '/';
                }else{
               
                   return '/home'; 
                }
               
       
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'photo' =>['required'],
            'phone' =>['required'],
            'user_name' =>['required'],
            'Whatsapp' =>['required'],
            'city_id' =>['required'],
            'ville_id' =>['required'],
            'siteweb' =>['required'],
            'facebook' =>['required'],
            'instagram' =>['required'],
            'youtube' =>['required'],
            'twitter' =>['required'],   
                 ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         $path = Storage::disk('images')->put('avatar', $data['photo']);

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' =>$data['phone'],
            'user_name' => $data['user_name'],
            'Whatsapp' => $data['Whatsapp'],
            'city_id' => $data['city_id'],
            'ville_id' => $data['ville_id'],
            'siteweb' => $data['siteweb'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
            'youtube' => $data['youtube'],
            'twitter' => $data['twitter'],
            'photo' => $path,
            'type' => 'user',
        ]);

        return $user;
    }
}
