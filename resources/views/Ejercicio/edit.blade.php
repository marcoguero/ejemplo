@extends('layouts.layout')   <!--directiva extends liga esta vista con la carpeta raiz de la plantilla maestra-->
@section('content')<!--directiva section con nombre content que sera llamada en directiva @yeald en layout maestro-->
<div class="row">
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br> <!--error la no ingresar datos obligatorios -->
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li> 
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('ejercicio.update',$ejercicio->id) }}"  role="form"> <!--hace una solicitud por el metood post al controlador de actualizacio  -->
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name" placeholder="Nombre" class="form-control input-sm" value="{{$ejercicio->name}}">    <!--se carga el valor de campo nombre correspondiente al registro seleccionado -->
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="phone" id="phone" placeholder=Teléfono class="form-control input-sm" value="{{$ejercicio->phone}}">   <!--se carga el valor de campo telefono correspondiente al registro seleccionado -->
									</div>
								</div>
							</div>                                                                                        

							<div class="form-group">
								<textarea name="address" class="form-control input-sm"  placeholder="Dirección">{{$ejercicio->address}}</textarea> <!--se carga el valor de campo direccion correspondiente al registro seleccionado -->
							</div>
							<div class="form-group">
								<textarea name="email" class="form-control input-sm" placeholder="Correo electrónico">{{$ejercicio->email}}</textarea> <!--se carga el valor de campo correo correspondiente al registro seleccionado -->
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12"> 
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('ejercicio.index') }}" class="btn btn-info btn-block" >Atrás</a> <!-- boton que regresa a la plantilla pricipal-->
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection