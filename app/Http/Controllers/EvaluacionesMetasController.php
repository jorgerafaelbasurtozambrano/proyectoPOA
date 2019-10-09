<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\periodo;
use App\EvaluacionesMetasModel;
use Illuminate\Support\Facades\Auth;
class EvaluacionesMetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function metas_evaluar()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $subarea=0;
         $departamentos=\App\AreadesModel::all();
         $periodo=\App\periodo::all();
         $per=0;
         for ($i=0; $i <count($periodo) ; $i++) {
           if ($periodo[$i]->estado==1) {
             $per=$periodo[$i]->id;
           }
         }
         $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
         $mostrar_metas_evaluacion=true;
         $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $evaluaciones=\App\evaluacionpoa::orderBy('numero', 'ASC')->where('id_poa',$bool[0]->id)->get();

         //$evaluaciones=\App\evaluacionpoa::all()->where('id_poa',$bool[0]->id);
         //dd($evaluaciones);
         // if ($activado==1) {
         //   $evaluaciones=\App\evaluacionpoa::all()->where('id_poa',$bool[0]->id)->orderBy('numero', 'ASC')->get();
         //   dd($evaluaciones);
         // }
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home4', compact('mostrar_metas_evaluacion','jsonmetass','proyectos','evaluaciones','subarea','activado','notificaciones'));
       }else {
         return back();
       }
     }


     public function todas_metas()
     {
       $metas=EvaluacionesMetasModel::all();
       return Response()->json($metas);
     }
     public function todas_metas_especifico($id_meta,$id_evaluacion)
     {
       $metas=EvaluacionesMetasModel::where([
       'id_meta' => $id_meta,
       'id_evaluacion' => $id_evaluacion,
       ])->get();
       return Response()->json($metas);
     }
     public function mostrar_metas()
     {
       $subarea=0;
       $departamentos=\App\AreadesModel::all();
       $periodo=\App\periodo::all();
       $per=0;
       for ($i=0; $i <count($periodo) ; $i++) {
         if ($periodo[$i]->estado==1) {
           $per=$periodo[$i]->id;
         }
       }
       $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
       $mostrar_metas_evaluacion=true;
       $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
       $evaluaciones=periodo::with('evaluacionpoas')->where('estado',1)->get();
       return view('adminlte::home1', compact('mostrar_metas_evaluacion','jsonmetass','proyectos','evaluaciones','subarea'));
     }
     public function mostrar_metas2()
     {
       $subarea=1;
       $departamentos=\App\AreadesModel::all();
       $periodo=\App\periodo::all();
       $per=0;
       for ($i=0; $i <count($periodo) ; $i++) {
         if ($periodo[$i]->estado==1) {
           $per=$periodo[$i]->id;
         }
       }
       $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
       $mostrar_metas_evaluacion2=true;
       $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
       $evaluaciones=periodo::with('evaluacionpoas')->where('estado',1)->get();
       return view('adminlte::home2', compact('mostrar_metas_evaluacion2','jsonmetass','proyectos','evaluaciones','subarea'));
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
        $new_evaluacion=new EvaluacionesMetasModel;
        $new_evaluacion->id_meta=$request->id_meta;
        $new_evaluacion->id_evaluacion=$request->id_evaluacion;
        //$new_evaluacion->observacion="";
        $new_evaluacion->porcentaje=$request->porcentaje;
        $new_evaluacion->save();
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
    public function update(Request $request)
    {
      $evaluacion=EvaluacionesMetasModel::find($request->idmeta_evaluacion);
      $evaluacion->porcentaje=$request->porcentaje;
      $evaluacion->observacion="dsd";

      $evaluacion->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
