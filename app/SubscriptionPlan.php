<?php

namespace App;

use App\Subscription;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SubscriptionPlan extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['plan_code' , 'interval' , 'amount', 'status' , 'name' , 'description'];

    public function subscriptions() {
        return $this->hasMany(Subscription::class);
    }
}
