<?php

namespace App;

use App\SubscriptionPlan;
use App\Transaction;
use App\User;
use App\Alumni;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Subscription extends Model implements Auditable
{
    //

    protected $casts = [
        'expiry_date' => 'datetime',
        'created_at' => 'datetime',
       
    ];

    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    public function subscriptionPlan() {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function alumni() {
        return $this->belongsTo(Alumni::class);
    }
}
