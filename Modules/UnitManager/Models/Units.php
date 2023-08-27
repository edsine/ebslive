<?php

namespace Modules\UnitManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

 class Units extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'units';

    public $fillable = [
        'unit_name',
        'department_id'
    ];

    protected $casts = [
        'unit_name' => 'string',
        'department_id' => 'integer'
    ];

    public static array $rules = [
        'unit_name' => 'required',
        'department_id' => 'required'
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\Modules\Shared\Models\Department::class, 'id', 'department_id');
    }
    public function department1(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Department::class, 'department_id', 'id');
    }

    public function unit_head(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\Modules\UnitManager\Models\UnitHead::class, 'id', 'unit_head_id');
    }
}
