<?php namespace Soportem\Http\Controllers;

use Soportem\Directorio;
use Soportem\User;
use Soportem\Http\Requests;
use Soportem\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DirectorioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //de estaciones
        $estaciones  = Directorio::all();

        // load the view and pass the nerds
        //dd($estaciones);
        return \View::make('directorio.index')
            ->with('directorio', $estaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //crear una nueva estacion
        return \View::make('directorio.create');
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
            'nombre'       	=> 'required|max:500',
            'mail_req'		=> 'required|email',
            'extencion'     => 'required',
            'celular'       => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        //dd($validator) ;
        // process the login
        $mensaje="Error al crear registro de Directorio";
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
            $estaciones = new Directorio();
            $estaciones->nombre = \Input::get('nombre');
            $estaciones->mail_req = \Input::get('mail_req');
            $estaciones->extencion = \Input::get('extencion');
            $estaciones->celular = \Input::get('celular');
            $estaciones->save();

            $estaciones2  = Directorio::all();

            // load the view and pass the nerds
            //dd(tb_estaciones);
            return \View::make('directorio.index')
                ->with('directorio', $estaciones2);
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
        //de estaciones

        //$usuario	=User::where('NOMBRE', 'like', '%'.$id.'%')->select('ID_USUARIOS as id ','NOMBRE as nombre','CORREO_CORPORATIVO as mail_req','TELEFONO as extencion','CELULAR_CORPORATIVO as celular')->take(10)->get();
        //dd($usuario);
        $estaciones_dos= User::where('NOMBRE', 'like', '%'.$id.'%')->select('ID_USUARIOS as id ','NOMBRE as nombre','CORREO_CORPORATIVO as mail_req','TELEFONO as extencion','CELULAR_CORPORATIVO as celular')->take(10);
        $estaciones  = Directorio::where('nombre', 'like', '%'.$id.'%')->select('id','nombre','mail_req','extencion','celular')->take(10)->union($estaciones_dos)->get();
        // load the view and pass the nerds
        //dd($estaciones);
        return \View::make('directorio.show')
            ->with('directorio', $estaciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $estaciones = Directorio::find($id);

        // show the edit form and pass the nerd
        return \View::make('directorio.edit')
            ->with('directorio', $estaciones);
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
            'nombre'       	=> 'required|max:500',
            'mail_req'		=> 'required|email',
            'extencion'     => 'required',
            'celular'       => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('directorio/' . $id . '/edit')
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

        $nerd = Directorio::find($id);
        $nerd->delete();
        //$nerd->deleted_at = getdate();
        //$nerd->save();

        //$nerd->restore();

        $mensaje=$nerd->nombre. " ha sido borrada con exito";
        if($request->ajax()){
            return response()->json([
                'mensaje'=>$mensaje,
                'id'=>$nerd->id
            ]);
        }
        // redirect
        //\Session::flash('message', 'Borrada la estacion!');
        //return \Redirect::to('tb_estaciones');



    }

}
