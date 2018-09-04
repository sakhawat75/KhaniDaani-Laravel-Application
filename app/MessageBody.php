<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageBody extends Model
{
    //
    protected $table = "messages_body";
    protected $fillable = ['message_id', 'sender_id', 'body', 'read_at'];
}
