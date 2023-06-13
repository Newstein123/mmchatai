<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    const APPROVED  = 1;
    const REJECTED  = 2;
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'status'
    ];

    


}
