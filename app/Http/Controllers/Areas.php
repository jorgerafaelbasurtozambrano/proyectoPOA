<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaModel;
use DB;
class Areas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta()
    {
      $results = DB::table('periodo_poa')
      ->join('evaluacion_poa', 'evaluacion_poa.id_poa', '=', 'periodo_poa.id')
      ->join('contacts', 'users.id', '=', 'contacts.user_id')
      ->join('orders', 'users.id', '=', 'orders.user_id')
      ->select('users.*', 'contacts.phone', 'orders.price')
      ->get();
      return Response()->Json($results);
    }
    public function index()
    {
        //$area = AreaModel::all();
        $crear_area=true;
        //return view('home')->with(['area'=> $area],'');
        return view('home',compact('crear_area'));
    }
    public function conf_area()
    {
        $form_area_conf=true;
        $periodo=\App\periodo::all()->where('estado',1);
        $areas=\App\AreadesModel::all();
        $consulta=DB::select("call consultar_datos()");
        return view('adminlte::home',compact('form_area_conf','periodo','areas','consulta'));
    }
    public function consulta_db()
    {
      $consulta=DB::select("call consultar_datos()");
      $areas=\App\AreadesModel::all();
      return compact('consulta','areas');
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
        $area= new \App\AreaModel;
        $area->id_Area=$request->id_Area;
        $area->valor_asignado = $request->valor_asignado;
        $area->responsable = "";
        $area->id_periodo = $request->id_periodo;
        $area->save();
        $periodo=\App\periodo::all()->where('estado',1);
        $areas=\App\AreadesModel::all();
        $consulta=DB::select("call consultar_datos()");
        //return view('adminlte::home',compact('periodo','areas','consulta'));
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
        //$area = \App\Area::find($id);
        //$edit = true;
        //return view('GestionArea\A', compact('area', 'id', 'edit'));
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
         $area = \App\AreaModel::find($request->idareaconf);
         $area->id_Area = $request->idarea;
         $area->valor_asignado = $request->recurso;
         $area->responsable = "";
         $area->id_periodo=$request->idperiodo;
         $area->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area=\App\AreaModel::find($id);
        $area->delete();
        return response()->json($id);
    }
}
