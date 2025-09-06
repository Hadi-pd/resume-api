<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name','job_title','about_me','email','phone','address',
        'avatar','twitter','facebook','instagram','github'
    ];
}
