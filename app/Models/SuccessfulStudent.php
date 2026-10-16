<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessfulStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course',
        'achievement',
        'photo',
        'batch_year',
        'order_num'
    ];
}
