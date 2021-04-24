<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Admin extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'phone', 'email', 'password',
    ];

    /**
     * Get the admin user.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function attachments()
    {
        return $this->morphMany('App\Attachment', 'attachable');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }
}
