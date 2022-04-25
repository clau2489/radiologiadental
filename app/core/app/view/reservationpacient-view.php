<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Turnos Pendientes</h4>
			<div class="card-content table-responsive">
				<div class="row">
					<div class="col-md-2">
						<a href="./index.php?view=newreservation" class="btn btn-block btn-default"><i class='fa fa-plus-circle'></i> Nuevo Turno</a>						
					</div>
					<!--
					<div class="col-md-2">
						<a href="./index.php?view=oldreservations" class="btn btn-block btn-default"><i class='fa fa-folder-open'></i> Anteriores</a>						
					</div>
					-->					
				</div>
				<br>
				<br>
				<?php
				//Si se ha pulsado el botón de buscar
				if (isset($_SESSION['document'])) {
					//Recogemos las claves enviadas
					$user = PacientData::getBySearch($_SESSION['document']);

					//Si ha resultados
					if (count(array($user))>0) {
						?>

						<table id="example" class="cell-border" style="width:100%">
						<thead>
							<tr>
							<th scope="col">Apellido y Nombre</th>
							<th scope="col">Documento</th>
							<th scope="col">Dirección</th>
							<th scope="col">Ciudad</th>
							<th scope="col">Teléfono</th>
							<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $user->lastname." ".$user->name; ?></td>
								<td><?php echo $user->document; ?></td>
								<td><?php echo $user->address; ?></td>
								<td><?php echo $user->city; ?></td>
								<td><?php echo $user->phone; ?></td>
								<td>
									<div class="dropdown">
										<button class="btn btn-default btn-block">Opciones</button>
										<div class="dropdown-content">
											<a href="index.php?view=pacienthistory&id=<?php echo $user->id;?>"> Ver Históricos</a>
											<a href="index.php?view=editpacient&id=<?php echo $user->id;?>"> Editar datos</a>
											<a href="index.php?view=delpacient&id=<?php echo $user->id;?>"> Eliminar</a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
						</table>
						<?php
					}
					else {
						echo '
						<table class="table">
						<thead>
							<tr>
							<th scope="col">Apellido y Nombre</th>
							<th scope="col">Documento</th>
							<th scope="col">Dirección</th>
							<th scope="col">Ciudad</th>
							<th scope="col">Teléfono</th>
							<th>Acciones</th>
							</tr>
						</thead>
							<tbody>
								<tr>
									<td><strong>No hay pacientes con el DNI ingresado </strong></td>
								</td>
							</tr>
						</tbody>
						</table>
						';

					}
				}
				?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>