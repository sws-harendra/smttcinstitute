<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforeAfterRepair extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'before_image',
        'after_image',
        'before_label',
        'after_label',
        'fault_description',
        'repair_solution',
        'tools_used',
        'likes_count',
        'order_num'
    ];
}
