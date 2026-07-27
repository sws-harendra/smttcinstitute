<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'regd_no',
        'sl_no',
        'name',
        'father_name',
        'dob',
        'course',
        'from_date',
        'to_date',
        'center',
        'location',
        'issued_date',
    ];

    protected $casts = [
        'dob' => 'date',
        'from_date' => 'date',
        'to_date' => 'date',
        'issued_date' => 'date',
    ];
}
