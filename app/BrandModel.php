<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class BrandModel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $casts = [
      'expiry_date' => 'date'
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
