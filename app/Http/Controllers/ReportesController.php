<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class ReportesController extends Controller
{
  public function periodos_evaluaciones($id_periodo)
  {
    $periodos=\App\periodo::with('evaluaciones')->where('id',$id_periodo)->get();
    $mostrar_eval_metas=true;
    $pro_indi=DB::select('call proyecto_indicadores(?)',array($id_periodo));
    $evaluacion=\App\periodo::with('proyectoss')->where('id',$id_periodo)->get();
    $numero=0;
    $indicadores=\App\IndicadoresModel::all();
    $metas=\App\MetaModel::all();
    $meta_evalu=\App\EvaluacionesMetasModel::all();
    foreach ($periodos as $value) {
      $numero=count($value->evaluaciones);
    }
    $areas=DB::select('call canti_indicadores(?)',array($id_periodo));
    //$view=\View::make('nuevasvistas.periodo.poa', compact('numero','periodos','areas','evaluacion','pro_indi','indicadores','metas','meta_evalu'))->render();
    //$pdf=\App::make('dompdf.wrapper');
    //$pdf->loadHTML($view)->setPaper("letter", $orientation = "landscape");
    //return $pdf->stream();
    return view('nuevasvistas.periodo.poa', compact('numero','periodos','areas','evaluacion','pro_indi','indicadores','metas','meta_evalu'));
  }
}
