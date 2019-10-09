<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreadesModel extends Model
{
    protected $table = 'datoarea';
    protected $primaryKey= 'iddatoarea';
    public $timestamps = false;
    public function proyectos()
    {
      return $this->hasMany('App\ProyectModel','idAreaPoa','iddatoarea');
    }
}
