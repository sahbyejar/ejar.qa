<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'priorities';

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
                  'type',
                  'date_start',
                  'date_end',
                  'user_id',
                  'numbre'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
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
     * Set the date_start.
     *
     * @param  string  $value
     * @return void
     */
    // public function setDateStartAttribute($value)
    // {
    //     $this->attributes['date_start'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    /**
     * Set the date_end.
     *
     * @param  string  $value
     * @return void
     */
    // public function setDateEndAttribute($value)
    // {
    //     $this->attributes['date_end'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }


}
