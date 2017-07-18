<?php namespace Soportem\Http\Controllers;

use Soportem\Http\Requests;
use Soportem\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Soportem\tb_departamento;
use Soportem\tb_estaciones;

class Tb_estacionesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//de estaciones
        $estaciones  = tb_estaciones::all();

        // load the view and pass the nerds
        //dd(tb_estaciones);
        return \View::make('estaciones.index')
            ->with('estaciones', $estaciones);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//crear una nueva estacion
        return \View::make('estaciones.create');
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
            'ESTACION'       => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        //dd($validator) ;
        // process the login
        $mensaje="Error al crear la estacion";
        if ($validator->fails()) {
            return response()->json([
                'mensaje'=>$mensaje,
                'error'=>$mensaje
            ]);
        } else {
            /*DB::table('users')->insert(
                array('email' => 'john@example.com', 'votes' => 0)
            );*/
            // store
            $estaciones = new tb_estaciones;
            $estaciones->ID_ESTACION = strtoupper(\Input::get('ID_ESTACION'));
            $estaciones->ESTACION = strtoupper (\Input::get('ESTACION'));
            $estaciones->OBSERVACIONES = \Input::get('OBSERVACIONES');
            $estaciones->save();

            $estaciones2  = tb_estaciones::all();

            // load the view and pass the nerds
            //dd(tb_estaciones);
            return \View::make('estaciones.index')
                ->with('estaciones', $estaciones2);
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
        // get the nerd
        $nerd = tb_estaciones::find($id);
        // show the view and pass the nerd to it
		$estaciones  = tb_departamento::where('ID_ESTACION', '=', $id)->take(100)->get();

		// load the view and pass the nerds
		//dd($estaciones);
		return view('estaciones.show', ['estaciones' => $nerd,
		'departamento'=>$estaciones]);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $estaciones = tb_estaciones::find($id);

        // show the edit form and pass the nerd
        return \View::make('estaciones.edit')
            ->with('estaciones', $estaciones);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'ESTACION'       => 'required'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('nerds/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
           /* $nerd = tb_estaciones::find($id);
            $nerd->ESTACION       = \Input::get('ESTACION');
            // $nerd->OBSERVACIONES      = \Input::get('OBSERVACIONES');
            $nerd->save();

            // redirect
            \Session::flash('message', 'Actualizada la Estacion');
            return \Redirect::to('estaciones');*/
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
        // delete
        //return $id;

        $nerd = tb_estaciones::find($id);
        $nerd->delete();
        //$nerd->deleted_at = getdate();
        //$nerd->save();

        //$nerd->restore();

        $mensaje=$nerd->ESTACION. " ha sido borrada con exito";
        if($request->ajax()){
            return response()->json([
                'mensaje'=>$mensaje,
                'id'=>$nerd->ID_ESTACION
            ]);
        }
        // redirect
        //\Session::flash('message', 'Borrada la estacion!');
        //return \Redirect::to('tb_estaciones');



	}

}
