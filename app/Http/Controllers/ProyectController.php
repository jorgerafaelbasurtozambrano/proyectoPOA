<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function retornar_principal()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $periodo=\App\periodo::all();
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         $ventana=true;
         return view('adminlte::home4', compact('activado','notificaciones','ventana'));
       }else {
         return back();
       }
     }
     public function crear1()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $crear_proyecto=true;
         $proyectos=\App\ProyectModel::has('area')->get(); //inner join
         $areas=\App\AreaModel::all();
         $periodo=\App\periodo::all();
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home4', compact('proyectos', 'areas','periodo','crear_proyecto','activado','notificaciones'));
       }else {
         return back();
       }
     }

     public function obtener_proyectos($id)
     {
       $proyectos=\App\ProyectModel::all()->where('id',$id);
       return Response()->json($proyectos);
     }



     public function mostrar_project()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user->idtipo!=4) {
         $periodo=\App\periodo::all();
         $per=0;
         for ($i=0; $i <count($periodo) ; $i++) {
           if ($periodo[$i]->estado==1) {
             $per=$periodo[$i]->id;
           }
         }
         $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
         $mostrar_per=true;
         $subarea=0;
         $bool=$periodo->where('estado',1);
         $activado=count($bool);
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home4', compact('proyectos','mostrar_per','subarea','activado','notificaciones'));
       }else {
         return back();
       }
     }



    public function obtener_indicadores($idarea,$idperiodo)
    {
      $proyec_indica=\App\ProyectModel::with('indicadoress')->where('idAreaPoa',$idarea)->where('idperiodo',$idperiodo)->get();
      $metas=\App\MetaModel::all();
      $proyec_indicas=Response()->json($proyec_indica);
      $metass=Response()->json($metas);
      return compact('proyec_indica','metas');
    }
    public function obtener_indicadores1($idperiodo,$idsubarea)
    {
      $proyec_indica=\App\ProyectModel::with('indicadoress')->where('idperiodo',$idperiodo)->where('idsubarea',$idsubarea)->get();
      $metas=\App\MetaModel::all();
      $proyec_indicas=Response()->json($proyec_indica);
      $metass=Response()->json($metas);
      return compact('proyec_indica','metas');
      //return Response()->json($proyec_indica);
    }
    public function index()
    {
        $proyectos=\App\ProyectModel::has('area')->get(); //inner join
        $areas=\App\AreaModel::all();
        $periodo=\App\periodo::all();
        return view('adminlte::home1', compact('proyectos', 'areas','periodo'));
    }
    public function mostrar()
    {
      //$periodo=\App\periodo::all()->where('estado',1);
      $periodo=\App\periodo::all();
      $per=0;
      for ($i=0; $i <count($periodo) ; $i++) {
        if ($periodo[$i]->estado==1) {
          $per=$periodo[$i]->id;
        }
      }
      $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
      $mostrar_per=true;
      $subarea=0;
      return view('adminlte::home1', compact('proyectos','mostrar_per','subarea'));
    }
    public function mostrar2()
    {
      $periodo=\App\periodo::all();
      $per=0;
      for ($i=0; $i <count($periodo) ; $i++) {
        if ($periodo[$i]->estado==1) {
          $per=$periodo[$i]->id;
        }
      }
      $proyectos=\App\ProyectModel::all()->where('idperiodo',$per);
      $mostrar_per2=true;
      $subarea=1;
      return view('adminlte::home2', compact('proyectos','mostrar_per2','subarea'));
    }

    public function crear()
    {
        $crear_proyecto=true;
        $proyectos=\App\ProyectModel::has('area')->get(); //inner join
        $areas=\App\AreaModel::all();
        $periodo=\App\periodo::all();
        return view('adminlte::home1', compact('proyectos', 'areas','periodo','crear_proyecto'));
    }

    public function crear2()
    {
        $crear_proyecto2=true;
        $periodo=\App\periodo::all()->where('estado',1);
        return view('adminlte::home2', compact('periodo','crear_proyecto2'));
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
        $ProyectModel= new \App\ProyectModel;
        $ProyectModel->descripcion=$request->descripcion;
        $ProyectModel->idAreaPoa=$request->id_area_;
        $ProyectModel->idperiodo=$request->periodo;
        $ProyectModel->save();
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
        $proyec= \App\ProyectModel::find($id);
        $edit_per=true;
        return view('adminlte::home4',compact('proyec', 'id', 'edit_per'));
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
        $ProyectModel= \App\ProyectModel::find($request->id);
        $ProyectModel->descripcion=$request->descripcion;
        $ProyectModel->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProyectModel= \App\ProyectModel::find($id);
        $ProyectModel->delete();
        $mostrar_per=true;
        $proyectos=\App\ProyectModel::has('area')->get();
    }
}
