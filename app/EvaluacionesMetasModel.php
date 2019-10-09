<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionesMetasModel extends Model
{
    protected $table = 'meta_evaluacion';
    protected $primaryKey= 'idmeta_evaluacion';
    public $timestamps = false;
}
