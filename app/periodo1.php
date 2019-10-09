<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periodo1 extends Model
{
  protected $table='periodo_poa';
  protected $primaryKey='id';
  public $timestamps=false;

  public function evaluacionpoas()
  {
    return $this->hasMany('App\evaluacionpoa','id_poa','id');
  }
  public function evaluaciones()
  {
    return $this->hasMany('App\evaluacionpoa','id_poa','id');
  }
  public function proyectoss()
  {
    return $this->hasMany('App\ProyectModel','idperiodo','id');
  }
}
