<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificacionModel extends Model
{
    protected $table='notificacion';
    protected $primaryKey='id';
    public $timestamps=false;
}
