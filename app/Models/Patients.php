<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Patients extends Model   
{
    use SoftDeletes;
    protected $table = 'patients';


    protected $fillable = [
        'uuid', 'patient_number', 'first_name', 'last_name',
        'date_of_birth', 'gender', 'phone', 'address',
        'blood_group', 'allergies', 'next_of_kin_phone',
        'status', 'registered_by',
    ];

    protected static function booted(): void
    {
        static::creating(function ($patient) {
            // Auto UUID
            $patient->uuid = $patient->uuid ?? (string) Str::uuid();

            // Auto patient number: PT-2026-00001
            if (empty($patient->patient_number)) {
                $year = date('Y');
                $count = static::whereYear('created_at', $year)->count() + 1;
                $patient->patient_number = 'PT-' . $year . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function registeredBy()
    {
        return $this->belongsTo(Admin::class, 'registered_by');
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }
}