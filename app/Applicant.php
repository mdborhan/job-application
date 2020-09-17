<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'name','last_name', 'email', 'password',
    ];


}
