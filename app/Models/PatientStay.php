<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientStay extends Model
{
    use HasFactory;

    protected $table = 'patient_stays';

    protected $guarded = []; // Use an empty array to allow mass assignment for all attributes

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
