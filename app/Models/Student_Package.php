<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Package extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'principle_type',
        'date',
        'class_time',
        'days',
        'time',
        'price',
    ];
}
