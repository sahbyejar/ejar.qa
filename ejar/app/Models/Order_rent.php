<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_rent extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_rents';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Produit',
                  'User',
                  'price',
                  'datestart',
                  'dateend',
                  'user_id',
                  'cautionnement',
                  'total'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User','User');
    }



}
