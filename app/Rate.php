<?php

namespace App;
use App\Comment;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Rate extends Model implements Auditable
{
    protected $guarded = [];
    use \OwenIt\Auditing\Auditable;
    
    public function comment() {
        
                return $this->belongsTo(Comment::class);
            
        }


    public function rateable()
        {
            return $this->morphTo();
        }

}

