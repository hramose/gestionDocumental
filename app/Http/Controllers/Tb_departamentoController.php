<?php namespace Soportem\Http\Controllers;

use Soportem\Http\Requests;
use Soportem\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Soportem\tb_departamento;

class Tb_departamentoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "este es la pagina central dee cargar la de show estaciones";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return view('departamento.create', ['ID_ESTACION' => $id]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'ID_ESTACION'       => 'required',
			'DESCRIPCION'       => 'required'
		);
		$validator = \Validator::make(\Input::all(), $rules);

		//dd($validator) ;
		// process the login
		$mensaje="Error al crear el departamento o servicio";
		if ($validator->fails()) {
			return response()->json([
				'mensaje'=>$mensaje,
				'error'=>$mensaje
			]);
		} else {
			$estaciones = new tb_departamento;
			$estaciones->ID_ESTACION = strtoupper(\Input::get('ID_ESTACION'));
			$estaciones->DESCRIPCION = strtoupper(\Input::get('DESCRIPCION'));
			$estaciones->OBSERVACION = \Input::get('OBSERVACION');
			$estaciones->save();
			//dd($estaciones);
			//$estaciones2  = tb_departamento::all();

			// load the view and pass the nerds


		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('departamento.create', ['ID_ESTACION' => $id]);
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
		// delete
		//return $id;
		$nerd = tb_departamento::where('ID_DEPARTAMNETO', $id);

		//dd($nerd);
		$nerd->delete();
		//$nerd->deleted_at = getdate();
		//$nerd->save();

		//$nerd->restore();

		//$mensaje=$nerd->DESCRIPCION. " ha sido borrada con exito";
		$mensaje="Ha sido borrada con exito";

			return response()->json([
				'mensaje'=>$mensaje,
				//'id'=>$nerd->ID_DEPARTAMNETO
				'id'=>$id
			]);

		// redirect
		//\Session::flash('message', 'Borrada la estacion!');
		//return \Redirect::to('tb_estaciones');
	}

}
