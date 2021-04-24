<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements Auditable, HasMedia
{
    use \OwenIt\Auditing\Auditable, InteractsWithMedia;
    public function adverts()
    {
        return $this->belongsToMany(Advert::class);
    }

    public function brand_models()
    {
        return $this->hasMany(BrandModel::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
        ->singleFile();

    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10)
              ->performOnCollections('logo');

    }
}
