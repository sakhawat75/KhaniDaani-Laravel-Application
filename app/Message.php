<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['sender_id', 'recipient_id'];

    /*public function user ()
    {
    	return $this->belongsTo( User::class );
    }*/

    public function mb ()
    {
    	return $this->hasMany( MessageBody::class );
    }

	public function sender ()
    {
    	return $this->belongsTo( User::class, 'sender_id' );
    }

    public function recipient ()
    {
    	return $this->belongsTo( User::class, 'recipient_id' );
    }
}
