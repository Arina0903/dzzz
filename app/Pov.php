<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pov extends Model
{
    public $table = "school";

    public $timestamps = false;

    protected $fillable = ['id', 'name', 'age', 'password', 'api_token'];
}
