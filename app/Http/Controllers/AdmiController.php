<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class AdmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function principal_nuevo1()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $pe=\App\periodo::all();
         $periodo=\App\periodo::all();
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $mostrar_eval_metas=true;
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home4', compact('mostrar_eval_metas','pe','activado','notificaciones'));
       }else {
         return back();
       }
     }

     public function principal_nuevo()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo==4) {
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         $departamentos=\App\AreadesModel::all();
         $pe=\App\periodo::all()->where('estado',1);
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
         $mostrar_eval_metas=true;
         $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
         $jsonmetas=json_encode($jsonmetass);
         $evaluacion=\App\EvaluacionesMetasModel::all();
         $areass=\App\AreadesModel::all();
         return view('adminlte::home3', compact('evaluacion','departamentos','mostrar_eval_metas','metas','jsonmetass','proyectos','areass','pe','notificaciones'));
       }else {
         return back();
       }
     }


     public function buscar_subarea($id)
     {
       $resultado=\App\SubareaModel::all()->where('id_area',$id);
       return Response()->json($resultado);
     }
     public function sub()
     {
       $dato_subarea=true;
       $periodo=\App\periodo::all()->where('estado',1);
       $area=\App\AreadesModel::all();
       return view('adminlte::home1', compact('dato_subarea','periodo','area'));
     }

     public function principal()
     {
       $departamentos=\App\AreadesModel::all();
       $pe=\App\periodo::all()->where('estado',1);
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
       $mostrar_eval_metas=true;
       $jsonmetass=\App\IndicadoresModel::with('obtner_metas')->get();
       $jsonmetas=json_encode($jsonmetass);
       $evaluacion=\App\EvaluacionesMetasModel::all();
       $areass=\App\AreadesModel::all();
       return view('adminlte::home', compact('evaluacion','departamentos','mostrar_eval_metas','metas','jsonmetass','proyectos','areass','pe'));
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
        //
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
    public function update(Request $request, $id)
    {
        $meta=\App\MetaModel::find($request->id_meta);
        if ($request->modificar_recurso==1) {
          $meta->recurso_modificado=$request->get('recurso_modificado');
        }else if ($request->modificar_recurso==0){
          $meta->estado=$request->get('estado');
        }else if($request->modificar_recurso==2)
        {
          $meta->recurso_aprobado=$request->get('estado_recurso');
        }
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
        //
    }
}
