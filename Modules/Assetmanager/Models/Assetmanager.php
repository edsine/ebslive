<?php

namespace Modules\Assetmanager\Models;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Assetmanager\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\Models\Department;

class Assetmanager extends Model
{
    use HasFactory;

    protected $fillable = [
        'supply_id',
        'assettype_id',
        'brand_id',
        'assettag',
        'name',
        'serial',
        'quantity',
        'cost',
        'warranty',
        'status',
        'picture',
        'description',
        'branch_id',
        'user_id',
        'department_id'

    ];


    public function supply(){
        return $this->belongsTo(Supply::class,'supply_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function assettype(){
        return $this->belongsTo(Assettype::class,'assettype_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function getStatusAttribute($value)
    {
        return [
        '1' => trans('readytodeploy'),
        '2' => trans('pending'),
        '3' => trans('archived'),
        '4' => trans('broken'),
        '5' => trans('lost'),
        '6' => trans('outofrepair')
        ][$value];
    }


    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Assetmanager\Database\factories\AssetmanagerFactory::new();
    // }
}
