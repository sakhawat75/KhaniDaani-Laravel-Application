<?php

namespace App;

use Carbon\Carbon;
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

    public function isBetweenTime()
    {
        $start = Carbon::parse($this->service_hours_start);
        $end = Carbon::parse($this->service_hours_end);

        $now = Carbon::now();

        if($start->lt($end)) {
            if($now->between($start, $end)) {
                return true;
            } else {
                return false;
            }
        }
        if($start->gt($end)) {
            if($now->gt($start) || ($now->lt($start) && $now->lt($end) ) ) {
                return true;
            }
        }
        return false;
    }

}
