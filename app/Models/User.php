<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\HumanResource\Models\Ranking;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Notifications\Notification;
use Modules\UnitManager\Models\UnitHead;
use Modules\DTARequests\Notifications\UnitHeadNotification;
use Modules\ClaimsCompensation\Models\DeathClaim;
use Modules\EmployerManager\Models\Employer;


class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, AuditingAuditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'status',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'integer',
    ];

    public function getFullName()
    {
        $user = $this;

        $full_name = "$user->first_name $user->last_name";
        if ($user->middle_name) {
            $full_name = "$user->first_name $user->middle_name $user->last_name";
            return $full_name;
        }
        return $full_name;
    }

    /* public function staff(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Staff::class);
    } */

    // public function ranking()
    // {
    //     return $this->belongsTo(Ranking::class, 'ranking_id', 'id');
    // }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function signature()
    {
        return $this->hasOne(Signature::class);
    }
    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function unitHead()
    {
        return $this->hasOne(UnitHead::class);
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->email;
    }

    public function sendUnitHeadNotification()
    {
        $this->notify(new UnitHeadNotification());
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function death_claims()
    {
        return $this->hasMany(DeathClaim::class);
    }
}
