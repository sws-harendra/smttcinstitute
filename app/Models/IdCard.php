<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_no',
        'name',
        'father_name',
        'dob',
        'course',
        'mobile_no',
        'email',
        'photo',
        'center',
        'address',
        'valid_from',
        'valid_to',
    ];

    protected $casts = [
        'dob' => 'date',
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];
}

