<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "user_chat";

    function history_data()
    {
        return $this->hasMany(Chat::class, 'conversation_id', 'conversation_id');
    }

    function user()
    {
        return $this->hasOne(Customer::class, 'id', 'user_id');
    }
}
