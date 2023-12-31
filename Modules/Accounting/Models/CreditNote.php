<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    protected $fillable = [
        'invoice',
        'customer',
        'amount',
        'date',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\User', 'customer_id', 'customer');
    }
}
