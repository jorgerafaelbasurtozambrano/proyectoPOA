<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaModel extends Model
{
    protected $table='meta';
    protected $primaryKey='idmetas';
    public $timestamps=false;

    public function metass(){
        return $this->hasMany('App\IndicadoresModel','id', 'id_indicador');
    }
    public function indicadores()
    {
      return $this->belongsTo('App\IndicadoresModel','id_indicador','id');
    }
}
