<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $guarded = []; // Use an empty array to allow mass assignment for all attributes

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
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
        return $this->hasMany(SurgeryDetail::class);
    }

    public function billing()
    {
        return $this->hasMany(Billing::class);
    }

    public function stays()
    {
        return $this->hasMany(PatientStay::class);
    }
}
