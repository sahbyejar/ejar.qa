<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'villes';

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
                  'ville',
                  'name_ar',
                  'city_id'
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
    
    /**
     * Get the city for this model.
     *
     * @return App\Models\City
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }



}
