<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Agent extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * Get the agent user.
     */

    public $appends = ['name' , 'avatar'];
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'featured' => 'datetime',
        'verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function getNameAttribute()  {

        if($this->user) {
            return $this->user->first_name . ' ' . $this->user->last_name;
        }
       
 
     }

     public function getAvatarAttribute()  {

        if($this->user) {
            return $this->user->avatar;
        }
       
 
     }
     
 
     public function getAgentNameAttribute()  {
 
         if( $this->agent) {
             return $this->agent->user->first_name . ' ' . $this->agent->user->last_name;
         }
        
  
      }


    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');
    }
}
