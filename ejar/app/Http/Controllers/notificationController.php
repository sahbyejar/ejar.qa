<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\StatusLiked;
use  App\Models\notification as notif;
use  App\Models\User;
use Carbon\Carbon;
use Pusher\Pusher;
use Response;
use Auth;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use NotificationChannels\PusherPushNotifications\PusherMessage;
use Illuminate\Notifications\Notification;

class notificationController extends Controller
{
     public function via($notifiable)
    {
        return [PusherChannel::class];
    }
    public function send(Request $request){
      $data['produit_id'] = $request->Produit_id ;
      $data['user_id'] = $request->user_id ;
      $data['message'] = $request->message ;
    	$post_data = json_encode($data);

      $notification = new notif();
      $notification->data = $post_data;
      $notification->vu = $request->type;
      $notification->user_id = $request->user_id;
      $notification->created_at = Carbon::now();
      
      $notification->save();



            $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
  "instanceId" => "70ef81f3-765b-41ac-8941-a9a95b90e9ee",
  "secretKey" => "77A164EC80A2039224AB424F1DA5971BCBCE652B68BC66655D067991A0FDB128",
));

$publishResponse = $beamsClient->publishToInterests(
  array("hello"),
  array("web" => array("notification" => array(
    "title" => "Ejar.qa",
    "body" => $request->message ,
    "deep_link" => "https://ejar.qa/home",
  )),
));

   
 //     $options = array(
 // 'cluster' => 'eu',
 // 'encrypted' => true
 // );
 //        $pusher = new Pusher(
 // '1348006',
 // '3485ceac492a37808e98',
 // '98e1239a8bf8c8de3cd9', 
 // $options
 // );
 
      
 //        $pusher->trigger('notify-channel', 'App\\Events\\StatusLiked', $post_data);


    return "Event has been sent!";
    }


    public function add(Request $request){
  
      $data['user_id'] = $request->user_id ;
      $data['message'] = $request->message ;
      $data['vu'] = '3';
      $post_data = json_encode($data);
    
      $notification = new notif();
      $notification->data = $post_data;
      $notification->vu = "3";
      $notification->user_id = $request->user;
      $notification->created_at = Carbon::now();
      $notification->save();
                 $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
  "instanceId" => "70ef81f3-765b-41ac-8941-a9a95b90e9ee",
  "secretKey" => "77A164EC80A2039224AB424F1DA5971BCBCE652B68BC66655D067991A0FDB128",
));

$publishResponse = $beamsClient->publishToInterests(
  array("hello"),
  array("web" => array("notification" => array(
    "title" => "Ejar.qa",
    "body" => $request->message ,
    "deep_link" => "https://ejar.qa/home",
  )),
));
    return "success";
    }

    public function vu(Request $request)
    {
    	$notification = notif::find($request->id);
    	$notification->vu = 1;
    	$notification->save();
    
    	return Response::json(array('success' => true));


    }

    public function index(){
       $notificationss = notif::where('vu','3')->with('user')->orderBy('updated_at', 'DESC')->get();
    //   dd($notificationss);
  
                // $notificationss = $notificationss->sortByDesc('id')->values()->all();
                 $users = User::where('type', '!=' ,'admin')->get();
      return view('notification.index',compact('notificationss','users'));
    }
}
