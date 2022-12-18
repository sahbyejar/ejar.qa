<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produits';

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
                  'name_ar',
                  'name',
                  'photo',
                  'discription_ar',
                  'discription',
                  'price',
                  'phone',
                  'ville_id',
                  'city_id',
                  'longitude',
                  'latitude',
                  'instagrame',
                  'facebook',
                  'siteweb',
                  'whatsapp',
                  'rent_sale',
                  'chiket',
                  'cautionnement',
                  'price_cautionnement',
                  'espacer',
                  'interface',
                  'wifi',
                  'kahramam',
                  'route_principale',
                  'commission',
                  'vip1',
                  'vip2',
                  'parking',
                  'Piscine',
                  'gym',
                  'firstsaken',
                  'salon',
                  'toilet',
                  'room',
                  'officeoy',
                  'office',
                  'secretary',
                  'imprimerie',
                  'category_id',
                  'user_id',
                  'DELETED',
                  'delete_date',
                  'accepted',
                  'furnished',
                  'vupost',
                  'vuinsta',
                  'vufb',
                  'vuweb',
                  'clique_whatsapp',
                   'Number_of_doors',
                  'Height',
                  'On_a_paved_road',
                  'family',
                  'metro',
                  'premium'
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
   protected $casts = [
    'premium' => 'boolean'
];
    
    /**
     * Get the category for this model.
     *
     * @return App\Models\category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

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
     * Get the city for this model.
     *
     * @return App\Models\City
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

 
 

}
