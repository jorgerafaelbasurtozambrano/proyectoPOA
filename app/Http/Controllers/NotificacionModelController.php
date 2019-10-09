<?php

namespace App\Http\Controllers;

use App\NotificacionModel;
use Illuminate\Http\Request;

class NotificacionModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar_usuarios()
    {
      $usuarios=\App\Usuarios::all()->where('idtipo', '!=' , 4);
      return $usuarios;
    }

    public function buscar_comentarios($id)
    {
      $notific=\App\NotificacionModel::all()->where('id_usuario', $id);
      return $notific;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $notificacion= new \App\NotificacionModel;
      $notificacion->descripcion=$request->descripcion;
      $notificacion->id_usuario=$request->id;
      $notificacion->tiempo=$request->fecha;
      $notificacion->visto=$request->visto;
      $notificacion->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotificacionModel  $notificacionModel
     * @return \Illuminate\Http\Response
     */
    public function show(NotificacionModel $notificacionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificacionModel  $notificacionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificacionModel $notificacionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificacionModel  $notificacionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notificacion= \App\NotificacionModel::find($request->id);
        $notificacion->visto=$request->visto;
        $notificacion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificacionModel  $notificacionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificacionModel $notificacionModel)
    {
        //
    }
}
