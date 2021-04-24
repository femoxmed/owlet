<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Dealer extends Model implements Auditable, HasMedia
{
    use \OwenIt\Auditing\Auditable, InteractsWithMedia;
    /**
     * Get the dealer user.
     */



    public $appends = ['name', 'avatar'];
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'featured' => 'datetime',
        'verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pictures')
        ->singleFile();
        // ->useFallbackUrl('/images/anonymous-user.jpg')
        // ->useFallbackPath(public_path('/images/anonymous-user.jpg'));

    }

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
   
   

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }



    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }
}
