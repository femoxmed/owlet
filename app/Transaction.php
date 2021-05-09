<?php

namespace App;

use App\TransactionType;
use App\Subscription;
use App\Alumni;
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

    public function alumni() {
        return $this->belongsTo(Alumni::class);
    }
    // public function transactionType() {
    //     return $this->belongsTo(TransactionType::class);
    // }
}
