<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\EmployerManager\Models\Certificate;
use Modules\EmployerManager\Models\Employer;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id', 'payment_type', 'rrr', 'invoice_number', 'invoice_generated_at',
        'invoice_duration', 'payment_status', 'amount', 'approval_status', 'paid_at', 'transaction_id',
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function certificate()
{
    return $this->belongsTo(Certificate::class);
}

}
