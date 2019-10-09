<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function obtener_datos($id)
     {
       $dato=\App\IndicadoresModel::all()->where('id',$id);
       return $dato;
     }


     public function mostrar_indicador_nuevo()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $departamentos=\App\AreadesModel::all();
         $periodo=\App\periodo::all();
         $per=0;
         for ($i=0; $i <count($periodo) ; $i++) {
           if ($periodo[$i]->estado==1) {
             $per=$periodo[$i]->id;
           }
         }
         $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
         $mostrar_indicador=true;
         $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
         $evaluacion=\App\EvaluacionesMetasModel::all();
         $subarea=0;
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home4', compact('evaluacion','departamentos','mostrar_indicador','jsonmetass','proyectos','subarea','activado','notificaciones'));
       }else {
         return back();
       }
     }

    public function index()
    {
        $proyec=\App\ProyectModel::all();
        $crear_indicador=true;
        return view('home', compact('crear_indicador', 'proyec'));
    }
    public function extraer()
    {
      $metas=\App\IndicadoresModel::has('metass')->get();
      return Response()->json($metas);
    }
    public function mostrar_indicador()
    {
      $departamentos=\App\AreadesModel::all();
      $periodo=\App\periodo::all();
      $per=0;
      for ($i=0; $i <count($periodo) ; $i++) {
        if ($periodo[$i]->estado==1) {
          $per=$periodo[$i]->id;
        }
      }
      $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
      $mostrar_indicador=true;
      $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
      $evaluacion=\App\EvaluacionesMetasModel::all();
      $subarea=0;
      return view('adminlte::home1', compact('evaluacion','departamentos','mostrar_indicador','jsonmetass','proyectos','subarea'));
    }
    public function mostrar_indicador2()
    {
      $departamentos=\App\AreadesModel::all();
      $periodo=\App\periodo::all();
      $per=0;
      for ($i=0; $i <count($periodo) ; $i++) {
        if ($periodo[$i]->estado==1) {
          $per=$periodo[$i]->id;
        }
      }
      $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
      $mostrar_indicador2=true;
      $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
      $evaluacion=\App\EvaluacionesMetasModel::all();
      $subarea=1;
      return view('adminlte::home2', compact('evaluacion','departamentos','mostrar_indicador2','jsonmetass','proyectos','subarea'));
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

    public function obtener(){
        $indicadoress=\App\ProyectModel::has('indicadoress')->get(); //inner join
      return Response()->json($indicadoress);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $IndicadoresModel= new \App\IndicadoresModel;
        $IndicadoresModel->descripcion=$request->descripcion;
        $IndicadoresModel->idProyecto=$request->id_proyectos;
        $IndicadoresModel->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indic= \App\IndicadoresModel::find($id);
        $edit_indicador=true;
        return view('adminlte::home1',compact('indic', 'id', 'edit_indicador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $IndicadoresModel= \App\IndicadoresModel::find($request->id);
        $IndicadoresModel->descripcion=$request->descripcion;
        $IndicadoresModel->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $IndicadoresModel= \App\IndicadoresModel::find($id);
        $IndicadoresModel->delete();

    }
}
