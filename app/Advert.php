<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Laravel\Scout\Searchable;
use App\Adress;

class Advert extends Model implements Auditable, HasMedia
{
    use \OwenIt\Auditing\Auditable, InteractsWithMedia;
    // protected $fillable = ['title', 'description'];

      public $guarded = [];
      public $hidden = ['media'];
      public $appends = ['images', 'dealer_name', 'agent_name'];

      protected $casts = [
        // 'email_verified_at' => 'datetime',
        'featured' => 'datetime',
        'verified_at' => 'datetime',
        'expiry_date' => 'datetime',
        'approved_at' => 'datetime'

    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->onlyKeepLatest(4)
            ->withResponsiveImages();
    }

    public function getDealerNameAttribute()  {

       if($this->dealer && $this->dealer->user) {
        return $this->dealer->user->first_name . ' ' . $this->dealer->user->last_name;

       }

    }
    

    public function getAgentNameAttribute()  {

        if( $this->agent) {
            return $this->agent->user->first_name . ' ' . $this->agent->user->last_name;
        }
       
 
     }

    //  public function getAddressAttribute()  {

      
    //         return $this->address();
        
       
 
    //  }



    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function brandmodel()
    {
        return $this->belongsTo(BrandModel::class);
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function images()
    // {
    //     return $this->morphMany('App\Image', 'imageable');
    // }

    public function getImagesAttribute()  {

        $data = [];
        $images =  $this->getMedia('images');
       if (null != $images->first()) {
       foreach ($images as $key => $value) {
        // $data[] = $value->getUrl();
       array_push($data, $value->getUrl());
       }
      
       }
       return $data;
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    // public function address()
    // {
    //     return $this->hasOne(Address::class);
    // }
}
