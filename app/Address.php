<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Address extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addressable()
    {
        return $this->morphTo();
    }

    public function addresss()
    {
        return $this->morphTo();
    }

    // public function advert()
    // {
    //     return $this->hasOne(Advert::class);
    // }

  
}
