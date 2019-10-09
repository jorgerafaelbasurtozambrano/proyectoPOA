<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MetaModel;
use App\periodo;
use App\evaluacionpoa;
use DB;
use Illuminate\Support\Facades\Auth;
class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function mostrar_tabla()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $subarea=0;
         $periodo=\App\periodo::all();
         $per=0;
         for ($i=0; $i <count($periodo) ; $i++) {
           if ($periodo[$i]->estado==1) {
             $per=$periodo[$i]->id;
           }
         }
         $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
         $consulta_metas=DB::select("call consultar_metas()");
         $metas=DB::select("call buscar_meta_activas()");
         $mostrar_metas=true;
         $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
         $jsonmetas=json_encode($jsonmetass);
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home4', compact('mostrar_metas','metas','jsonmetass','proyectos','subarea','activado','notificaciones'));
       }else {
         return back();
       }
     }

     public function obtener_meta($id_meta)
     {
       $metas=MetaModel::all()->where('idmetas',$id_meta);
       return Response()->json($metas);
     }
     public function mostrar_principal()
     {
       $subarea=0;
       $periodo=\App\periodo::all();
       $per=0;
       for ($i=0; $i <count($periodo) ; $i++) {
         if ($periodo[$i]->estado==1) {
           $per=$periodo[$i]->id;
         }
       }
       $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
       $consulta_metas=DB::select("call consultar_metas()");
       $metas=DB::select("call buscar_meta_activas()");
       $mostrar_metas=true;
       $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
       $jsonmetas=json_encode($jsonmetass);
       return view('adminlte::home1', compact('mostrar_metas','metas','jsonmetass','proyectos','subarea'));
     }
     public function mostrar_principal2()
     {
       $subarea=1;
       $periodo=\App\periodo::all();
       $per=0;
       for ($i=0; $i <count($periodo) ; $i++) {
         if ($periodo[$i]->estado==1) {
           $per=$periodo[$i]->id;
         }
       }
       $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
       $consulta_metas=DB::select("call consultar_metas()");
       $metas=DB::select("call buscar_meta_activas()");
       $mostrar_metas2=true;
       $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
       $jsonmetas=json_encode($jsonmetass);
       return view('adminlte::home2', compact('mostrar_metas2','metas','jsonmetass','proyectos','subarea'));
     }
     public function ultimo()
     {
       $periodos=periodo::with('evaluacionpoas')->where('estado',1)->get();
       return $periodos;
     }
    public function mostrar()
    {
      $mostrar_metas=true;
      $periodos=periodo::with('evaluacionpoas')->where('estado',1)->get();
      return view('adminlte::home1',compact('periodos','mostrar_metas'));
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
        $meta= new MetaModel;
        $meta->descripcion=$request->meta;
        $meta->fecha_inicio=$request->fecha_inicial;
        $meta->fecha_fin=$request->fecha_final;
        $meta->recurso=$request->recurso;
        $meta->observacion=$request->observacion;
        $meta->responsable=$request->responsable;
        $meta->id_indicador=$request->indicador;
        $meta->estado=2;
        $meta->recurso_aprobado=2;
        $meta->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_comentario(Request $request)
    {
        $meta=MetaModel::find($request->id_meta);
        $meta->observacionadminsitrador=$request->observacion;
        $meta->save();
    }
    public function update(Request $request)
    {
        $meta=MetaModel::find($request->idmeta);
        $meta->descripcion=$request->meta;
        $meta->fecha_inicio=$request->fecha_inicial;
        $meta->fecha_fin=$request->fecha_final;
        $meta->recurso=$request->recurso;
        $meta->observacion=$request->observacion;
        $meta->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $meta= \App\MetaModel::find($id);
      $meta->delete();
    }
}
