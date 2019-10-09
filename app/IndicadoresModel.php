<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadoresModel extends Model
{
    protected $table = 'indicadores';
    protected $primaryKey= 'id';
    public $timestamps = false;

    //modelo, clave foranea y clave de referencia

    public function proyecto(){
        return $this->belongsTo('App\ProyectModel', 'idProyecto', 'id');
    }

    public function metass(){
        return $this->hasMany('App\MetaModel','id_indicador', 'id');
    }

    public function obtner_metas()
    {
      return $this->belongsTo('App\MetaModel','id','id_indicador');
    }

}
