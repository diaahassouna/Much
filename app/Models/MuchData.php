<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuchData extends Model
{
    use HasFactory;
    public $fillable = [
        'item_price',
        'salary',
        'standard_hours',
        'standard_days',
        'netflix_fee'
    ];
}