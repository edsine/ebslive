<?php

namespace Modules\Assetmanager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'city',
        'country',
        'zip',
        'phone',
        'address'
    ];


    public function assetmanager(){
        return $this->hasMany(Supply::class,'supply_id');
    }

    protected static function newFactory()
    {
        return \Modules\Assetmanager\Database\factories\SupplyFactory::new();
    }
}
