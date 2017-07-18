<?php namespace Soportem\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Soportem\Document;
use Soportem\Http\Requests;
use Soportem\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DocumentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//de estaciones

		$documentos  = DB::table('tb_documents')
			->orderBy('identificador', 'desc')->simplePaginate(15);

		// load the view and pass the nerds
		//dd(tb_estaciones);
		/*return \View::make('documentos.index')
			->with('documentos', $documentos);*/
		return view('documentos.index', ['documentos' => $documentos]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//crear una nueva estacion

		// get the nerd
		//$ultimoOficio = DB::table('orders')->max('price');
		$ultimomem =  DB::table('tb_documents')
		->where('tipo_documento', 'like','memo')
		->max('identificador_numero')+1;
		$ultimoOficio = DB::table('tb_documents')
			->where('tipo_documento', 'like','oficio')
			->max('identificador_numero')+1;
		$documentos=array(
			'ultimoOficio'=>"OFF".sprintf("%06s", $ultimoOficio),
			'ultimomem'=>"MEM".sprintf("%06s", $ultimomem),
			'off_cgh1'=>$ultimoOficio,
			'mem_cgh1'=>$ultimomem,
		);

		//dd($documentos);
		// show the view and pass the nerd to it
		return \View::make('documentos.create')
			->with('documentos', $documentos);


		//return \View::make('documentos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'identificador'       => 'required',
		);
		$validator = \Validator::make(\Input::all(), $rules);

		//dd($validator) ;
		// process the login
		$mensaje="Error al crear el documento";
		if ($validator->fails()) {
			return response()->json([
				'mensaje'=>$mensaje,
				'error'=>$mensaje
			]);
			//dd($validator);
		} else {

			$estaciones = new Document();
			//dd($validator);
			$estaciones->identificador = \Input::get('identificador');
			$estaciones->identificador_numero = \Input::get('identificador_numero');
			$estaciones->identificador_letras = \Input::get('identificador_letras');


			$estaciones->tipo_documento = \Input::get('tipo_documento');
			$estaciones->observaciones_doc = \Input::get('observaciones_doc');
			$estaciones->solicitante = \Input::get('solicitante');
			$estaciones->save();

			// load the view and pass the nerds
			//dd($estaciones);
			$documentos  = DB::table('tb_documents')
				->orderBy('identificador', 'desc')->simplePaginate(15);
			return view('documentos.index', ['documentos' => $documentos]);
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

}
