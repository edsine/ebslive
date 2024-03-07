<?php

namespace Modules\Assetmanager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function assetmanager(){
        return $this->hasMany(Assetmanager::class,'location_id');
    }
    protected static function newFactory()
    {
        return \Modules\Assetmanager\Database\factories\LocationFactory::new();
    }
}
