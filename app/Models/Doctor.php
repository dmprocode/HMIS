<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'doctors';

    /**
     * Mass assignable fields.
     */
    protected $fillable = [
        'uuid',
        'userImage',
        'user_id',
        'highest_education',
        'medical_school',
        'specialization_training',
        'license_number',
        'license_status',
        'department',
        'position',
        'primary_specialization',
        'specialist_field',
        'clinical_focus',
        'employment_type',
        'joined_date',
        'consultation_fee',
        'working_hours',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'joined_date'      => 'date',
        'consultation_fee' => 'decimal:2',
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
        'deleted_at'       => 'datetime',
    ];

    /**
     * Auto-generate UUID on create.
     */
    protected static function booted(): void
    {
        static::creating(function ($doctor) {
            if (empty($doctor->uuid)) {
                $doctor->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Route binding uses UUID.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    // ─────────────────────────────────────────
    // RELATIONSHIPS
    // ─────────────────────────────────────────

    /**
     * The admin account linked to this doctor record.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    
   
    
    

  
    
    /**
     * Consultation fee formatted with currency.
     */
    public function getConsultationFeeFormattedAttribute(): string
    {
        return 'TZS ' . number_format($this->consultation_fee, 0);
    }
}