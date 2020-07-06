<?php
	require_once("header.php");
?>
<!--contenido-->
<div class="content-wrapper">
	<section class="content">
		<div id="resultados_ajax"></div>
		<h2>Listado de Usuarios</h2>
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h1 class="box-title">
								<button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#usuarioModal"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo Usuario</button></h1>
									<div class="box-tools pull-right"></div>
						</div>	
					</div>
					<div class="panel-body table-responsive">
						<table id="usuario_data" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Telefono</th>
									<th>Correo</th>
									<th>Usuario</th>
									<th>Password</th>
									<th width="10%">Editar</th>
									<th width="10%">Eliminar</th>

								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- FORMULARIO DE VENTANA MODAL -->
<div id="usuarioModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="usuario_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar usuario</h4>	
				</div>
				<div class="modal-body">
					<br/>

					  <label>Nombres</label>
					  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/><br/>

					  <label>Apellidos</label>
					  <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/><br/>

					  <label>Usuario</label>
					  <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/><br/>

					  <label>Password</label>
					  <input type="text" name="password1" id="password1" class="form-control" placeholder="Password" required/><br/>

					  <label>Repita Password</label>
					  <input type="text" name="password2" id="password2" class="form-control" placeholder="Password" required/><br/>

					  <label>Telefono</label>
					  <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required pattern="[0-9]{0,15}"/><br/>

					  <label>Correo</label>
					  <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo" required/><br/>

				</div>
				<div class="model-footer">
					<input type="hidden" name="id_usuario" id="id_usuario"/>
					<button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar</button>

					<button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cerrar</button>
				</div>
			</div>
		</form>
	</div>	
</div>
<?php
require_once("footer.php")
?>
<script type="text/javascript" src="js/usuarios.js"></script>