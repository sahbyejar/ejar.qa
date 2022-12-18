<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit_photo extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produit_photos';

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
                  'produit_id',
                  'photo'
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
     * Get the produit for this model.
     *
     * @return App\Models\Produit
     */
    public function produit()
    {
        return $this->belongsTo('App\Models\Produit','produit_id');
    }



}
