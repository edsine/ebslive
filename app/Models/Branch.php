<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Assetmanager\Models\Assetmanager;

class Branch extends Model
{
    protected $table = 'branches';

    public function staff()
    {
        return $this->hasMany(Staffs::class, 'branch_id');
    }

    public function assetmanager(){
        return $this->hasMany(Assetmanager::class,'branch_id');
    }
}
