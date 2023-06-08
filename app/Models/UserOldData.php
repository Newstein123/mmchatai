<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOldData extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "user_old_data";

    function user()
    {
        return $this->hasOne(Customer::class, 'id', 'user_id');
    }
}
