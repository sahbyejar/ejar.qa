<?php

namespace App\Http\Controllers\company;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Twilio\Rest\Client ;
use Response;
use Laravel\Passport\Client as Clientd;
use Crypt;
class loginController extends Controller
{

   use IssueTokenTrait;

  private $client;

  public function __construct(){
    $this->client = Clientd::find(2);
  }

   

    

    public function validateclient(Request $request)
  {
    //dd(Input::get('phone_num'));
    $phoneNum = $request->phone;



    $user = User::where('phone', '=', $phoneNum)->first();
    $user1 = User::where('phone', '=', substr($phoneNum, 4))->first();
 if($user){
   
     $code = mt_rand(1000, 9999);
if($user->id == 118){
   return Response::json(array('success' => true, 'id' => $user->id,'type' => $user->type));
}
 


  $sid = 'ACece67303cc6c42c833ba79ef2a9dec43';
$token = '9e018ce8da618f2bc35f0243d4755ec4';
$cliente = new Client($sid, $token);


$cliente->messages->create(
    // the number you'd like to send the message to
     $phoneNum,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' =>  '+18312736732',
        // the body of the text message you'd like to send
        'body' => 'Hello dear customer, Your Ejar access code is: '.$code .'    مرحبا عزيزي المستخدم ' .'رقم التفعيل في تطبيق ايجار هو : ' .$code
    )
);


  $user->phone_code = $code;
 // $user->password = bcrypt($code);
     $user->save();

     
     //$client->passwo = $client->password;
      return Response::json(array('success' => true, 'id' => $user->id,'type' => $user->type));
  }elseif($user1){
   
     $code = mt_rand(1000, 9999);

 


  $sid = 'ACece67303cc6c42c833ba79ef2a9dec43';
$token = '9e018ce8da618f2bc35f0243d4755ec4';
$cliente = new Client($sid, $token);


$cliente->messages->create(
    // the number you'd like to send the message to
     $phoneNum,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' =>  '+18312736732',
        // the body of the text message you'd like to send
        'body' => 'Hello dear customer, Your Ejar access code is: '.$code .'    مرحبا عزيزي المستخدم ' .'رقم التفعيل في تطبيق ايجار هو : ' .$code
    )
);


  $user1->phone_code = $code;
  //$user->password = bcrypt($code);
     $user1->save();

     
     //$client->passwo = $client->password;
      return Response::json(array('success' => true, 'id' => $user1->id,'type' => $user1->type));
  }else{
          return Response::json(array('success' => false, 'id' => null,'type' => null));

  }
  }


protected function validateLogin(Request $request)
{
    $request->validate([
        $this->username() => 'required|string'
    ]);
}

protected function credentials(Request $request)
{
    $params = [
        'password' => '12345678',
    ];
    $request->request->add($params);
    return $request->only($this->username(), 'password');
}

public function username()
{
    return 'phone';
}


 public function login(Request $request){

         $request->type = 'client-api';
   $clientse = User::where('id', '=', $request->id)->firstOrFail();
   //dd($clientse);
  
//return response()->json($accessToken);



   $request->request->add(['username' => $clientse->email]);
 $request->request->add(['password' =>$request->code]);


if($request->code == $clientse->phone_code){
 $accessToken = $clientse->createToken('access_token')->accessToken;

$response['token_type'] =  "Bearer";
$response['expires_in'] = 31536000;
$response['access_token'] = $accessToken;
$response['refresh_token'] = $accessToken;
    
        return response()->json($response);

}else{
   return Response::json(array('success' => false, 'error' => 'code incorecte'));
} 


    }


   public function clientauth(Request $request)
{


    $request->type = 'client-api';
    $clientse = User::where('id', '=', $request->id)->firstOrFail();


   $request->password = 'password';
   $request->request->add(['username' => $clientse->email]);
   $request->request->add(['password' =>$request->code]);
//   //dd(Hash::check($clientse->password));
// //return $request;
  
if($request->code == $clientse->phone_code){
 

      $length = 100;
            $token = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
            return response(['user' => $clientse, 'access_token' => $token]);

}else{
   return Response::json(array('success' => false, 'error' => 'code incorecte'));
} 
}



 
  

}
