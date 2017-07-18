<?php namespace Soportem\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Soportem\Http\Requests;
use Soportem\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Soportem\Pedido;
use Soportem\tb_departamento;

class ReporteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function reporte1($id,$accion_in='today')
	{
		//https://laravel.com/docs/5.1/queries#selects
		$users = DB::table('pedidos')
			//->CROSSjoin('tb_criticidades', 'pedidos.PRIORIDAD', '=', 'tb_criticidades.PRIORIDAD')
			->join('tb_criticidades','pedidos.PRIORIDAD','=','tb_criticidades.PRIORIDAD','cross')
			->join('tb_soport_departament_suarios','pedidos.ID_DEPARTAMENTO','=','tb_soport_departament_suarios.ID_DEPARTAMNETO','LEFT OUTER')
			//->join('tb_departamento','tb_departamento.ID_DEPARTAMNETO','=','tb_soport_departament_suarios.ID_DEPARTAMNETO','cross')
			//->join('tb_usuarios','tb_usuarios.ID_USUARIOS','=','tb_soport_departament_suarios.ID_USUARIOS','cross')
			//->leftJoin('pedidos', 'pedidos.ID_DEPARTAMENTO', '=', 'tb_soport_departament_suarios.ID_DEPARTAMNETO')
			->select( 'pedidos.ID_PETICION AS ID_PETICION',
				//'tb_usuarios.USUARIO AS USUARIO',
       			//'tb_departamento.DESCRIPCION AS DESCRIPCION',
				'pedidos.TITULO AS TITULO',
				'pedidos.PROBLEMA AS PROBLEMA',
				'pedidos.FECHA_PEDIDO AS FECHA_PEDIDO',
				'pedidos.FECHA_SOLUCION AS FECHA_SOLUCION',
				'tb_criticidades.PRIORIDAD AS PRIORIDAD',
				'tb_criticidades.TIEMPO_ROJO AS TIEMPO_ROJO',
				'tb_criticidades.TIEMPO_AMARILLO AS TIEMPO_AMARILLO'
				)
			->selectRaw('sec_to_time(timestampdiff(HOUR,pedidos.FECHA_PEDIDO,ifnull(pedidos.FECHA_SOLUCION, curdate()))) AS HORAS')
			->selectRaw('(
			SELECT
				MAX(tb_pedido_usuarios.ID_USUARIOS) AS ID_USUARIOS_asignado
            FROM tb_pedido_usuarios tb_pedido_usuarios
         	WHERE (    tb_pedido_usuarios.ESTADO = \'PROCE\'
                AND tb_pedido_usuarios.ID_PETICION = pedidos.ID_PETICION)
                )
          AS ID_USUARIOS_asignado ')
			//->selectRaw('')
			->get();
		dd($users);
		return view('reporte.reporteHistorial', ['log' => $users]);
	}
	protected  $data_custom;
	protected  $data_custom2;
	public function reporte2($ini_day,$end_day,$tipo="html")
	{
		//https://laravel.com/docs/5.1/queries#selects
		$fecha_ini  =Carbon::createFromFormat('d-m-Y', $ini_day)->toDateTimeString(); // 1975-05-21 22:00:00
		$fecha_fin =Carbon::createFromFormat('d-m-Y', $end_day)->toDateTimeString(); // 1975-05-21 22:00:00

		$users = DB::table('vw_pedido_reporte')
			->where('FECHA_PEDIDO', '>=', Carbon::createFromFormat('d-m-Y', $ini_day)->toDateTimeString())
			->where('FECHA_PEDIDO', '<=', Carbon::createFromFormat('d-m-Y', $end_day)->toDateTimeString())
			->get();
		$this->data_custom=$users;
		$this->data_custom2=$tipo;
		///////////////////////////////////////////////////////////////
		$view =   view('reporte.reporte', ['documentos' => $users,'tipo' => $tipo])->render();
		if($tipo=='html'){
			return $view;
		}else if($tipo=='pdf'){
			$pdf = \App::make('dompdf.wrapper');
			$view =   view('reporte.reportePDF', ['documentos' => $users,'tipo' => $tipo])->render();
			$html = preg_replace('/>\s+</', "><", $view);
			$pdf->loadHTML($html);
			return $pdf->stream('Reporte');
		}else if($tipo=='pdf_down'){
			$pdf = \App::make('dompdf.wrapper');
			$view =   view('reporte.reportePDF', ['documentos' => $users,'tipo' => $tipo])->render();
			$html = preg_replace('/>\s+</', "><", $view);
			$pdf->loadHTML($html);
			return $pdf->download('Reporte');
		}else if($tipo=='excel'){
			 Excel::create('Reporte', function($excel) {
				$excel->sheet('Nueva hoja', function($sheet) {
					$sheet->loadView('reporte.reportePDF', ['documentos' => $this->data_custom,'tipo' => $this->data_custom2]);
				});
			})->download('xls');
		}


	}
	public function reporteHistorial($fechaIni,$fechaFin)
	{
		$logs=DB::table('tb_log_pedido')
			/*->where('FECHA_INSERT', '=', 'John')
			->orWhere(function ($query) {
				$query->where('votes', '>', 100)
					->where('title', '<>', 'Admin');
			})*/
			->get();
		//dd($logs);
		return view('reporte.reporteHistorial', ['log' => $logs]);
	}
	public function reporteMini($id_user){
		$repo=DB::table('vw_reporte_max1')->get();
		dd($repo);
	}
	public function  reporteTotal($ini_day='',$end_day='',$tipo="html"){
        //$_SESSION['MM_Funcion_activa']='fn_reportes_tot2()';
		//https://laravel.com/docs/5.1/queries#selects
		if (!isset($ini_day)||$ini_day=='') {
			$ini_day = Carbon::now()->format('d-m-Y');
			$end_day = Carbon::now()->format('d-m-Y');
		}
		$fecha_ini =Carbon::createFromFormat('d-m-Y', $ini_day)->toDateTimeString(); // 1975-05-21 22:00:00
		$fecha_fin =Carbon::createFromFormat('d-m-Y', $end_day)->toDateTimeString(); // 1975-05-21 22:00:00
		//$pedidos_2 = Pedido::all();
		/*$pedidos_t = tb_departamento::find(1)->pedidos;
		foreach ($pedidos_t as $p){
			print_r($p->criticidad);
			break;
		}*/
		//$departamentos = tb_departamento::all();
		/*$departamentos = DB::table('tb_departamento')
			->join('pedidos', 'tb_departamento.ID_DEPARTAMNETO', '=', 'pedidos.ID_DEPARTAMENTO')
			->select('pedidos.ESTADO','tb_departamento.DESCRIPCION',DB::raw('count(*) as PEDIDO_COUNT'))
			->groupBy('pedidos.ESTADO','tb_departamento.DESCRIPCION')
			->get();*/
		$departamentos = DB::select( DB::raw("SELECT tb_departamento.DESCRIPCION,
      	tb_departamento.ID_DEPARTAMNETO,
       (SELECT COUNT(pedidos.ESTADO) 
          FROM pedidos pedidos
         WHERE pedidos.ID_DEPARTAMENTO = tb_departamento.ID_DEPARTAMNETO
                AND pedidos.ESTADO = 'COMPLETADO')
          AS completado,
        
       (SELECT COUNT(pedidos.ESTADO) 
          FROM pedidos pedidos
         WHERE pedidos.ID_DEPARTAMENTO = tb_departamento.ID_DEPARTAMNETO
                AND pedidos.ESTADO = 'EN PROCESO')
          AS enproceso,
          
       (SELECT COUNT(pedidos.ESTADO) 
          FROM pedidos pedidos
         WHERE pedidos.ID_DEPARTAMENTO = tb_departamento.ID_DEPARTAMNETO
                AND pedidos.ESTADO = 'STAND BY')
          AS standby
  FROM tb_departamento tb_departamento"));
		//dd($departamentos);
		return view('reporte.reporte1', ['departamentos' => $departamentos]);
	}

}
