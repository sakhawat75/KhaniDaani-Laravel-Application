<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickersPoint extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile() {
        return $this->belongsTo( Profile::class, 'user_id', 'user_id');
    }
}
