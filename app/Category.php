<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public $appends = ['count']; 

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }


    public function getCountAttribute()
    {
        return $this->adverts->count();
    }
}
