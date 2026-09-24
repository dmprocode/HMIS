<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departments';

    protected $fillable = [
        'uuid',
        'name',
        'code',
        'desc',
        'location',
        'status',
        'user_id',
    ];
    protected $casts = [
        'status'     => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    
    protected $hidden = [
        'id',        
    ];

    /**
     * Auto-generate UUID when creating a department.
     */
    protected static function booted(): void
    {
        static::creating(function ($department) {
            if (empty($department->uuid)) {
                $department->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Use UUID for route model binding.
     * URL: /admin/departments/{uuid}
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    
    public function depetmeants()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    
    public function admins()
    {
        return $this->hasMany(Admin::class, 'department_id');
    }

    /**
     * Only doctors in this department.
     */
    public function doctors()
    {
        return $this->hasMany(Admin::class, 'department_id')
                    ->where('userrole', 'doctor');
    }

   
    public function nurses()
    {
        return $this->hasMany(Admin::class, 'department_id')
                    ->where('userrole', 'nurse');
    }

    
    public function receptionists()
    {
        return $this->hasMany(Admin::class, 'department_id')
                    ->where('userrole', 'receptionist');
    }
}