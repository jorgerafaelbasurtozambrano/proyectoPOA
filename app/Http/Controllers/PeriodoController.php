<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\periodo;
use App\evaluacionpoa;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function vista_administrador()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user==null) {
         return back();
       }else if ($user->idtipo==4) {
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         $ventana=true;
         return view('adminlte::home3',compact('notificaciones','ventana'));
       } else {
         return back();
       }
     }

     public function datos($id)
     {
       $periodos=periodo::all()->where('id',$id);
       return $periodos;
     }
     public function index_nuevo()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user==null) {
         return back();
       }else if ($user->idtipo==4) {
         $index_periodo=true;
         $dato_pdyot=DB::select("call datos_plan_pdyot()");

         // for ($i=0;$i<=count($dato_pdyot); $i++) {
         //   echo($dato_pdyot[$i]->PLAN);
         // }

         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home3',compact('index_periodo','notificaciones','dato_pdyot'));
       }else {
         return back();
       }
     }
     public function listar_periodos()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user==null) {
         return back();
       }else if ($user->idtipo==4) {
         $listadeperiodos=true;
         $datosperiodos=periodo::all();
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home3',compact('listadeperiodos','datosperiodos','notificaciones'));
       }else {
         return back();
       }
     }
     public function report()
     {
       $user = Auth::user();
       if ($user==null) {
         return back();
       }else if ($user==null) {
         return back();
       }else if ($user->idtipo==4) {
         $datosper=periodo::with('evaluaciones')->get();
         $report=true;
         $notificaciones=\App\NotificacionModel::all()->where('visto',0);
         return view('adminlte::home3',compact('report','datosper','notificaciones'));
       }else {
         return back();
       }
     }

    public function mostrar_periodos($id)
    {
      $periodos=evaluacionpoa::with('evaluacionpoas')->where('id_poa',$id)->orderBy('numero', 'ASC')->get();
      return Response()->json($periodos);
    }

    public function vista()
    {
      $datosper=periodo::with('evaluaciones')->get();
      $mostrar_per=true;
      return view('adminlte::home',compact('datosper','mostrar_per'));
    }
    public function mostrar_todo($id)
    {
      $periodos=periodo::with('evaluaciones')->where('id',$id)->get();
      return Response()->json($periodos);
    }
    public function crear()
    {
        $crear=true;
        return view('adminlte::home',compact('crear'));
    }
    public function mostrar()
    {
        $mostrar=true;
        $datosperiodos=periodo::all();
        return view('adminlte::home',compact('mostrar','datosperiodos'));
    }
    public function periodos_mostrar()
    {
      $datosperiodos=periodo::all()->where('estado',1);
      return response()->json($datosperiodos);
    }

    public function periodos_mostrar_todo()
    {
      $datosperiodos=periodo::all();
      return response()->json($datosperiodos);
    }
    public function index()
    {
        return view('periodopoa.index');
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
        $periodoss=new \App\periodo;
        $periodoss->descripcion=$request->periodo;
        $periodoss->fecha_inicio=$request->fecha_inicial;
        $periodoss->fecha_fin=$request->fecha_final;
        $periodoss->estado=$request->estado;
        $periodoss->save();
        return response()->json($periodoss);
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
      $periodo=periodo::find($request->idperiodo);
      $periodo->estado=$request->estado;
      $periodo->save();
      return response()->json($periodo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $periodo=periodo::find($id);
      $periodo->delete();
      return response()->json($id);
    }
}
