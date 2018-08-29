<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'login','password','title','lastname','firstname','gender','email','picture','address'
    ];
}
