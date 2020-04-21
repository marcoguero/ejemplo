<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ejercicio;

class MiEjercicioController extends Controller   //clase controlador 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Función que gestiona un select con ordenacion descendente por campo "id"
        $ejercicio=Ejercicio::orderBy('id','DESC')->paginate(3);
        return view('Ejercicio.index',compact('ejercicio')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */    
    public function create()
    {
        // funcion que direcciona a la vista create en folder Ejercicio
        return view('Ejercicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Funcion que permite almacenar un nuevo registro en base de datos
        $this->validate($request,[ 'name'=>'required', 'email'=>'required']); //funcion de validacion para hacer obligatorios los camspo nombre y correo
        Ejercicio::create($request->all()); 
        return redirect()->route('ejercicio.index')->with('success','Registro creado satisfactoriamente'); //hecho el registro nos regresa a la pagina pricipal con el registro creado
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Funcion que busca por id un recurso existente y lo devuelve a la vista
        $ejercicio=Ejercicio::find($id);
        return  view('Ejercicio.show',compact('ejercicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Funcion que busca por id un recurso existente y lo devuelve a la vista, es na funcion util para editar un registro de base de datos
        $ejercicio=Ejercicio::find($id);
        return view('Ejercicio.edit',compact('ejercicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        // Funcion que permite actulizar el registro en base de daatos, valida campos obligatorios nombre y correo y devuelve a la vista principal
        $this->validate($request,[ 'name'=>'required', 'email'=>'required']);
        Ejercicio::find($id)->update($request->all());
        return redirect()->route('ejercicio.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Funcion que permite eliminar un registro de base de datos por su "id", redirecciona a la vista principal una vez se haya eliminado el registro
         Ejercicio::find($id)->delete();
        return redirect()->route('ejercicio.index')->with('success','Registro eliminado satisfactoriamente');
    }


    /**
     * Ejemplo de método REST 
     *
     * @return \Illuminate\Http\Response
     */

    public function getEjercicios(){
        // funcion que permite obtener todos los registros en la base de datos y los conjunta en un objeto json facilmente iterable
        $ejercicio=Ejercicio::all();
        return response()->json($ejercicio);
    }
}
