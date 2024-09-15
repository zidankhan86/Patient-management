<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $guarded = []; // Use an empty array to allow mass assignment for all attributes

    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class);
    }

    public function surgeryDetails()
    {
        return $this->hasOne(SurgeryDetail::class);
    }

    public function billing()
    {
        return $this->hasOne(Billing::class);
    }
}
