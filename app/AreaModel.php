<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table = 'area';
    protected $primaryKey= 'idarea';
    public $timestamps = false;

    public function proyectos(){
        return $this->hasMany(ProyectModel::class, 'idarea');
    }
}
