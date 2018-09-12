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
}
