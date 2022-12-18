<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

     protected $casts = [
        'produit' => 'array'
    ];
      protected $fillable = [
                  'produit',
                  'user_id',
                  'vip1',
                  'vip2',
                  'action'
                  
              ];


              public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
