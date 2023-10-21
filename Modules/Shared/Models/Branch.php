<?php

namespace Modules\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UnitManager\Models\Region;
use Modules\WorkflowEngine\Models\Staff;

/**
 * @OA\Schema(
 *      schema="Branch",
 *      required={"branch_name","branch_region","branch_code","highest_rank","staff_strength","managing_id","branch_email","branch_phone","branch_address"},
 *      @OA\Property(
 *          property="branch_name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_region",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="branch_code",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="last_ecsnumber",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="highest_rank",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="staff_strength",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="managing_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="branch_email",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_phone",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_address",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */ class Branch extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'branches';

    public $fillable = [
        'branch_name',
        'branch_region',
        'branch_code',
        'last_ecsnumber',
        'highest_rank',
        'staff_strength',
        'managing_id',
        'branch_email',
        'branch_phone',
        'branch_address',
        'region_id'
    ];

    protected $casts = [
        'branch_name' => 'string',
        'region_id' => 'integer',
        'branch_code' => 'string',
        'last_ecsnumber' => 'string',
        'highest_rank' => 'integer',
        //'staff_strength' => 'integer',
        'managing_id' => 'integer',
        'branch_email' => 'string',
        'branch_phone' => 'string',
        'branch_address' => 'string'
    ];

    public static array $rules = [
        'branch_name' => 'required|unique:branches,branch_name',
        'region_id' => 'required',
        'branch_code' => 'required|unique:branches,branch_code',
        'highest_rank' => 'required',
       // 'staff_strength' => 'required',
        'managing_id' => 'required',
        'branch_email' => 'required|unique:branches,branch_email',
        'branch_phone' => 'required|unique:branches,branch_phone',
        'branch_address' => 'required'
    ];

    public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'managing_id', 'id');
    }

    // public function region(): \Illuminate\Database\Eloquent\Relations\hasOne
    // {
    //     return $this->hasOne(\Modules\UnitManager\Models\Region::class, 'id', 'region_id');
    // }

    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
