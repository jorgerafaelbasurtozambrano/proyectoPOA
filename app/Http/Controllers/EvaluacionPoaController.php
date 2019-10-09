<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evaluacionpoa;
class EvaluacionPoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buscar($id)
    {
      $evaluacion=evaluacionpoa::with('evaluacionpoas')->where('id',$id)->get();;
      //$evaluacion=evaluacionpoa::with('evaluacionpoas')->where('id_poa',$id)->get();
      return Response()->json($evaluacion);
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
        $evaluacion=new \App\evaluacionpoa;
        $evaluacion->fecha_inicio=$request->fecha_incial;
        $evaluacion->fecha_fin=$request->fecha_final;
        $evaluacion->numero=$request->numero;
        $evaluacion->id_poa=$request->id_poa;
        $evaluacion->save();
        return response()->json($evaluacion);
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
      $evaluacion=evaluacionpoa::find($request->idevaluacion);
      $evaluacion->fecha_inicio=$request->fechainicio;
      $evaluacion->fecha_fin=$request->fechafinal;
      $evaluacion->numero=$request->numero;
      $evaluacion->save();
      return response()->json($evaluacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluacion=\App\evaluacionpoa::find($id);
        $evaluacion->delete();
        return response()->json($id);
    }
}
