<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Modules\ClaimsCompensation\Models\DeathClaim;
 use Modules\ClaimsCompensation\Models\AccidentClaim;
 use Modules\ClaimsCompensation\Models\DiseaseClaim;
/**
 * @OA\Schema(
 *      schema="Employee",
 *      required={},
 *      @OA\Property(
 *          property="id",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="employer_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="last_name",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="first_name",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="middle_name",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="date_of_birth",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="gender",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="marital_status",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="email",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="employment_date",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="address",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="local_govt_area",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="state_of_origin",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="phone_number",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="means_of_identification",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="identity_number",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="identity_issue_date",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="identity_expiry_date",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="next_of_kin",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="next_of_kin_phone",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="monthly_renumeration",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="status",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
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
 */class Employee extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'employees';

    public $fillable = [
        'employer_id',
        'last_name',
        'first_name',
        'middle_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'email',
        'employment_date',
        'address',
        'local_govt_area',
        'state_of_origin',
        'phone_number',
        'means_of_identification',
        'identity_number',
        'identity_issue_date',
        'identity_expiry_date',
        'next_of_kin',
        'next_of_kin_phone',
        'monthly_renumeration',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'employer_id' => 'integer',
        'last_name' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'date_of_birth' => 'string',
        'gender' => 'string',
        'marital_status' => 'string',
        'email' => 'string',
        'employment_date' => 'string',
        'address' => 'string',
        'local_govt_area' => 'string',
        'state_of_origin' => 'string',
        'phone_number' => 'string',
        'means_of_identification' => 'string',
        'identity_number' => 'string',
        'identity_issue_date' => 'string',
        'identity_expiry_date' => 'string',
        'next_of_kin' => 'string',
        'next_of_kin_phone' => 'string',
        'monthly_renumeration' => 'string',
        'status' => 'string'
    ];

    public static array $rules = [
        
    ];

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\EmployerManager\Models\Employer::class, 'employer_id', 'id');
    }

    public function accident_claims()
    {
        return $this->hasMany(AccidentClaim::class);
    }

    public function death_claims()
    {
        return $this->hasMany(DeathClaim::class);
    }

    public function disease_claims()
    {
        return $this->hasMany(DiseaseClaim::class);
    }
}
