<?php

namespace Modules\ClaimsCompensation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Claimstype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    public function claims()
    {
        return $this->hasOne(claimstype::class);
    }
    // protected static function newFactory()
    // {
    //     return \Modules\ClaimsCompensation\Database\factories\ClaimstypeFactory::new();
    // }
}
