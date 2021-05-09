<?php

namespace App;

use App\Subscription;
use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Transaction extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    protected $guarded = [];

    public function subscription() {
        return $this->belongsTo(Subscription::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    // public function transactionType() {
    //     return $this->belongsTo(TransactionType::class);
    // }
}
