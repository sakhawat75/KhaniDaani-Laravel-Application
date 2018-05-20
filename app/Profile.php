<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'fullname', 'dob', 'mobile_no', 'description'];
}
