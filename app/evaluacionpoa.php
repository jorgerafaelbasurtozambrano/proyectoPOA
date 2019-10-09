<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluacionpoa extends Model
{
    protected $table='evaluacion_poa';
    protected $primaryKey='id';
    public $timestamps=false;

    public function evaluacionpoas()
    {
      return $this->belongsto('App\evaluacionpoa','id_poa','id');
    }
}
