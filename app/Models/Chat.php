<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "chat_history";

    function user_chat() {
        return $this->hasOne(UserChat::class, 'conversation_id', 'conversation_id');
    }

}
