<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectModel extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey= 'id';
    public $timestamps = false;

    //modelo, clave foranea y clave de referencia

    public function area(){
        return $this->belongsTo('App\AreaModel', 'idAreaPoa', 'idarea');
    }

    public function indicadores(){
        return $this->hasMany('App\IndicadoresModel', 'idProyecto');
    }
    public function indicadoress(){
        return $this->hasMany('App\IndicadoresModel', 'idProyecto','id');
    }

}
