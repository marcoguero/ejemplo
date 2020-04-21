@extends('layouts.layout')  <!--directiva extends liga esta vista con la carpeta raiz de la plantilla maestra-->
@section('content')   <!--directiva section con nombre content que sera llamada en directiva @yeald en layout maestro-->
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0) <!-- directiva if para crear una validacion - si existe un errror se muestra en pantalla -->
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li> <!--sintaxis .blade -->
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
					<h3 class="panel-title">Nuevo Usuario</h3> <!--se pide un nuevo usuario -->
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('ejercicio.store') }}"  role="form"> <!--accion que solicita por metodo post la ruta de controlador  .store-->
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Nombre completo"> <!--crear un nuevo usuario  -->
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Teléfono">
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="address" class="form-control input-sm" placeholder="Dirección"></textarea>
							</div>
							<div class="form-group">
								<textarea name="email" class="form-control input-sm" placeholder="Correo electrónico"></textarea>
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('ejercicio.index') }}" class="btn btn-info btn-block" >Atrás</a> <!--boton que regresa la pagina principal -->
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection