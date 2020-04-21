@extends('layouts.layout')   <!--directiva extends liga esta vista con la carpeta raiz de la plantilla maestra-->
@section('content')   <!--directiva section con nombre content que sera llamada en directiva @yeald en layout maestro--> 
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuarios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('ejercicio.create') }}" class="btn btn-info" >Añadir Usuario</a><!-- accion del boton para redireccionar a la vista create -->
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">  <!--creacion de la tabla para la vista  -->
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th>Teléfono</th>
               <th>Dirección</th>
               <th>Correo</th>
             </thead>
             <tbody>
              @if($ejercicio->count()) <!--directiva if, funcion ejercicio cuenta los registros si existen entonces has -->  
              @foreach($ejercicio as $eje)  <!--ciclo que permite visualizar los registros para poder actualizarlos o eliminarlos -->
              <tr>
                <td>{{$eje->id}}</td>
                <td>{{$eje->name}}</td>
                <td>{{$eje->phone}}</td>
                <td>{{$eje->address}}</td>
                <td>{{$eje->email}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('MiEjercicioController@edit', $eje->id)}}"><!-- se genera una accion en el boton que direcciona al metodo edit del controlador  pasa como parametro el id del registro--><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('MiEjercicioController@destroy', $eje->id)}}" method="post"><!-- se genera una accion al metodo destroy del controlador pasa como parametro el id del registro -->
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach  <!--fin del ciclo  -->
               @else <!-- si el registro no existe-->
               <tr>
                <td colspan="8">No hay registro !!</td> 
              </tr>
              @endif <!--fin de la directiva if -->
            </tbody>

          </table>
        </div>
      </div>
      {{ $ejercicio->links() }} <!-- función links() que permite administrar los link generados en la tabla para editar y borrar -->
    </div>
  </div>
</section>

@endsection <!-- directiva que finaliza la seccion -->