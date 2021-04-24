<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Comment extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public $guarded = [];

    public function commentable()
        {
            return $this->morphTo();
        }
}
