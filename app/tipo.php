<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table = 'tipo';
    protected $primaryKey= 'id';
    public $timestamps = false;
}
