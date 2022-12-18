<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\StatusLiked;
use  App\Models\notification;
use  App\Models\User;
use Carbon\Carbon;
use Response;
use Auth;
class notificationController extends Controller
{
    //

    public function index(Request $request){
        $notifications = notification::Where('user_id',$request->id)->orWhere('user_id',null)->get();
        foreach ($notifications as $key => $value) {
        	$value->data = json_decode($value->data);
        }

                 $notifications = $notifications->sortByDesc('updated_at')->values()->all();
         return response()->json($notifications);
    }
}
