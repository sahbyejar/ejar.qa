<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Carbon\Carbon;
use App\Models\Produit;
use App\Models\Vip;

use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    

 use HasApiTokens;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'user_name',
                  'email',
                  'email_verified_at',
                  'password',
                  'phone',
                  'photo',
                  'rating',
                  'siteweb',
                  'facebook',
                  'instagram',
                  'youtube',
                  'twitter',
                  'whats',
                  'longitude',
                  'latitude',
                  'type',
                  'ville_id',
                  'city_id',
                  'remember_token',
                  'phone_code',
                  'campany_id',
                  'CommercialRecord'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
  
    /**
     * Get the ville for this model.
     *
     * @return App\Models\Ville
     */
    public function ville()
    {
        return $this->belongsTo('App\Models\Ville','ville_id');
    }
/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get the city for this model.
     *
     * @return App\Models\City
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function Produit()
    {
        return $this->hasMany('App\Models\Produit');
    }
 public function countries()
    {
        return $this->hasOne('App\Models\countries');
    }

 

public function favorite()
    {
        return $this->hasMany('App\Models\favorite');
    }


    public function notification()
    {
        return $this->hasMany('App\Models\notification');
    }


    public function campanyproduit(){
      
      $campany = User::find( Auth()->user()->campany_id);
     
      if($campany->type = 'campany1' && count($campany->Produit) < 10){
        return true;
      }elseif($campany->type = 'campany5' && count($campany->Produit) < 15){
        return true;
      }elseif($campany->type = 'campany2' && count($campany->Produit) < 25){
        return true;
      }elseif($campany->type = 'campany3' && count($campany->Produit) < 40){
        return true;
      }elseif($campany->type = 'campany4' && count($campany->Produit) < 60){
        return true;
      }elseif($campany->type = 'campany7' && count($campany->Produit) < 100){
        return true;
      }elseif($campany->type = 'campany8' && count($campany->Produit) < 200){
        return true;
      }elseif($campany->type = 'campany9' && count($campany->Produit) < 300){
        return true;
      }elseif($campany->type = 'campany6'){
        return true;
      }else{return false;}
    }


    public function campanyproduitSaller(){
      
      $campany = User::find( Auth()->user()->campany_id);
   
      if($campany->type = 'campany1'  ){
        return count($campany->Produit). trans('general.produite') .'/10';
      }elseif($campany->type = 'campany5' ){
        return count($campany->Produit). trans('general.produite') .'/15';
      }elseif($campany->type = 'campany2'  ){
        return count($campany->Produit). trans('general.produite') .'/25';
      }elseif($campany->type = 'campany3'  ){
        return count($campany->Produit). trans('general.produite') .'/40';
      }elseif($campany->type = 'campany4'  ){
        return count($campany->Produit). trans('general.produite') .'/60';
      }elseif($campany->type = 'campany7'  ){
        return count($campany->Produit). trans('general.produite') .'/100';
      }elseif($campany->type = 'campany8'  ){
        return count($campany->Produit). trans('general.produite') .'/200';
      }elseif($campany->type = 'campany9'){
        return count($campany->Produit). trans('general.produite') .'/300';
      }elseif($campany->type = 'campany6'){
        return "غير محدود";
      }else{return false;}
    }


   

public function priorities(){
        $vip1 = false;
        $vip2 = false;
        $premier = false;
        $numbervip1 = 0;
        $numbervip2 = 0;
        $numberpremier = 0;
$date = new Carbon;

        
        $priorities = \App\Models\Priority::where('user_id',Auth()->id())->whereDate('date_start','<=',Carbon::parse(Carbon::now()))->whereDate('date_end','>=',Carbon::parse(Carbon::now()))->get();
        
foreach (Auth()->user()->Produit as $value) {
  $vip1 = Vip::where('Produit_id',$value->id)->where('vip',1)->first();
  if($vip1){
  if($date < $vip1->dateend)
{
$numbervip1 =  $numbervip1 +1;
}
}
$vip2 = Vip::where('Produit_id',$value->id)->where('vip',2)->first();
  if($vip2){
  if($date < $vip2->dateend)
{
$numbervip2 =  $numbervip2 +1;
}
}
$vip3 = Vip::where('Produit_id',$value->id)->where('vip',3)->first();
  if($vip3){
  if($date < $vip3->dateend)
{
$numberpremier =  $numberpremier +1;
}
}
}




        if($priorities){
        foreach($priorities as $prioritie)
          {
            if($prioritie->type == 'Vip1' && $numbervip1 < $prioritie->numbre)
            {
              $vip1 = true;
             }elseif($prioritie->type == 'Vip2' && $numbervip2 < $prioritie->numbre)
             {
              $vip2 = true;
             }elseif($prioritie->type == 'Premier' && $numberpremier < $prioritie->numbre)
             {
              $premier = true;
             }
                  }
      }


        return array('vip1' => $vip1, 'vip2' => $vip2,'premier' => $premier);
}



}
