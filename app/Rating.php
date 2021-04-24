<?php

namespace App;
use App\Comment;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Rating extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = [];
    
    public function comment() {
        
                return $this->belongsTo(Comment::class);
            
        }


    public function ratingable()
        {
            return $this->morphTo();
        }

}

